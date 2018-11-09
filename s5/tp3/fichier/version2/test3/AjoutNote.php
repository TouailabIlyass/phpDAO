
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-grid.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-reboot.min.css'>

	<title>AjoutNote</title>

</head>
<body>
      <div class='container'>
      <div class='row'>
      <div class='col-md-12'>

    <form method='POST'  action='Action.php?table=note&action=insert'>
  		   <div class='form-group'>
        <label for='id'>Id:</label><input type='text' class='form-control' name='id' id='id'></div><div class='form-group'>
        <label for='etudiant_id'>Etudiant_id:</label><input type='text' class='form-control' name='etudiant_id' id='etudiant_id'></div><div class='form-group'>
        <label for='annee'>Annee:</label><input type='text' class='form-control' name='annee' id='annee'></div><div class='form-group'>
        <label for='niveau'>Niveau:</label><input type='text' class='form-control' name='niveau' id='niveau'></div><div class='form-group'>
        <label for='matiere'>Matiere:</label><input type='text' class='form-control' name='matiere' id='matiere'></div><div class='form-group'>
        <label for='note'>Note:</label><input type='text' class='form-control' name='note' id='note'></div>

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