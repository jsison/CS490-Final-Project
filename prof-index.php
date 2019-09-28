<?php

session_start();

if($_SESSION['user'] != "Professor"){
    Header('Location: errorpage.php');
}

?>
<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" type="text/css" href="prof-indexcss.css"></head>
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
            <a href="testview.php">View a Test</a></td>
            <td>Access Tests, Student's Test, and Grade.</td>
        </tr>
        <tr>
            <td style="font-weight: bold; text-align: center;">
                <a href="qmake.php">Create a Question</a></td>
            <td>Be able to make open-ended questions.</td>
        </tr>
        <tr>
            <td style="font-weight: bold; text-align:center;">
                <a href="tmake.php">Make a Test</a></td>
            <td>Add questions to a test. </td>
        </tr>
        </table>
        </div>


        <div
    </body>
</html>