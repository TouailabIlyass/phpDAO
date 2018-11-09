
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-grid.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-reboot.min.css'>

	<title>AjoutUser</title>

</head>
<body>
      <div class='container'>
      <div class='row'>
      <div class='col-md-12'>

    <form method='POST'  action='Action.php?table=user&action=update'>
  		   <div class='form-group'>
        <label for='id'>Id:</label><input type='text' class='form-control' name='id' id='id' value='3'></div><div class='form-group'>
        <label for='nom'>Nom:</label><input type='text' class='form-control' name='nom' id='nom' value='Anas'></div><div class='form-group'>
        <label for='prenom'>Prenom:</label><input type='text' class='form-control' name='prenom' id='prenom' value='Ilyase'></div><div class='form-group'>
        <label for='username'>Username:</label><input type='text' class='form-control' name='username' id='username' value='il'></div><div class='form-group'>
        <label for='password'>Password:</label><input type='password' class='form-control' name='password' id='password' value='111'></div><div class='form-group'>
        <label for='email'>Email:</label><input type='text' class='form-control' name='email' id='email' value='il@gmail.com'></div><div class='form-group'>
        <label for='photo'>Photo:</label><input type='file' class='form-control' name='photo' id='photo'></div><input type='hidden' name='cle' value='a:1:{s:2:"id";s:1:"3";}'>

  <input type='submit' name=Send class='btn btn-primary' value='Send'>
  </form>
  </div>
  </div>
  </div>
<script type='text/javascript' src='js/jq-3.1.js'></script>
<script type='text/javascript' src='js/bootstrap.min.js'></script>
<script type='text/javascript' src='js/bootstrap.bundle.min.js'></script>
</body>
</html>