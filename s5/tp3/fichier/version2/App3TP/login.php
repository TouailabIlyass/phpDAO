<?php

if(isset($_COOKIE['ilyase'])){
header('Location: home.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Sign In</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-success btn-lg" >Sign In</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once('Verif.php');?>

</body>

</html>
