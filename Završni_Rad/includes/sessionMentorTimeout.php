<?php
if(!isset($_SESSION["mentorID"]) && $_SESSION["mentorID"]==false)
{
    session_unset();
    header("location: ../Index.html");
    exit;
}
?>