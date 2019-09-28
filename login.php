<!DOCTYPE html>
<html>
<head>
    <head><link rel="stylesheet" type="text/css" href="loginsheet.css"></head>
    <title></title>
</head>
<body>
    <div class="login-wrapper">
        <h1>NJIT TESTING CENTER</h1>
        <form action="<?php $_PHP_SELF ?>" method="post" id="f1">
            USERNAME <br><input type="text" name="formID" style="height: 30px; width: 100%; margin-bottom: 20px;" placeholder="Username"> <br>
            PASSWORD <br><input type="password" name="formPass" style="height: 30px; width: 100%;" placeholder="Password"><br>
            <input type="submit" name="submit" style="margin-top: 10px;">    
        </form>
        
<?php
    session_start();
    $_SESSION['user'] = null;
    //Getting information from form
    $ucid = $_POST["formID"];
    $pass = $_POST["formPass"];
    $post = 'user=' .$ucid. '&pass=' .$pass;
    //cURL
    $url = "https://web.njit.edu/~jtl25/CS490/login.php";
    $login = curl_init();
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_POST, true);
    curl_setopt($login, CURLOPT_POSTFIELDS, $post);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, true);

    $res = json_decode(curl_exec($login),true);
    
    curl_close($login);
    

    if($res['usertype']=="Student"){
        $_SESSION['user'] = $res['usertype'];
        header("Location: student-index.php");
    }
    elseif($res['usertype']=="Professor"){
        $_SESSION['user'] = $res['usertype'];
        header("Location: prof-index.php");
    }
    elseif($ucid == "" && $pass == "" && empty($ucid) && empty($pass)){
    }
    else{
        echo "Invalid username/password";
    }


?>
    </div>
</body>
</html>

    