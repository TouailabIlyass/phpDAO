<?php
include ('cnxbd.php');
$db=cnx();

if (isset($_POST['SignUp'])) {
	

$name=$_POST['username'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];

echo "your name : $name <br> ";
echo "your email : $email <br> ";
echo "your pass : $pwd <br> ";
//$req=sprintf("insert into test(id,user,email,pass) values(%d,%s,%s,%s)",2,mysql_real_escape_string($name),mysql_real_escape_string($email),mysql_real_escape_string($pwd));

$insert=mysql_query("insert into test values('','$name','$email','$pwd')");
$num=rand(1000,9999);

include ('mailer.php');
$s=sendMail($email,$name,$num);

if ($s) {
	echo "bien";
}
else
echo "No";

}

/*
$insert=mysql_query("select * from test");
if ($insert) {
echo "bien";
}
else
echo "baddddddddddddd";


while ($ligne=mysql_fetch_array($insert,MYSQL_NUM)) {
	
	foreach ($ligne as $value) {
		echo "$value <br>";
	}
}

}

else if (isset($_POST['SignIn'])) {

$name=$_POST['username'];
$pwd=$_POST['pwd'];

$req=mysql_query("select * from test where user= '$name' and pass = '$pwd'");
if ($req) {
while ($ligne=mysql_fetch_array($req,MYSQL_NUM)) {
	if ($ligne[1]==$name && $ligne[3]==$pwd) {
	echo "Trouve";break;
	}
}
}
else
echo "bad!!!!";
}
*/