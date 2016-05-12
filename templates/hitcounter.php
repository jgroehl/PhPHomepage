<?php
$counter_name = "counterData";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

$counterVal++;
$f = fopen($counter_name, "w");
fwrite($f, $counterVal);
fclose($f); 

$ending = 'th';
$lastdigit = substr($counterVal, -1);

if($lastdigit == 1){
	$ending = 'st';
} else if($lastdigit == 2){
	$ending = 'nd';
}

$lastdigit = substr($counterVal, -2);

if($lastdigit == 11){
	$ending = 'th';
} else if($lastdigit == 12){
	$ending = 'th';
}

echo 'You are the '.$counterVal.$ending.' visitor.';
?>