<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data galery:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_galery</td>
    <th width="25%"><center>tanggal</td>
    <th width="25%"><center>id_komunitas</td>
    <th width="20%"><center>telp</td>
    <th width="10%"><center>deskripsi</td>
    <th width="5%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbgalery` order by `id_galery` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_galery=$d["id_galery"];
				$tanggal=$d["tanggal"];
				$id_komunitas=$d["id_komunitas"];
				$judulgambar=$d["judulgambar"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_galery</td>
				<td>$tanggal</td>
				<td>$id_komunitas</td>
				<td>$judulgambar</td>
				<td>$deskripsi</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_galery</td>
				<td>$tanggal</td>
				<td>$id_komunitas</td>
				<td>$judulgambar</td>
				<td>$deskripsi</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data galery belum tersedia...</blink></td></tr>";}
		
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

