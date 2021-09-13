<?php
session_start();
if(!isset($_SESSION['studentID']) )
{
    header("location: LoginStudent.php");
    exit;
}
require_once "../includes/config.php";

$resetStudentQuery="SELECT ProjectID FROM students WHERE ID=".$_SESSION['studentID'].";";
$execStudentResetQuery=mysqli_query($db,$resetStudentQuery);
$StudentResetResult=mysqli_num_rows($execStudentResetQuery);
if ($StudentResetResult==1)
{
    $ResetStudentQueryRow=mysqli_fetch_assoc($execStudentResetQuery);
    if($ResetStudentQueryRow['ProjectID']!=0)
    {
        $selectProject="SELECT StudentsAssigned 
        FROM projects WHERE ProjectID=".$ResetStudentQueryRow['ProjectID'].";";
        $execselectProject=mysqli_query($db,$selectProject);
        $execselectProjectResult=mysqli_num_rows($execselectProject);
        if($execselectProjectResult==1)
        {
            $updateProject="UPDATE projects SET StudentsAssigned=StudentsAssigned-1
            WHERE ProjectID=".$ResetStudentQueryRow['ProjectID'].";";
            $execupdateProject=mysqli_query($db,$updateProject);
            $updateStudent="UPDATE students SET ProjectID=0 WHERE ID=".$_SESSION['studentID'].";";
            $execupdateStudent=mysqli_query($db,$updateStudent);

            if($execupdateProject && $execupdateStudent)
            { 
                
                echo "Uspješno ste ispisani s projekta!";
                header("location: HomeStudent.php");
            }
            else
            {
                echo "Došlo je do pogreške pri ispisu!";
                header("location: HomeStudent.php");
            }

        }else
        {
            echo "Došlo je do pogreške pri dohvaćanju podataka!";
            header("location: HomeStudent.php");
        }
    }else{
        echo "Nemate upisan projekt";           
        header("location: HomeStudent.php");
    }
}else{
    echo "Došlo je do pogreške pri dohvaćanju podataka!";
    header("location: HomeStudent.php");
}

mysqli_close($db);

?>
