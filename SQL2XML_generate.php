<?php
	$con = mysql_connect('localhost','root','0418162');
	if (!$con) {
		die("Cannot establish a connection");
	}
	$db_selected = mysql_select_db("hw6",$con);
	$sql = 'create table View select Product.Name, Type, FormDesc, Price from Product, FormDesc where Product.Name = FormDesc.Name';
	$result = mysql_query($sql,$con);
	$sql = 'select distinct View.*, SalesPrice, Start, End from View left join Sales on View.Name = Sales.Name';
	$result = mysql_query($sql,$con);
	$sql = 'drop table View';
	mysql_query($sql,$con);
	$i = 0;
	while ($row = mysql_fetch_assoc($result)) {
		if (!isset($row['Start'])) {
			$value[$i] = $row['Type'].'|'.$row['Name'].'|'.$row['FormDesc'].'|'.$row['Price'];
		}
		else {
			$value[$i] = $row['Type'].'|'.$row['Name'].'|'.$row['FormDesc'].'|'.$row['Price'].'|'.$row['SalesPrice'].'|'.$row['Start'].'|'.$row['End'];
		}
		$i++;
	}
	$N = $i;
?>
<?php echo 'Goto: <a href="output.xml">XML Output</a>'; ?>
<?php
$xml = 'output.xml';
// clean the contents
if (file_exists($xml)) {
	$handle = fopen($xml, 'w');
	fclose($handle);
}
$handle = fopen($xml, 'w') or die('Cannot open file'.$xml);
$data = 
'<?xml version="1.0" encoding="ISO-8859-1"?>
<?xml-stylesheet type="text/xsl" href="XML2HTML_noforeach.xsl"?>
<products>
';
fwrite($handle, $data);
for ($i=0; $i<$N; $i++) {
$pieces = explode("|", $value[$i]);
$data =  '	<product>
';
fwrite($handle, $data);
// name
$data =  '		<name>';
fwrite($handle, $data);
$data =  $pieces[1];
str_replace('&amp;', 'and', $data);
fwrite($handle, $data);
$data =  '</name>
';
fwrite($handle, $data);
// type
$data =  '		<type>';
fwrite($handle, $data);
$data =  $pieces[0];
fwrite($handle, $data);
$data =  '</type>
';
fwrite($handle, $data);
// price
$data =  '		<price>';
fwrite($handle, $data);
$data =  $pieces[3];
fwrite($handle, $data);
$data =  '</price>
';
fwrite($handle, $data);

// description
$data =  '		<desc>';
fwrite($handle, $data);
$data =  $pieces[2];
$data = str_replace('&', 'and', $data);
fwrite($handle, $data);
$data =  '</desc>
';
fwrite($handle, $data);

// sales
if (isset($pieces[4])) {
// sales price
$data =  '		<salesprice>';
fwrite($handle, $data);
$data =  $pieces[4];
fwrite($handle, $data);
$data =  '</salesprice>
';
fwrite($handle, $data);
// sales begin
$data =  '		<salesstart>';
fwrite($handle, $data);
$data =  $pieces[5];
fwrite($handle, $data);
$data =  '</salesstart>
';
fwrite($handle, $data);
// sales end
$data =  '		<salesend>';
fwrite($handle, $data);
$data =  $pieces[6];
fwrite($handle, $data);
$data =  '</salesend>
';
fwrite($handle, $data);
}
else {
$data =  '		<salesprice>';
fwrite($handle, $data);
$data =  '</salesprice>
';
fwrite($handle, $data);
$data =  '		<salesstart>';
fwrite($handle, $data);
$data =  '</salesstart>
';
fwrite($handle, $data);
$data =  '		<salesend>';
fwrite($handle, $data);
$data =  '</salesend>
';
fwrite($handle, $data);
}
$data =  '	</product>
';
fwrite($handle, $data);
}
$data = 
'</products>';
fwrite($handle, $data);
fclose($handle);
?>