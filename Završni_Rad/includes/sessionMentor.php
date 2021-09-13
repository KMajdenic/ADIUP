<?php
session_start();

if(isset($_SESSION["mentorID"])&&$_SESSION["mentorID"]==true)
{
    header("location: HomeMentor.php");
    exit;
}elseif(isset($_SESSION["studentID"]) && $_SESSION["studentID"]==true)
{
    header("location: ../Student/HomeStudent.php");
    exit;
}
?>