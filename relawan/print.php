<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data Relawan:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_relawan</td>
    <th width="25%"><center>id_pendaftar</td>
    <th width="25%"><center>id_komunitas</td>
    <th width="20%"><center>telp</td>
    <th width="10%"><center>alasan</td>
    <th width="5%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbrelawan` order by `id_relawan` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_relawan=$d["id_relawan"];
				$id_pendaftar=$d["id_pendaftar"];
				$id_komunitas=$d["id_komunitas"];
				$tgl_join=$d["tgl_join"];
				$alasan=$d["alasan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_relawan</td>
				<td>$id_pendaftar</td>
				<td>$id_komunitas</td>
				<td>$tgl_join</td>
				<td>$alasan</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_relawan</td>
				<td>$id_pendaftar</td>
				<td>$id_komunitas</td>
				<td>$tgl_join</td>
				<td>$alasan</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data Relawan belum tersedia...</blink></td></tr>";}
		
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
</table>

