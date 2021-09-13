<?php
include_once '../includes/HeaderMentor.php';
require_once "../includes/config.php";

$error="";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit']))
{
    $projectname=trim($_POST['projectName']);
    $projectdesc=trim($_POST['projectdescription']);
    $mentor=$_SESSION["mentor"];
    
    
    $insertQUERY=$db->prepare("INSERT INTO projects (Name,Description,Mentor) VALUES 
    (?,?,?);");
    $insertQUERY->bind_param("sss",$projectname,$projectdesc,$mentor);
    $result=$insertQUERY->execute();
    if($result)
    {
        $error.='<p class="error">Projekt uspješno dodan!</p>'; 
    }else{
        $error.='<p class="error">Došlo je do pogreške!</p>'; 
    }
    
    $insertQUERY->close();
    mysqli_close($db);
}



?>


<!DOCTYPE html>
<html>
    <body>
    <form action="" method="POST">
        <label for="projectName">Ime projekta:</label><br>
        <input type="text" id="projectName" name="projectName" required><br>
        <label for="projectdescription">Opis projekta:</label><br>
        <input type="text" id="projectdescription" name="projectdescription" required><br>
        <?php echo $error; ?>
        <input type="submit" id="submit" name="submit" value="Dodaj"><br>
    </form>
    </body>
<footer class="footer">Fakultet računarstva i informacijskih tehnologija, Osijek</footer>
</html>
