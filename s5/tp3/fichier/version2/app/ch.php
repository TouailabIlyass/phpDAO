<?php


require_once('Dao.php');
$dao= new Dao('myDB');
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <title>Ajouter Chambre</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>Ajouter Chambre</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <?php
                echo $dao->createFormBoot('chambre',NULL);
                ?>

                <div class="form-group">
                    <input type="submit" name="signup" class="btn btn-success btn-lg" value="Sign Up">
                </div>
            </form>
        </div>
    </div>

<?php require_once('Verif.php');?>

</body>

</html>
