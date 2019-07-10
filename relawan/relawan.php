<?php

$id_pendaftar=WKT(date("Y-m-d"));
$pro="simpan";
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
        $("#id_pendaftar").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('Relawan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
if($_GET["pro"]=="ubah"){
	$id_relawan=$_GET["kode"];
	$sql="select * from `$tbrelawan` where `id_relawan`='$id_relawan'";
	$d=getField($conn,$sql);
				$id_relawan=$d["id_relawan"];
				$id_pendaftar=$d["id_pendaftar"];
				$id_komunitas=WKT($d["id_komunitas"]);
				$tgl_join=$d["tgl_join"];
				$alasan=$d["alasan"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Relawan</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="63%" >


<tr>
<td height="41"><label for="tgl_join">Tanggal Join</label><td>:<td><input name="tgl_join" type="text" id="tgl_join" value="<?php echo $tgl_join;?>" size="25" />
</td>
</tr>

<tr>
<td height="82" valign="top"><label for="alasan">alasan</label><td valign="top">:<td><textarea name="alasan" cols="25" rows="3" class="form-control" id="alasan"><?php echo $alasan;?></textarea>
</td>
</tr>

<tr>
<td height="76" valign="top"><label for="keterangan">Keterangan</label><td valign="top">:<td><textarea name="keterangan" cols="25" rows="3" class="form-control" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td height="40"><label for="status">Status</label><td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Publish" <?php if($status=="Publish"){echo"checked";}?>/>Publish 
<input type="radio" name="status" id="status" value="Unpublish" <?php if($status=="Unpublish"){echo"checked";}?>/>Unpublish
</td></tr>


<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_relawan0" type="hidden" id="id_relawan0" value="<?php echo $id_relawan;?>" />
        <a href="?mnu=Relawan"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <?php  
  $sqlq="select distinct(status) from `$tbrelawan` order by `id_relawan` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>   
  <h3>Data Relawan <?php echo $status;?></h3>
  <div>

Data Relawan: 
| <a href="Relawan/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="Relawan/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="Relawan/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable">
  <tr bgcolor="#036">
    <th width="3%" bgcolor="#660F00">No</td>
    <th width="60%" bgcolor="#660F00">Uraian</td>
    <th width="15%" bgcolor="#660F00">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbrelawan` where status='$status' order by `id_relawan` desc";
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
				$id_relawan=$d["id_relawan"];
				$id_pendaftar=WKT($d["id_pendaftar"]);
				$id_komunitas=getKomunitas($conn,$d["id_komunitas"]);
				$tgl_join=$d["tgl_join"];
				$alasan=$d["alasan"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"Relawan/zoom.php?id=$id_relawan\")'>
<img src='$YPATH/$tbrelawan' width='120' height='100' /></a></div>";
				echo"</td>
				<td><strong>Judul : $tgl_join ($id_relawan)</strong><br>
				<strong>Date :</strong> $id_pendaftar<br>$alasan<br>
				$status</td>
				
				<td><div align='center'>
<a href='?mnu=Relawan&pro=ubah&kode=$id_relawan'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=Relawan&pro=hapus&kode=$id_relawan'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data Relawan ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data Relawan belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=Relawan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=Relawan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=Relawan'>Next »</a></span>";
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
	$id_relawan0=strip_tags($_POST["id_relawan0"]);
	$id_pendaftar=BAL(strip_tags($_POST["id_pendaftar"]));
	$id_komunitas=strip_tags($_POST["id_komunitas"]);
	$tgl_join=strip_tags($_POST["tgl_join"]);
	$alasan=strip_tags($_POST["alasan"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbrelawan` (
`id_relawan` ,
`id_pendaftar` ,
`id_komunitas` ,
`tgl_join` ,
`alasan` ,
`status` ,
`keterangan` 
) VALUES (
'', 
'$id_pendaftar',
'$id_komunitas', 
'$tgl_join',
'$alasan',
'$status', 
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_relawan berhasil disimpan !');document.location.href='?mnu=Relawan';</script>";}
		else{echo"<script>alert('Data $id_relawan gagal disimpan...');document.location.href='?mnu=Relawan';</script>";}
	}
	else{
	$sql="update `$tbrelawan` set 
	`id_pendaftar`='$id_pendaftar',
	`id_komunitas`='$id_komunitas',
	`tgl_join`='$tgl_join' ,
	`alasan`='$alasan',
	`keterangan`='$keterangan',
	`status`='$status'
	  where `id_relawan`='$id_relawan0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_relawan berhasil diubah !');document.location.href='?mnu=Relawan';</script>";}
		else{echo"<script>alert('Data $id_relawan gagal diubah...');document.location.href='?mnu=Relawan';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_relawan=$_GET["kode"];
$sql="delete from `$tbrelawan` where `id_relawan`='$id_relawan'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_relawan berhasil dihapus !');document.location.href='?mnu=Relawan';</script>";}
	else{echo"<script>alert('Data $id_relawan gagal dihapus...');document.location.href='?mnu=Relawan';</script>";}
}
?>

