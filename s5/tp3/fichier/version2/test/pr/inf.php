<?php

$cnx=mysql_connect("localhost","root","");

$db=mysql_select_db("ilyase");

$name=$_POST["username"];
$email=$_POST["email"];
$pwd=$_POST["pwd"];
//$tre=sprintf("insert into test (id,user,email,pass) values (%d,%s,%s,%s)",2,mysql_real_escape_string($name),mysql_real_escape_string($email),mysql_real_escape_string($pwd));

$insert=mysql_query($tre);
if ($insert) {
echo "bien";
}
else
echo "baddddddddddddd";

echo "$tre";

