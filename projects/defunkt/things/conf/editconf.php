<?php

function deadline( $c )
{
	$name = $c->name;
	$date = $c->deadline;
	
	echo "$name <input name=\"$name\" value=\"$date\" size=\"11\">";
	echo "<a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.demoform.$name);return false;\" HIDEFOCUS>";
	echo "<img class=\"PopcalTrigger\" align=\"absmiddle\" src=\"Calendar/calbtn.gif\" width=34 height=22 border=0></a><br>";
}

//////////////////////////////////////////

include("./confCommon.php");
loadConferences();

if (isset($submit))
{
	$fp = fopen("conf.csv", "w");	
	for ($i=0; $i<count($confs); $i++)
	{	
		$confname = $confs[$i]->name;
		$confdeadline = $GLOBALS[$confname];

		$s = $confname;
		$s = $s.",".$confdeadline;
		$s = $s."\n";
		fwrite($fp, $s);
	}
	echo "Changes accepted.";
	echo "Click <a href=\"editconf.php\">here to go back.</a>";
}
else
{
	echo "<FORM name=\"demoform\">";

	loadConferences();
	for ($i=0; $i<count($confs); $i++)
	{
		deadline($confs[$i]);
	}

	echo "<input type=submit name=submit value=submit>";
	echo "</FORM>";
}
?>

<!--  PopCalendar(tag name and id must match) Tags should sit at the page bottom -->
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="Calendar/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
