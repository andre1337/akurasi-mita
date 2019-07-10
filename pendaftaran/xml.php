<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpendaftaran`";
if(getJum($conn,$sql)>0){
	print "<pendaftaran>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_pendaftaran=$d["id_pendaftaran"];
				$id_pendaftaran=$d["nama"];
				$id_pendaftaran=$d["email"];
				$id_pendaftaran=$d["no_tlp"];
				$id_pendaftaran=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["status_ket"];
				$email=$d["id_komunitas"];
												
				print "<record>\n";
				print "  <username>$username</username>\n";
				print "  <password>$password</password>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <status_ket>$status_ket</emstatus_ketail>\n";
				print "  <id-komunitas>$id-komunitas</id-komunitas>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_pendaftaran>$id_pendaftaran</id_pendaftaran>\n";
				print "  <nama>$nama</nama>\n";
				print "  <email>$email</email>\n";
				print "  <no_tlp>$no_tlp</no_tlp>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "</record>\n";
			}
	print "</pendaftaran>\n";
}
else{
	$null="null";
	print "<pendaftaran>\n";
				print "<record>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <status_ket>$null</status_ket>\n";
				print "  <id_komunitas>$null</id_komunitas>\n";				
				print "  <email>$null</email>\n";
				print "  <nama>$null</nama>\n";	
				print "  <email>$null</email>\n";
				print "  <gambar>$null</gambar>\n";
				print "  <id_pendaftaran>$null</id_pendaftaran>\n";
				print "</record>\n";
	print "</pendaftaran>\n";

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
	