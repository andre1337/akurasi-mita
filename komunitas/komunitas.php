<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
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
win=window.open('komunitas/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, email=0'); } 
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


textarea, select {
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
  $sql="select `id_komunitas` from `tb_komunitas` order by `id_komunitas` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="KOM".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_komunitas"];
   
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
  $id_komunitas=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_komunitas=$_GET["kode"];
	$sql="select * from `tb_komunitas` where `id_komunitas`='$id_komunitas'";
	$d=getField($conn,$sql);
				$id_komunitas=$d["id_komunitas"];
				$nama_komunitas=$d["nama_komunitas"];
				$deskripsi=$d["deskripsi"];
				$kategori=$d["kategori"];
				$alamat=$d["alamat"];
				$email=$d["email"];
				$no_tlp=$d["no_tlp"];
				$instagram=$d["instagram"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];	
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";	
}
?>


<div id="accordion">
  <h3>Input Data Komunitas</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="499">


<tr>
<td width="156"><label for="id_komunitas">Id Komunitas</label>
<td width="9">:
<td width="318" colspan="2"><b><?php echo $id_komunitas;?></b>
</tr>

<tr>
<td><label for="nama_komunitas">Nama Komunitas</label><td>:
<td colspan="2"><input name="nama_komunitas" type="text" id="nama_komunitas" value="<?php echo $nama_komunitas;?>" size="30" /></td>
</tr>

<tr>
<td height="24" valign="top"><label for="deskripsi">Deskripsi</label><td valign="top">:<td colspan="2"><textarea name="deskripsi" cols="15" rows="3" id="deskripsi"><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
<td height="24"><label for="kategori">Kategori</label><td>:
<td>
  <select name="kategori" id="kategori">
    <option value="Lingkungan" <?php if($kategori=="Lingkungan"){echo"selected";}?>>Lingkungan</option>
    <option value="Pendidikan"  <?php if($kategori=="Pendidikan"){echo"selected";}?>>Pendidikan</option>
    <option value="Kesehatan"  <?php if($kategori=="Kesehatan"){echo"selected";}?>>Kesehatan</option>
    <option value="Budaya"  <?php if($kategori=="Budaya"){echo"selected";}?>>Budaya</option>
  </select> </td>
</tr>

<tr>
<td height="24" valign="top"><label for="alamat">Alamat</label><td valign="top">:<td colspan="2"><textarea name="alamat" cols="25" id="alamat"><?php echo $alamat;?></textarea>
</td>
</tr>

<tr>
<td><label for="email">Email</label><td>:<td colspan="2"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="15" /></td></tr>

<tr>
<td><label for="no_tlp">No Tlp</label><td>:<td colspan="2"><input name="no_tlp" type="text" id="no_tlp" value="<?php echo $no_tlp;?>" size="15" /></td></tr>

<tr>
<td><label for="instagram">Instagram</label><td>:<td colspan="2"><input name="instagram" type="text" id="instagram" value="<?php echo $instagram;?>" size="15" /></td></tr>

<tr>
<td><label for="username">Username</label><td>:<td colspan="2"><input name="username" type="text" id="username" value="<?php echo $username;?>" size="15" /></td></tr>

<tr>
<td><label for="password">Password</label><td>:<td colspan="2"><input name="password" type="password" id="password" value="<?php echo $password;?>" size="15" /></td></tr>
<tr>

<tr>
<td height="35"><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>


<tr>
<td valign="top"><label for="keterangan">Keterangan</label><td valign="top">:<td colspan="2"><textarea name="keterangan" cols="15" rows="3" id="keterangan"><?php echo $keterangan;?></textarea></td></tr>


<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_komunitas" type="hidden" id="id_komunitas" value="<?php echo $id_komunitas;?>" />
        <input name="id_komunitas0" type="hidden" id="id_komunitas0" value="<?php echo $id_komunitas0;?>" />
        <a href="?mnu=komunitas"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
 </div>
  <?php  
  $sqlq="select distinct(kategori) from `tb_komunitas` order by `id_komunitas` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];

