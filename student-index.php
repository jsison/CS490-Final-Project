<?php

session_start();

if($_SESSION['user'] != "Student"){
    Header('Location: errorpage.php');
}

?>


<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" type="text/css" href="student-indexcss.css"></head>
    <body>
        <header>
            <p><span style="font-size: 30px;background-color: white; border-radius: 10px; padding:5px;">Welcome, Professor!</span>
                <a href="login.php" style="font-size: 20px; background-color: white; padding:5px;">Log Out</a>
            </p>
        </header> 
        </table>
        <div class="main-wrapper">
        <table border="0" style="width:100%">
        <tr>
            <td style="font-weight: bold; text-align: center;">
            <a href="testselection.php">Select a Test to take</a></td>
            <td>Take a Test that has been given to you.</td>
        </tr>
        <tr>
            <td style="font-weight: bold; text-align:center;">
                <a href="grades.php">Review Grades</a></td>
            <td>View grades you have taken.</td>
        </tr>
        </table>
        </div>


        <div
    </body>
</html>