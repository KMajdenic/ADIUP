<?php
session_start();
require_once "sessionMentorTimeout.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/MentorCss.css" type="text/css">
    <link rel="stylesheet" href="../style/MentorHeader.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
<body>
<div class="flexbox"> 
    <div class="logo"><img src="../style/logo.jpg" alt="Fakultet računarstva i informacijskih tehnologija Osijek" class="logo">
    </div>
    <div><h1>Aplikacija za dodjeljivanje i upravljanje<br> projektnim zadatcima</h1></div>
    <div><h2>Dobrodošli <?php echo $_SESSION["mentor"];?></h2></div>
</div>
    <nav>
        <div class="wrapper">    
                <a href="HomeMentor.php">Početna</a>
                <a href="SignUpMentor.php">Dodaj Mentora</a>
                <a href="SignUpStudent.php">Dodaj Studenta</a>
                <a href="AddProject.php">Dodaj Projekt</a>
                <div class="wrapRight">
                <a href="../includes/Logout.php">Odjava</a>
                </div>
        </div>
    </nav>
</body>