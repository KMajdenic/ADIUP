<?php
require_once "../includes/config.php";
$alert="";


if(isset($_POST['submit']))
{
    $projectID=$_POST['projectID'];
    $studentcheck="SELECT ProjectID FROM students WHERE ".$_SESSION['studentID']."=ID ;";
    $execStudentcheck=mysqli_query($db,$studentcheck);
    $studentresult=mysqli_fetch_assoc($execStudentcheck);
    if($studentresult['ProjectID']==0)
    {
        $ConditionIsFull="SELECT StudentsAssigned FROM projects WHERE ProjectID=$projectID;";
        $ConditionIsFullResult=mysqli_query($db,$ConditionIsFull);
        
        $ConditionIsFullCheck=mysqli_num_rows($ConditionIsFullResult);    
    if($ConditionIsFullCheck!=0)
    {
        $cellFlag=mysqli_fetch_assoc($ConditionIsFullResult);
        if($cellFlag['StudentsAssigned']<3)
        {
                $insertquery="UPDATE projects 
                SET StudentsAssigned=StudentsAssigned+1 WHERE ProjectID=$projectID;";
                $execinsertquery=mysqli_query($db,$insertquery);
                $insertqueryStudent="UPDATE students
                SET ProjectID=$projectID WHERE ".$_SESSION['studentID']."=ID ;;";
                $execinsertqueryStudent=mysqli_query($db,$insertqueryStudent);
                $alert= "Uspješno upisan Projekt";
            
        }
        else
        {
            $alert= "Broj mjesta na projektu je popunjen!";
        }
    }
    else{
        $alert="Greška prilikom dohvaćanja";
    }
    }else {
        $alert= "Već imate upisan projekt! Ispišite se ukoliko želite upisati novi.";
    }
}
 ?>