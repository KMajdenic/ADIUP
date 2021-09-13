<?php

require_once "../includes/config.php";
require_once "../includes/sessionStudent.php";

$error="";
if($_SERVER["REQUEST_METHOD"]=="POST"&& isset($_POST['submit']))
{
    $user=trim($_POST['username']);
    $password=trim($_POST['password']); 
        if($query=$db->prepare("SELECT * FROM students WHERE Username = ?"))
        {
            $query->bind_param('s',$user);            
            $query->execute();            
            $resultData=mysqli_stmt_get_result($query);
            $row=mysqli_fetch_assoc($resultData);
            
            if($row)
            {
                if(password_verify($password,$row["Password"]))
                {                    
                    $_SESSION["studentID"]=$row['ID'];
                    $_SESSION["student"]=$row['FullName'];                                        
                    header("location: HomeStudent.php");
                    exit;
                }else{
                    $error.='<p class="error">Lozinka nije ispravna!</p>'; 
                }
            }
            else{
                    $error.='<p class="error">Korisnik nije pronađen!</p>';
            }
        }
        $query->close();
    
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADIUP</title>
    <link rel="stylesheet" href="../style/LoginFormCss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>  
<body>
    <img src="../style/logo.jpg" alt="Fakultet računarstva i informacijskih tehnologija Osijek" class="logo">
    <br>
    <h1>Aplikacija za dodjeljivanje i upravljanje projektnim zadatcima</h1><br>
    <form action="" method="POST">
        <label for="username">Korisničko ime studenta:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Lozinka:</label><br>
        <input type="password" id="password" name="password" required><br>
        <?php echo $error; ?>
        <input type="submit" id="submit" name="submit" value="Prijava"><br>
    </form>
    
</body>
</html>