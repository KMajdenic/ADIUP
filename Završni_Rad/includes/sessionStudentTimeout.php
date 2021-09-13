<?php
if(!isset($_SESSION["studentID"]) && $_SESSION["studentID"]==false)
{
    session_unset();
    header("location: ../Index.html");
    exit;
}
?>