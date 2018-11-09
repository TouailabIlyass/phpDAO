<?php


echo `ls`;
if(file_exists('test.txt'))
{
echo 'yes';

$fi=fopen('test.txt','r');

$str=fread($fi,filesize('test.txt'));

echo '<br>'.$str.'<br>';



}
else echo 'No';


