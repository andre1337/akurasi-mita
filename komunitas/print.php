<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data komunitas:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_komunitas</td>
    <th width="25%"><center>nama_komunitas</td>
    <th width="25%"><center>deskripsi</td>
    <th width="20%"><center>kategori</td>
    <th width="10%"><center>alamat</td>
    <th width="5%"><center>email</td>
    <th width="5%"><center>no_tlp</td>
    <th width="5%"><center>instagram</td>
    <th width="5%"><center>username</td>
    <th width="5%"><center>password</td>
    <th width="5%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbkomunitas` order by `id_komunitas` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$idkomunitas=$d["id_komunitas"];
				$nama_komunitas=$d["nama_komunitas"];
				$deskripsi=$d["deskripsi"];
				$kategori=$d["kategori"];
				$alamat=$d["alamat"];
				$email=$d["email"];
				$notlp=$d["no_tlp"];
				$instagram=$d["instagram"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$idkomunitas</td>
				<td>$nama_komunitas</td>
				<td>$deskripsi</td>
				<td>$kategori</td>
				<td>$alamat</td>
				<td>$email</td>
				<td>$no_tlp</td>
				<td>$instagram</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$idkomunitas</td>
				<td>$nama_komunitas</td>
				<td>$deskripsi</td>
				<td>$kategori</td>
				<td>$alamat</td>
				<td>$email</td>
				<td>$instagram</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				<td>$keterangan</td>

				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data komunitas belum tersedia...</blink></td></tr>";}
		
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

