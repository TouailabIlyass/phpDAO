
<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-grid.min.css'>
  <link rel='stylesheet' type='text/css' href='css/bootstrap-reboot.min.css'>

	<title>AjoutChambre</title>

</head>
<body>
      <div class='container'>
      <div class='row'>
      <div class='col-md-12'>

    <form method='POST'  action='Action.php?table=chambre&action=insert'>
  		   <div class='form-group'>
        <label for='n_c'>N_c:</label><input type='text' class='form-control' name='n_c' id='n_c'></div><div class='form-group'>
        <label for='nblits'>Nblits:</label><input type='text' class='form-control' name='nblits' id='nblits'></div><div class='form-group'>
        <label for='climatisation'>Climatisation:</label><input type='text' class='form-control' name='climatisation' id='climatisation'></div>

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