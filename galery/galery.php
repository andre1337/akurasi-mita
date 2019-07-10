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
win=window.open('galery/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$id_galery=$_GET["kode"];
	$sql="select * from `$tbgalery` where `id_galery`='$id_galery'";
	$d=getField($conn,$sql);
				$id_galery=$d["id_galery"];
				$tanggal=$d["tanggal"];
				$id_komunitas=WKT($d["id_komunitas"]);
				$judulgambar=$d["judulgambar"];
				$deskripsi=$d["deskripsi"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Galery</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="63%" >


<tr>
<td height="24"><strong>Pilih Komunitas</strong><td>:
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
<td height="41"><label for="judulgambar">Judul Gambar</label><td>:<td><input name="judulgambar" type="text" id="judulgambar" value="<?php echo $judulgambar;?>" size="25" />
</td>
</tr>

<tr>
<td height="82" valign="top"><label for="deskripsi">Deskripsi</label><td valign="top">:<td><textarea name="deskripsi" cols="25" rows="3" class="form-control" id="deskripsi"><?php echo $deskripsi;?></textarea>
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
  <td height="24"><strong>Gambar</strong>
  <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("galery/zoom.php?id=<?php echo $id_galery;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_galery0" type="hidden" id="id_galery0" value="<?php echo $id_galery;?>" />
        <a href="?mnu=galery"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <?php  
  $sqlq="select distinct(status) from `$tbgalery` order by `id_galery` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>   
  <h3>Data Galery <?php echo $status;?></h3>
  <div>

Data galery: 
| <a href="galery/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="galery/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="galery/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable">
  <tr bgcolor="#036">
    <th width="3%" bgcolor="#660F00">No</td>
    <th width="20%" bgcolor="#660F00">Gambar</td>
    <th width="60%" bgcolor="#660F00">Uraian</td>
    <th width="15%" bgcolor="#660F00">Menu</td>
  </tr>
<?php  
  $sql="select * from `$tbgalery` where status='$status' order by `id_galery` desc";
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
				$id_galery=$d["id_galery"];
				$tanggal=WKT($d["tanggal"]);
				$id_komunitas=getKomunitas($conn,$d["id_komunitas"]);
				$judulgambar=$d["judulgambar"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"galery/zoom.php?id=$id_galery\")'>
<img src='$YPATH/$gambar' width='120' height='100' /></a></div>";
				echo"</td>
				<td><strong>Judul : $judulgambar ($id_galery)</strong><br>
				<strong>Date :</strong> $tanggal<br>$deskripsi<br>
				$status</td>
				
				<td><div align='center'>
<a href='?mnu=galery&pro=ubah&kode=$id_galery'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=galery&pro=hapus&kode=$id_galery'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data galery ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data galery belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=galery'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=galery'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=galery'>Next »</a></span>";
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
	$id_galery0=strip_tags($_POST["id_galery0"]);
	$tanggal=BAL(strip_tags($_POST["tanggal"]));
	$id_komunitas=strip_tags($_POST["id_komunitas"]);
	$judulgambar=strip_tags($_POST["judulgambar"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbgalery` (
`id_galery` ,
`tanggal` ,
`id_komunitas` ,
`judulgambar` ,
`deskripsi` ,
`status` ,
`keterangan`,
`gambar` 
) VALUES (
'', 
'$tanggal',
'$id_komunitas', 
'$judulgambar',
'$deskripsi',
'$status', 
'$keterangan',
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_galery berhasil disimpan !');document.location.href='?mnu=galery';</script>";}
		else{echo"<script>alert('Data $id_galery gagal disimpan...');document.location.href='?mnu=galery';</script>";}
	}
	else{
	$sql="update `$tbgalery` set 
	`tanggal`='$tanggal',
	`id_komunitas`='$id_komunitas',
	`judulgambar`='$judulgambar' ,
	`deskripsi`='$deskripsi',
	`keterangan`='$keterangan',
	`status`='$status',
	`gambar`='$gambar'
	  where `id_galery`='$id_galery0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_galery berhasil diubah !');document.location.href='?mnu=galery';</script>";}
		else{echo"<script>alert('Data $id_galery gagal diubah...');document.location.href='?mnu=galery';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_galery=$_GET["kode"];
$sql="delete from `$tbgalery` where `id_galery`='$id_galery'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_galery berhasil dihapus !');document.location.href='?mnu=galery';</script>";}
	else{echo"<script>alert('Data $id_galery gagal dihapus...');document.location.href='?mnu=galery';</script>";}
}
?>

