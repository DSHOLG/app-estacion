

<?php
$f=fopen("padron.csv", "r");
while(!feof($f)){
$renglon[]=explode(",",fgets($f));
}

$table="<table border='1' style='border-collapse: collapse;'>";
for($y=0;$y<count($renglon);$y++){
	$table.="<tr>";
	for($x=0; $x<count($renglon[$y]); $x++){
		if($y==0){
			$table.="<td style='text-align: center; font-weight: bold;'>".$renglon[$y][$x]."</td>";
		}else{
			$table.="<td>".$renglon[$y][$x]."</td>";
			}
	}
	$table.="</tr>";
}
$table.="</table>" ; echo $table;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Lucas Gomez</h1>
</body>
</html>