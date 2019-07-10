<?php
include"../konmysqli.php";

echo"<link href='../$PATH/$css' rel='stylesheet' type='text/css' />";
$sql="SELECT `gambar` FROM `$tbadmin` WHERE `kode_admin`='".$_GET["id"]."'";
if(getJum($conn,$sql)>0){
	$d = getField($conn,$sql);
	$gambar=$d["gambar"];
}
else{$gambar="avatar.jpg";	}
echo "<p align=center><img src='../$YPATH/$gambar' border='0' width='100%' height='100%'></p>";
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}


function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);

	$rs->free();
	return $arr;
}
?>
