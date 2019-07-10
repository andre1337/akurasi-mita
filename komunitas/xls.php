<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_komunitas".$separator ."nama_komunitas".$separator ."deskripsi".$separator ."kategori".$separator ."alamat".$separator ."email".$separator."no_tlp".$separator."instagram".$separator."username".$separator."password".$separator."status".$separator."keterangan".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_komunitas`,`nama_komunitas`,`deskripsi`,`kategori`,`alamat`,`email`,`no_tlp`,`instagram`,`username`,`password`,`status`,`keterangan' from `$tbkomunitas` order by `id_komunitas` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_komunitas"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_komunitas"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["deskripsi"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kategori"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["alamat"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["email"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["no_tlp"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["instagram"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["username"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["password"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status"];$buffer .= "\"".$value."\"".$separator; 
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