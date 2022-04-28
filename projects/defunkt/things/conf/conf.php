<?php
/////////////////////////////////////////////

include("./confCommon.php");
loadConferences();

$x[0] = "";
$x[1] = date("d/m/Y");
$today = new confObj($x);

for($i=0; $i<count($confs); $i++)
{
	$name = $confs[$i]->name;
	$deadline = $confs[$i]->deadline;
   	$web = $confs[$i]->web;


	if (compare($today, $confs[$i]) < 0)
		echo "$name - <strike>$deadline</strike> - $web<br>";
	else
		echo "<b>$name - $deadline - $web</b><br>";
}

/////////////////////////////////////////////

?>
