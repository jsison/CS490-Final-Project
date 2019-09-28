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
     <head>
         <link rel="stylesheet" type="text/css" href="tmakecss.css">
         <script src="jquery-1.11.2.min.js"></script>
    </head>
    <body>
        <a href="prof-index.php">Back to index</a>
        <form method="post" action="<?php $_PHP_SELF ?>">
            <div id="workarea-wrapper">
                <div class="boxes-wrapper">
                    <select multiple="true" size="10" style="" name="box1[]" class="box1">
                    </select>
                <div class="buttons-wrapper">
                    <li><button class="add"> &lt;--Add</button></li>
                    <li><button class="remove">Remove--&gt; </button></li>
                </div>
                    <select multiple="true" size="10" style="overflow:auto" class="box2">
                        <?php foreach ($res as $option) : ?>
                            <option value= "<?php echo $option["name"]; ?>" > <?php echo $option["name"] ?> <?php echo "(" ?> <?php echo $option["question"] ?> <?php echo ")"; ?></option>; 
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="end-wrapper">
                    <input type="text" maxlength="32" placeholder="Test name title" id="testname" name="testname" required>
                    <input type="submit" onclick id="submit" name="submitbutton">
                </div>
            </div>
        </form>
        <div class="display-wrapper">
        </div>
    </body>
</html>
<script>
$().ready(function() {  
   $('.add').click(function() {  
    return !$('.box2 option:selected').remove().appendTo('.box1');  
   });  
$('.remove').click(function() {  
    return !$('.box1 option:selected').remove().appendTo('.box2');  
   });
    $('form').submit(function() {  
     $('.box1 option').each(function(i) {  
      $(this).attr("selected", "selected");  
     });  
    });   
  });
  
    
    
</script>




<?php
$name = $_POST['testname'];
$questions = $_POST['box1'];
$postdata = "name=".$name."&points=100";

if ($_POST['box1'] != null){
    

    foreach($questions as $qnum=>$qname) {
        $postdata = $postdata."&".($qnum+1)."=".$qname;
    }

    $url = "https://web.njit.edu/~jtl25/CS490/examStore.php";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    curl_close($ch);

    echo $response;
} 
else
{
    echo "Test is empty!";
}
?>