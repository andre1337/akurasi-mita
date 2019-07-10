<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpengujian`";
if(getJum($conn,$sql)>0){
	print "<komunitas>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$nama_pengujian=$d["nama_pengujian"];
			    $nama=$d["nama"];
				$email=$d["email"];
				$k1=$d["no_tlp"];
				$k2=$d["k2"];
				$k3=$d["k3"];
				$k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];
				$k7=$d["k7"];	
				$kategori=$d["kategori"];	
				$rekapitulasi=$d["rekapitulasi"];	
				$keterangan=$d["keterangan"];		
}
												
				print "<record>\n";
				print "  <tgl>$tgl</tgl>\n";
				print "  <jam>$jam</jam>\n";
				print "  <nama_pengujian>$nama_pengujian</nama_pengujian>\n";
				print "  <nama>$nama</nama>\n";
				print "  <email>$email</email>\n";
				print "  <email>$k1</k1\n";
				print "  <email>$k2</k2>\n";
				print "  <email>$k3</k3>\n";
				print "  <email>$k4</k4>\n";
				print "  <email>$k5</k5>\n";
				print "  <email>$k6</k6>\n";
				print "  <email>$k7</k7>\n";
				print "  <email>$kategori</kategori>\n";
				print "  <email>$rekapitulasi</rekapitulasi>\n";
				print "  <email>$keterangan</keterangan>\n";
				print "  <id_pengujian>$id_pengujian</id_pengujian>\n";
				print "</record>\n";
			}
	print "</komunitas>\n";
}
else{
	$null="null";
	print "<komunitas>\n";
		print "<record>\n";
				print "  <tgl>$null</tgl>\n";
				print "  <jam>$null</jam>\n";
				print "  <nama_pengujian>$null</nama_pengujian>\n";
				print "  <nama>$null</nama>\n";
				print "  <email>$null</email>\n";
				print "  <no_tlp>$null</no_tlp>\n";
				print "  <k2>$null</k2>\n";
				print "  <k3>$null</k3>\n";
				print "  <k4>$null</k4>\n";
				print "  <k5>$null</k5>\n";
				print "  <k6>$null</k6>\n";
				print "  <k6>$null</k7>\n";
				print "  <k6>$null</kategori>\n";
				print "  <k6>$null</rekapitulasi>\n";
				print "  <k6>$null</keterangan>\n";
				print "  <id_pengujian>$null</id_pengujian>\n";
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
	