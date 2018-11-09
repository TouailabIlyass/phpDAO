<?php

$n;

if ($_SERVER['REQUEST_METHOD']=='POST') {

$n=$_POST['name'];
  if (isset($n)){
    echo "your name is ".$_POST['name'];
  }
  if (isset($_POST['pr'])) {
    echo "your pr is ".$_POST['pr'];
  }

  
}