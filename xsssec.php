<html>
<body>

<?php

$xname = $_GET["fname"];
function sanitize_sql_strin($string)
{
$string = htmlspecialchars($string);
$string = stripslashes($string);
//$string = str_replace(";","",$string);
return $string;
}

$xname = sanitize_sql_strin($xname);
echo "Welcome: ". $xname; 

?><br>

</body>
</html> 



