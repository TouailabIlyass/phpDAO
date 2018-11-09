<?php

$x="hello";
$$x="ok";

echo $x.$$x."<br/>";
${'hello'}=3;
echo ${'hello'};
echo $x.$hello;


$y=1;
echo "<br/>";
if($y==1):
echo "hello";
else :
echo "ok";
endif;

while($y<=10):
echo $y;
$y++;
endwhile;

echo "----------------<br/>";
for($i=0;$i<10;$i++)
{ for($j=0;$j<10;$j++):

     if($j==2)
     break 2;
     echo $i, $j;
endfor;

}

echo "----------------<br/>";


