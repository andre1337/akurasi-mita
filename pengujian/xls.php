<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_pengujian".$separator ."tgl".$separator ."jam".$separator ."nama_pengujian".$separator ."nama".$separator ."email".$separator."no_tlp".$separator."k2".$separator."k3".$separator."k4".$separator."k5".$separator."k6".$separator."k7".$separator."kategori".$separator."rekapitulasi".$separator."keterangan".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_pengujian`,`tgl`,`jam`,`nama_pengujian`,`nama`,`email`,`no_tlp`,`k2`,`k3`,`k4`,`k5`,`k6`,`k7`,`kategori`,`rekapitulasi`,`keterangan` from `$tbpengujian` order by `id_pengujian` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_pengujian"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tgl"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jam"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_pengujian"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["email"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["no_tlp"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k2"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k3"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k4"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k5"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k6"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["k7"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kategori"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["rekapitulasi"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["keterangan"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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