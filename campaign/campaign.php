<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('campaign/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>


<style>
input[type=text], select {
  width: 100%;
  padding: 4px 8px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 4px 8px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 2px;
  box-sizing: border-box;
}



</style>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 1px solid #ddd;
  padding: 2px;
}

#mytable tr:nth-child(even){background-color: #f2f2f2;}

#mytable tr:hover {background-color: #ddd;}

#mytable th {
  padding-top: 3px;
  padding-bottom: 3px;
  text-align: center;
  background-color: #e03838;
  color: white;
}
</style>


<?php
  $sql="select `id_campaign` from `$tbcampaign` order by `id_campaign` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="CPG".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_campaign"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_campaign=$idmax;
?>


<?php
if($_GET["pro"]=="ubah"){
	$id_campaign=$_GET["kode"];
	$sql="select * from `$tbcampaign` where `id_campaign`='$id_campaign'";
	$d=getField($conn,$sql);
				$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				
				$pro="ubah";		
}
?>


<div id="accordion">
  <h3>Input Data Campaign</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="58%" >
<tr>
<td width="183" valign="top"><label for="id_campaign">Id Campaign</label><td width="10">:
<td colspan="2"><b><?php echo $id_campaign;?></b></tr>
<tr>
<td height="34"><label for="judul_campaign">Judul Campaign</label><td>:<td width="422"><input name="judul_campaign" type="text" id="judul_campaign" value="<?php echo $judul_campaign;?>" size="20" />
</td>
</tr>

<tr>
<td height="24">Pilih Komunitas<td>:
<td>
  <select name="id_komunitas" id="id_komunitas">
    <option >Pilih Komunitas</option>
  <?php
	  $s="select * from `tb_komunitas`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$id_komunitas0=$d["id_komunitas"];
				$nama_komunitas=$d["nama_komunitas"];
	echo"<option value='$id_komunitas0' ";if($id_komunitas0==$id_komunitas){echo"selected";} echo">$id_komunitas0 - $nama_komunitas  </option>";
	}
	?>
  </select> </td>
</tr>


<tr>
<td height="24" valign="top"><label for="uraian">uraian</label>
<td valign="top">:<td><textarea  class="form-control" name="uraian" cols="25" rows="3" id="uraian"><?php echo $uraian;?></textarea>
</td>
</tr>

<tr>
<td height="24" valign="top"><label for="keterangan">keterangan</label>
<td valign="top">:<td><textarea  class="form-control" name="keterangan" cols="25" rows="3" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td><label for="status">status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
  <td height="24">gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("campaign/zoom.php?id=<?php echo $id_campaign;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_campaign" type="hidden" id="id_campaign" value="<?php echo $id_campaign;?>" />
        <input name="id_campaign0" type="hidden" id="id_campaign0" value="<?php echo $id_campaign0;?>" />
        <a href="?mnu=campaign"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <?php  
  $sqlq="select distinct(status) from `$tbcampaign` order by `id_campaign` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>   
  <h3>Data Campaign <?php echo $status;?></h3>
  <div>

Data campaign: 
| <a href="campaign/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="campaign/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="campaign/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable">
  <tr bgcolor="#036">
    <th width="3%">No</td>
    <th width="20%">Gambar</td>
    <th width="60%">Uraian</td>
    <th width="15%">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbcampaign` where status='$status' order by `id_campaign` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 2;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td  valign='top'>$no</td>
				<td  valign='top'><div align='center'>";
echo"<a href='#' onclick='buka(\"campaign/zoom.php?id=$id_campaign\")'>
<img src='$YPATH/$gambar' width='140' height='100' /></a></div>";
				echo"</td>
				<td  valign='top'><b>Judul :  $judul_campaign ($id_campaign)</b><br>
				$uraian    <br><b> Ket : </b></td>
				<td valign='top'><div align='center'>
<a href='?mnu=campaign&pro=ubah&kode=$id_campaign'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=campaign&pro=hapus&kode=$id_campaign'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data campaign ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data campaign belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=campaign'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=campaign'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=campaign'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
</div>
<?php }?>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_campaign=strip_tags($_POST["id_campaign"]);
	$id_campaign0=strip_tags($_POST["id_campaign"]);
	$judul_campaign=strip_tags($_POST["judul_campaign"]);
	$id_komunitas=strip_tags($_POST["id_komunitas"]);
	$uraian=strip_tags($_POST["uraian"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbcampaign` (
`id_campaign` ,
`judul_campaign` ,
`id_komunitas` ,
`uraian` ,
`keterangan` ,
`status` ,
`gambar` 
) VALUES (
'$id_campaign', 
'$judul_campaign',
'$id_komunitas', 
'$uraian',
'$keterangan',
'$status', 
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_campaign berhasil disimpan !');document.location.href='?mnu=campaign';</script>";}
		else{echo"<script>alert('Data $id_campaign gagal disimpan...');document.location.href='?mnu=campaign';</script>";}
	}
	else{
	$sql="update `$tbcampaign` set `judul_campaign`='$judul_campaign',`id_komunitas`='$id_komunitas',`uraian`='$uraian' ,`keterangan`='$keterangan',`status`='$status',
	`gambar`='$gambar'  where `id_campaign`='$id_campaign0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_campaign berhasil diubah !');document.location.href='?mnu=campaign';</script>";}
		else{echo"<script>alert('Data $id_campaign gagal diubah...');document.location.href='?mnu=campaign';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_campaign=$_GET["kode"];
$sql="delete from `$tbcampaign` where `id_campaign`='$id_campaign'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_campaign berhasil dihapus !');document.location.href='?mnu=campaign';</script>";}
	else{echo"<script>alert('Data $id_campaign gagal dihapus...');document.location.href='?mnu=campaign';</script>";}
}
?>

