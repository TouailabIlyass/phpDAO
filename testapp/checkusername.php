<?php



elseif (isset($_POST['username'])) {

	$stmt=$con->prepare('select * from user where username = :username');

	$stmt->execute([$_POST['username']]);

	if ($stmt->rowCount()) {
		echo 1;
	}
	else{
      echo 0;
	}
	
}



