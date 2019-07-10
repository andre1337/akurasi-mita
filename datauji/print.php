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
    <th width="10%"><center>id_datauji</td>
    <th width="25%"><center>k1</td>
    <th width="25%"><center>k2</td>
    <th width="20%"><center>k3</td>
    <th width="10%"><center>k4</td>
    <th width="5%"><center>k5</td>
    <th width="5%"><center>k6</td>
    <th width="5%"><center>k7</td>
    <th width="5%"><center>kategori</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbdatauji` order by `id_datauji` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
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
	
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_datauji</td>
				<td>$k1</td>
				<td>$k2</td>
				<td>$k3</td>
				<td>$k4</td>
				<td>$k5</td>
				<td>$k6</td>
				<td>$k7</td>
				<td>$kategori</td>
				<td>$keterangan</td>

				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_datauji</td>
				<td>$k1</td>
				<td>$k2</td>
				<td>$k3</td>
				<td>$k4</td>
				<td>$k5</td>
				<td>$k7</td>
				<td>$kategori</td>
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

