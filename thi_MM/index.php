<?php

function euclid($a, $b){
	
 $x2 = 1;
 $x1 = 0;
 $y2 = 0;
 $y1 = 1;
 while($b>0){
   $q = floor($a/$b);
   // echo $q . "</br>";
   $r = fmod($a, $b);
   $x = $x2-$q*$x1;
   $y = $y2-$q*$y1;
   $a =$b;
   $b =$r;
   $x2 =$x1;
   $x1 =$x;
   $y2 =$y1;
   $y1 =$y;
}
echo "nghịch đảo của  a = ".$y2 ."</br>";
// echo "co so nghich dao khi b la '1' , b=  ".$b ."</br>";
echo "gdc a va b : ".$a ."</br>";
// echo "nghiem x va y , x = ".$y1 ."y= ".$y2;


	  
}
euclid(5760,17);



function BPL($a, $k,$n){
   $k = strrev(decbin($k));
   
   $t = (strlen($k)-1);
   if($k[0]==0){
    $b=1;
   }else{
    $b = $a;
    }
    for ($i=1; $i <=$t; $i++) { 
      $a = fmod(($a*$a),$n);
      if($k[$i]==1){
        $b=fmod($a*$b,$n);
      }else{
        $b = $b;
      }
    }
    echo "bình phương có lặp a mod n = ".$b;
}
BPL(4549,17,5917);
?>