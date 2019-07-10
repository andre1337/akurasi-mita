<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbadmin`";
if(getJum($conn,$sql)>0){
	print "<admin>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_admin=$d["kode_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <username>$username</username>\n";
				print "  <password>$password</password>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <email>$email</email>\n";
				print "  <status>$status</status>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <kode_admin>$kode_admin</kode_admin>\n";
				print "</record>\n";
			}
	print "</admin>\n";
}
else{
	$null="null";
	print "<admin>\n";
				print "<record>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <telepon>$null</telepon>\n";				
				print "  <email>$null</email>\n";
				print "  <status>$null</status>\n";				
				print "  <gambar>$null</gambar>\n";
				print "  <kode_admin>$null</kode_admin>\n";
				print "</record>\n";
	print "</admin>\n";

}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>
	