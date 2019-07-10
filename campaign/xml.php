<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbcampaign`";
if(getJum($conn,$sql)>0){
	print "<campaign>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <judul_campaign>$judul_campaign</judul_campaign>\n";
				print "  <id_komunitas>$id_komunitas</id_komunitas>\n";
				print "  <uraian>$uraian</uraian>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <status>$status</status>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_campaign>$id_campaign</id_campaign>\n";
				print "</record>\n";
			}
	print "</campaign>\n";
}
else{
	$null="null";
	print "<campaign>\n";
				print "<record>\n";
				print "  <judul_campaign>$null</judul_campaign>\n";
				print "  <id_komunitas>$null</id_komunitas>\n";
				print "  <uraian>$null</uraian>\n";				
				print "  <keterangan>$null</keterangan>\n";
				print "  <status>$null</status>\n";				
				print "  <gambar>$null</gambar>\n";
				print "  <id_campaign>$null</id_campaign>\n";
				print "</record>\n";
	print "</campaign>\n";

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
	