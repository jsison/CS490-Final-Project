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
    <head><link rel="stylesheet" type="text/css" href="testviewcss.css"></head>
    <body>
        <a href="prof-index.php">Back to index</a><br><br>
        <?php foreach($res as $test) : ?>
        <?php if ($test["name"] != null) : ?>
        <table border="1" style= "border-width: 2px; width:100%; empty-cells: show;">
            <th style="border-width: 2px;" colspan="3"><?php echo $test["name"]; ?> <?php echo " Weight: "?> <?php echo $test["weight"]; ?></th>
            <tr>
                <th>Question Name</th>
                <th>Instructions</th>
                <th>Weight of the Question</th>
            </tr>
                    <?php for ($i = 0; $i <= sizeof($test['questions']); $i++) : ?>
                        <?php if($test['questions'][$i]['name'] != null) : ?>
                            <tr>
                                <td><?php echo $test['questions'][$i]['name'] ?></td> 
                                <td><?php echo $test['questions'][$i]['question']; ?></td>
                                <td><?php echo $test['questions'][$i]['weight']; ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
        </table>
        <br><br>
        <?php endif; ?>
        <?php endforeach; ?>
    </body>
</html>
<!--
Needs a way to delete questions and maybe add questions.
Needs a sorting algorithm probably from difficulty. (1,2,3 repeat) or (1,2,3) spanned.
-->