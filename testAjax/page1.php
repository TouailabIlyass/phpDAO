<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="page1.php" method="post">
<input type="text" name="nn" id="in">
</form>
<div id="tt"></div>
<script type="text/javascript" src="jq-3.1.0.js"></script>
<script type="text/javascript">
	$(function(){
		$('input').on('keyup',function(){
      $.ajax({
      	  
          type: 'POST',
          url: 'page2.php',
          data: $('form').serialize(),
          dataType: 'text',
          success: function(str){
          	 $('#tt').html(str);
          }


      });
});

});

/*

	$('input').on('keyup',function(){

      $('#tt').text($('input').val());

	});
*/
</script>
</body>
</html>