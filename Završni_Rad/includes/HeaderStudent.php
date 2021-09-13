<?php
session_start();
require_once "sessionStudentTimeout.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/StudentCss.css" type="text/css">
    <link rel="stylesheet" href="../style/StudentHeader.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flexbox"> 
    <div class="logo"><img src="../style/logo.jpg" alt="Fakultet računarstva i informacijskih tehnologija Osijek" class="logo">
</div>
    <div><h1>Aplikacija za dodjeljivanje i upravljanje<br> projektnim zadatcima</h1></div>
    <div><h2>Dobrodošli <?php echo $_SESSION["student"];?></h2></div>
    </div>
    <nav>
        <div class="wrapper">
            <a href="HomeStudent.php">Početna</a>

            <a href="MyProject.php">Moj projekt</a>
                
            <a href="DropProject.php">Ispis s projekta</a>
            <div class="wrapRight">
            <a href="../includes/Logout.php">Odjava</a>
            </div>
        </div>
    </nav>

</body>