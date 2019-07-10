<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbdatauji`";
if(getJum($conn,$sql)>0){
	print "<komunitas>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_datauji=$d["id_datauji"];
				$k1=$d["k1"];
				$k2=$d["k2"];
				$k3=$d["k3"];
			    $k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];
				$k7=$d["k7"];
				$kategori=$d["kategori"];
				$keterangan=$d["keterangan"];

												
				print "<record>\n";
				print "  <k1>$k1</k1>\n";
				print "  <k2>$k2</k2>\n";
				print "  <k3>$k3</k3>\n";
				print "  <k4>$k4</k4>\n";
				print "  <k5>$k5</k5>\n";
				print "  <k5>$k6</k6>\n";
				print "  <k5>$k7</k7>\n";
				print "  <k5>$kategori</kategori>\n";
				print "  <k5>$keterangan</keterangan>\n";
				
				print "  <id_datauji>$id_datauji</id_datauji>\n";
				print "</record>\n";
			}
	print "</komunitas>\n";
}
else{
	$null="null";
	print "<komunitas>\n";
		print "<record>\n";
				print "  <k1>$null</k1>\n";
				print "  <k2>$null</k2>\n";
				print "  <k3>$null</k3>\n";
				print "  <k4>$null</k4>\n";
				print "  <k5>$null</k5>\n";
				print "  <k6>$null</k6>\n";
				print "  <k7>$null</k7>\n";
				print "  <kategori>$null</kategori>\n";
				print "  <keterangan>$null</keterangan>\n";			
				print "  <id_datauji>$null</id_datauji>\n";
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
	