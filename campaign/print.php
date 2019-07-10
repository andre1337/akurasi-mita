<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data campaign:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_campaign</td>
    <th width="25%"><center>judul_campaign</td>
    <th width="25%"><center>id_komunitas</td>
    <th width="20%"><center>telp</td>
    <th width="10%"><center>keterangan</td>
    <th width="5%"><center>status</td>
  </tr>
<?php  
  $sql="select * from `$tbcampaign` order by `id_campaign` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_campaign</td>
				<td>$judul_campaign</td>
				<td>$id_komunitas</td>
				<td>$uraian</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_campaign</td>
				<td>$judul_campaign</td>
				<td>$id_komunitas</td>
				<td>$uraian</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data campaign belum tersedia...</blink></td></tr>";}
		
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