?>   
  <h3>Data Komunitas <?php echo $kategori;?></h3>
  <div>

Data komunitas: 
| <a href="komunitas/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="komunitas/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="komunitas/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable" style="font-size:12px">
  <tr bgcolor="#036">
    <th width="10%"><center>No</th>
    <th width="60%"><center>Uraian</th>
    <th width="20%"><center>Status</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `tb_komunitas` where kategori='$kategori' order by `id_komunitas` desc";
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
				$id_komunitas=$d["id_komunitas"];
				$nama_komunitas=$d["nama_komunitas"];
				$deskripsi=$d["deskripsi"];
				$kategori=$d["kategori"];
				$alamat=$d["alamat"];
				$email=$d["email"];
				$no_tlp=$d["no_tlp"];
				$instagram=$d["instagram"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td valign='top'>$no</td>
				<td valign='top'><strong>Nama Komunitas : </strong>$nama_komunitas<br>
					$deskripsi<br> <strong>Alamat : </strong>$alamat <br>
				<strong>Kategori : </strong>$kategori || <strong>IG : </strong>$instagram || <strong>Status : </strong>$status   ||<strong> No Tlp  : </strong>$no_tlp , $email<br>
				</td>
				<td valign='top'>$status</td>
				
				<td valign='top' align='center'>
<a href='?mnu=komunitas&pro=ubah&kode=$id_komunitas'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=komunitas&pro=hapus&kode=$id_komunitas'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_komunitas pada data komunitas ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data komunitas belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=komunitas'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=komunitas'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=komunitas'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
<?php }?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_komunitas=strip_tags($_POST["id_komunitas"]);
	$id_komunitas0=strip_tags($_POST["id_komunitas0"]);
	$nama_komunitas=strip_tags($_POST["nama_komunitas"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	$kategori=strip_tags($_POST["kategori"]);
	$alamat=strip_tags($_POST["alamat"]);
	$email=strip_tags($_POST["email"]);
	$no_tlp=strip_tags($_POST["no_tlp"]);
	$instagram=strip_tags($_POST["instagram"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
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
$sql=" INSERT INTO `tb_komunitas` (
`id_komunitas` ,
`nama_komunitas` ,
`deskripsi` ,
`kategori` ,
`alamat` ,
`email` ,
`no_tlp`,
`instagram`,
`username`,
`password`,
`status`,
`keterangan`,
`gambar`
) VALUES (
'$id_komunitas', 
'$nama_komunitas', 
'$deskripsi',
'$kategori',
'$alamat',
'$email',
'$no_tlp',
'$instagram',
'$username',
'$password',
'$status',
'$keterangan',
'$gambar'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_komunitas berhasil disimpan !');document.location.href='?mnu=komunitas';</script>";}
		else{echo"<script>alert('Data $id_komunitas gagal disimpan...');document.location.href='?mnu=komunitas';</script>";}
	}
	else{
$sql="update `tb_komunitas` set 
`nama_komunitas`='$nama_komunitas',
`deskripsi`='$deskripsi' ,
`kategori`='$kategori',
`email`='$email',
`alamat`='$alamat',
`no_tlp`='$no_tlp' ,
`instagram`='$instagram', 
`username`='$username' ,
`password`='$password' ,
`status`='$status' ,
`keterangan`='$keterangan',
`gambar`='$gambar'
where `id_komunitas`='$id_komunitas'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_komunitas berhasil diubah !');document.location.href='?mnu=komunitas';</script>";}
	else{echo"<script>alert('Data $id_komunitas gagal diubah...');document.location.href='?mnu=komunitas';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_komunitas=$_GET["kode"];
$sql="delete from `tb_komunitas` where `id_komunitas`='$id_komunitas'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data komunitas $id_komunitas berhasil dihapus !');document.location.href='?mnu=komunitas';</script>";}
else{echo"<script>alert('Data komunitas $id_komunitas gagal dihapus...');document.location.href='?mnu=komunitas';</script>";}
}
?>

