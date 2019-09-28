<!DOCTYPE html>

<?php
$url = "https://web.njit.edu/~jtl25/CS490/getGrades.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'student=TestStudent');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

$res = json_decode($response, true);

curl_close($ch);
?>
<html>
    <head><link rel="stylesheet" type="text/css" href="gradescss.css"></head>
    <body>
        <table border="1" style="width:100%;">
            <tr>
                <td>Test Name</td>
                <td>Grade</td>
            </tr>
            <?php foreach($res as $result) : ?>
                <tr>
                    <td><?php echo $result["name"]; ?></td>
                    <td><?php echo $result["score"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>