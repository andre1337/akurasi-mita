<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbgalery`";
if(getJum($conn,$sql)>0){
	print "<galery>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_galery=$d["id_galery"];
				$tanggal=$d["tanggal"];
				$id_komunitas=$d["id_komunitas"];
				$judulgambar=$d["judulgambar"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <tanggal>$tanggal</tanggal>\n";
				print "  <id_komunitas>$id_komunitas</id_komunitas>\n";
				print "  <judulgambar>$judulgambar</judulgambar>\n";
				print "  <deskripsi>$deskripsi</deskripsi>\n";
				print "  <status>$status</status>\n";
				print "  <status>$keterangan</status>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_galery>$id_galery</id_galery>\n";
				print "</record>\n";
			}
	print "</galery>\n";
}
else{
	$null="null";
	print "<galery>\n";
				print "<record>\n";
				print "  <tanggal>$null</tanggal>\n";
				print "  <id_komunitas>$null</id_komunitas>\n";
				print "  <judulgambar>$null</judulgambar>\n";				
				print "  <deskripsi>$null</deskripsi>\n";
				print "  <status>$null</status>\n";		
				print "  <status>$null</keterangan>\n";			
				print "  <gambar>$null</gambar>\n";
				print "  <id_galery>$null</id_galery>\n";
				print "</record>\n";
	print "</galery>\n";

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
	