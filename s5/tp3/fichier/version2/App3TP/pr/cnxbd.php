<?php

function cnx()
{
   $db=mysql_connect("localhost","root","");
   $sdb=mysql_select_db('ilyase');
   return $db;
}