<?php
session_start();

if(isset($_SESSION["studentID"]) && $_SESSION["studentID"]==true)
{
    header("location: HomeStudent.php");
    exit;
}elseif(isset($_SESSION["mentorID"])&&$_SESSION["mentorID"]==true)
{
    header("location: ../Mentor/HomeMentor.php");
    exit;
}

?>