<!DOCTYPE html>
<?php
$url = "https://web.njit.edu/~jtl25/CS490/examBank.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'get=all');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

$res = json_decode($response, true);

curl_close($ch);
?>

<html>
    <head><link rel="stylesheet" type="text/css" href="testselectioncss.css"></head>
    <body>
        <a href="student-index.php">Back to index</a>
        <h1>Select a Test</h1>
        <div class="test-wrapper">
            <table border="1">
            <?php foreach ($res as $test) : ?>
                <tr>
                <form action="test.php">
                    <td><a href="test.php?testname=<?php echo $test['name'] ?>"><?php echo $test['name']; ?></a></td>
                    <td>Number of Questions: <?php echo sizeof($test['questions']); ?></td>
                </form>
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
