<?php /*
try{
$host = "192.168.0.170:9629";
$db = "jp";
$user = "pub";
$pass = "public";

$conn = new PDO('sqlsrv:Server='.$host.';Database=' . $db, $user, $pass, 
                array(
                      PDO::ATTR_EMULATE_PREPARES => false,
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                     )
               );
} catch (PDOException $e) {
  echo "Failed : " . $e->getMessage() . "\n";
  exit;
}*/
?>

<?php /*
try{
  $hostname = "192.168.0.170";
  $dbname = "jp";
  $username = "pub";
  $pw = "public";

  $pdo = new PDO ("odbc:Driver={SQL SERVER};Server=$hostname;Database=$dbname; Uid=$username;Pwd=$pw;");

} catch (PDOException $e) {
  echo "Failed : " . $e->getMessage() . "\n";
  exit;
}

$query = $pdo->prepare("select field_name from table");
$query->execute();

for($i=0; $row = $query->fetch(); $i++){
  echo iconv("CP1256","UTF-8",  $row['field_name'])."<br>";
}*/
?>

<?php /*
$db_host = "192.168.0.170";
$db_server_name = "jp";
$db_name = "jp";
$db_user = "pub";
$db_pass = "public";

$connect_string =  "Driver={SQL Anywhere 12};".
                   "CommLinks=tcpip(Host=$db_host);".
                   "ServerName=$db_server_name;".
                   "DatabaseName=$db_name;";

// Connect to DB

$conn = odbc_connect( $connect_string, $db_user, $db_pass ); */
?>

<?php 

/*$sql="SELECT pt_part, pt_desc1 FROM PUB.pt_mstr";*/
$sql="SELECT xxgk2d_invnbr FROM PUB.xxgk2d_det";

$dsn = "jp";

if ($conn_id=odbc_connect("jp","pub","public", SQL_CUR_USE_ODBC)){

	echo "connected to DSN: $dsn <br>";

	if($result=odbc_do($conn_id, $sql)) {
		echo "executing '$sql' <br>";
		echo " Results: ";
		odbc_result_all($result, "BGCOLOR='#AAFFAA' border=3 width=30% bordercolordark='#FF0000'");

		echo "freeing result <br>";

		odbc_free_result($result);
	}else{

		echo "can not execute '$sql' ";
	}

	echo " closing connection $conn_id <br>";
	odbc_close($conn_id);
}else{

	echo " can not connect to DSN: $dsn ";
}
?>

<?php /*
if ($conn_id=odbc_connect("sp2k","sysprogress","s", SQL_CUR_USE_ODBC )){

echo " connected to DSN: sports91b ";

if($cur=odbc_exec($conn_id, "SELECT * FROM PUB.Customer")) {

$Fields = odbc_num_fields($cur);

print "<=table border='1' width='100%'> <=tr>'";

// Build Column Headers

for ($i=1; $i <= $Fields; $i++){
printf("<=th bgcolor='silver'>%s <=/th>", odbc_field_name( $cur,$i)); }

// Table Body

$Outer=0;
while( odbc_fetch_row( $cur )){
$Outer++;
print "<=tr>";

for($i=1; $i <= $Fields; $i++){
printf("<=td>%s<=/td>", odbc_result( $cur, $i ));
}
print "<=/tr>";
}
print "<=/table>";
print " Your request returned $Outer rows!";

}
odbc_close( $conn_id);
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>