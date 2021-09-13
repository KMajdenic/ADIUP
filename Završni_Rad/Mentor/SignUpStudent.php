<?php
require_once "../includes/config.php";
include_once '../includes/HeaderMentor.php';
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit']))
{
    $fullname=trim($_POST['fullname']);
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    $passwordHASH=password_hash($password,PASSWORD_DEFAULT);
    
    if(empty($error))
    {
    $insertQUERY=$db->prepare("INSERT INTO students (FullName,Username,Password) VALUES 
    (?,?,?);");
    $insertQUERY->bind_param("sss",$fullname,$username,$passwordHASH);
    $result=$insertQUERY->execute();
    if($result)
    {
        $error.='<p class="error">Student uspješno dodan!</p>'; 
    }else{
        $error.='<p class="error">Došlo je do pogreške!</p>'; 
    }
    
    }$insertQUERY->close();
    mysqli_close($db);
}

?>
<!DOCTYPE html>
<html>
    <body>
        <form action="" method="POST">
        <label for="username">Puno ime studenta:</label><br>
        <input type="text" id="fullname" name="fullname" required><br>
        <label for="username">Korisničko ime studenta:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Lozinka:</label><br>
        <input type="password" id="password" name="password" required><br>
        <?php echo $error; ?>
        <input type="submit" id="submit" name="submit" value="Dodaj"><br>
    </form>
    </body>
    <footer class="footer">Fakultet računarstva i informacijskih tehnologija, Osijek</footer>
</html>