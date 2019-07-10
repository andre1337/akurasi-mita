<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbkomunitas`";
if(getJum($conn,$sql)>0){
	print "<komunitas>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$idkomunitas=$d["id_komunitas"];
				$nama_komunitas=$d["nama_komunitas"];
				$deskripsi=$d["deskripsi"];
				$kategori=$d["kategori"];
			    $alamat=$d["alamat"];
				$email=$d["email"];
				$notlp=$d["no_tlp"];
				$instagram=$d["instagram"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <nama_komunitas>$nama_komunitas</nama_komunitas>\n";
				print "  <deskripsi>$deskripsi</deskripsi>\n";
				print "  <kategori>$kategori</kategori>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "  <email>$email</email>\n";
				print "  <email>$no_tlp</no_tlp>\n";
				print "  <email>$instagram</instagram>\n";
				print "  <email>$username</username>\n";
				print "  <email>$password</password>\n";
				print "  <email>$status</status>\n";
				print "  <email>$keterangan</keterangan>\n";
				print "  <id_komunitas>$idkomunitas</id_komunitas>\n";
				print "</record>\n";
			}
	print "</komunitas>\n";
}
else{
	$null="null";
	print "<komunitas>\n";
		print "<record>\n";
				print "  <nama_komunitas>$null</nama_komunitas>\n";
				print "  <deskripsi>$null</deskripsi>\n";
				print "  <kategori>$null</kategori>\n";
				print "  <alamat>$null</alamat>\n";
				print "  <email>$null</email>\n";
				print "  <no_tlp>$null</no_tlp>\n";
				print "  <instagram>$null</instagram>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <status>$null</status>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <id_komunitas>$null</id_komunitas>\n";
		print "</record>\n";
	print "</komunitas>\n";
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
	