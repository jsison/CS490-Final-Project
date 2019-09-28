<!DOCTYPE html>
<?php
$url = "https://web.njit.edu/~jtl25/CS490/questBank.php";
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
    <head><link rel="stylesheet" type="text/css" href="testmakercss.css"></head>
    
    <body>
        <div class="form-wrapper">
            <form method="post" action="<?php $_PHP_SELF ?>">
                <table border="1" id="table1">
                    <tr>
                        <th>Select for Test</th>
                        <th>Question Name</th>
                        <th>Instructions</th>
                        <th>Difficulty (1=Easy, 2=Medium, 3=Hard)</th>
                    </tr>
                    <?php foreach ($res as $option) : ?>
                    <tr>
                        <td><input type="checkbox" class="select-row" value="<?php echo $i; ?>"></td>
                        <td value="<?php echo $option['name'] ?>"</t>><?php echo $option['name']; ?></td>
                        <td value="<?php echo $option['question']; ?>"><?php echo $option['question']; ?></td>
                        <td value="<?php echo $option['question']; ?>"><?php echo $option['difficulty']; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
                <input type="text" class="testname" name="testname" required>
                <input type="submit" name="submit">
            </form>
        </div>
    </body>
</html>

<script>

</script>