<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbrelawan`";
if(getJum($conn,$sql)>0){
	print "<Relawan>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_relawan=$d["id_relawan"];
				$id_pendaftar=$d["id_pendaftar"];
				$id_komunitas=$d["id_komunitas"];
				$tgl_join=$d["tgl_join"];
				$alasan=$d["alasan"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
								
				print "<record>\n";
				print "  <id_pendaftar>$id_pendaftar</id_pendaftar>\n";
				print "  <id_komunitas>$id_komunitas</id_komunitas>\n";
				print "  <tgl_join>$tgl_join</tgl_join>\n";
				print "  <alasan>$alasan</alasan>\n";
				print "  <status>$status</status>\n";
				print "  <status>$keterangan</status>\n";
				print "  <id_relawan>$id_relawan</id_relawan>\n";
				print "</record>\n";
			}
	print "</Relawan>\n";
}
else{
	$null="null";
	print "<Relawan>\n";
				print "<record>\n";
				print "  <id_pendaftar>$null</id_pendaftar>\n";
				print "  <id_komunitas>$null</id_komunitas>\n";
				print "  <tgl_join>$null</tgl_join>\n";				
				print "  <alasan>$null</alasan>\n";
				print "  <status>$null</status>\n";		
				print "  <status>$null</keterangan>\n";	
				print "  <id_relawan>$null</id_relawan>\n";
				print "</record>\n";
	print "</Relawan>\n";

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