
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-grid.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-reboot.min.css'>

	<title>AjoutEtudiant</title>

</head>
<body>
      <div class='container'>
      <div class='row'>
      <div class='col-md-12'>

    <form method='POST'  action='Action.php?table=etudiant&action=insert'>
  		   <div class='form-group'>
        <label for='id'>Id:</label><input type='text' class='form-control' name='id' id='id'></div><div class='form-group'>
        <label for='nom'>Nom:</label><input type='text' class='form-control' name='nom' id='nom'></div><div class='form-group'>
        <label for='address'>Address:</label><input type='text' class='form-control' name='address' id='address'></div>

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