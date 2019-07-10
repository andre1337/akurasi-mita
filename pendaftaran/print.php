<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data pendaftaran:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_pendaftaran</td>
    <th width="10%"><center>nama</td>
    <th width="10%"><center>email</td>
    <th width="10%"><center>no_tlp</td>
    <th width="10%"><center>alamat</td>
    <th width="25%"><center>username</td>
    <th width="25%"><center>password</td>
    <th width="20%"><center>status_ket</td>
    <th width="10%"><center>id_komunitas</td>
    <th width="10%"><center>gambar</td>
  </tr>
<?php  
  $sql="select * from `$tbpendaftaran` order by `id_pendaftaran` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_pendaftaran=$d["id_pendaftaran"];
				$id_pendaftaran=$d["nama"];
				$id_pendaftaran=$d["email"];
				$id_pendaftaran=$d["no_tlp"];
				$id_pendaftaran=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["status_ket"];
				$email=$d["id_komunitas"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];

if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_pendaftaran</td>
				<td>$nama</td>
				<td>$email</td>
				<td>$no_tlp</td>
				<td>$alamat</td>
				<td>$username</td>
				<td>$status_ket</td>
				<td>$id_komunitas</td>
				<td>$gambar</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_pendaftaran</td>
				<td>$nama</td>
				<td>$email</td>
				<td>$no_tlp</td>
				<td>$alamat</td>
				<td>$username</td>
				<td>$status_ket</td>
				<td>$id_komunitas</td>
				<td>$gambar</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pendaftaran belum tersedia...</blink></td></tr>";}
		
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

