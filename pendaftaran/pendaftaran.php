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
win=window.open('pendaftaran/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, username=0'); } 
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
  $sql="select `id_pendaftaran` from `$tbpendaftaran` order by `id_pendaftaran` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="KDP".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pendaftaran"];
   
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
  $id_pendaftaran=$idmax;
?>


<?php
if($_GET["pro"]=="ubah"){
	$id_pendaftaran=$_GET["kode"];
	$sql="select * from `$tbpendaftaran` where `id_pendaftaran`='$id_pendaftaran'";
	$d=getField($conn,$sql);
				$id_pendaftaran=$d["id_pendaftaran"];
				$nama=$d["nama"];
				$email=$d["email"];
				$no_tlp=$d["no_tlp"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$status_ket=$d["status_ket"];
				$id_komunitas=$d["id_komunitas"];
	
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Pendaftaran</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="53%" >
<tr>
<td width="181"><label for="id_pendaftaran">Id Pendaftaran</label>
<td width="9">:
<td colspan="2"><b><?php echo $id_pendaftaran;?></b></tr>
<tr>
<td><label for="nama">Nama</label><td>:<td width="258"><input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="20" />
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
<td height="24"><label for="email">Email</label><td>:<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="20" /></td>
</tr>


<tr>
<td height="24"><label for="no_tlp">No Tlp</label><td>:<td><input name="no_tlp" type="text" id="no_tlp" value="<?php echo $no_tlp;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="alamat">Alamat</label><td>:<td><input name="alamat" type="text" id="alamat" value="<?php echo $alamat;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="username">User</label><td>:<td><input name="username" type="text" id="username" value="<?php echo $username;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="password">Password</label><td>:<td><input name="password" type="password" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>

<tr>
<td height="35"><label for="status_ket">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status_ket" id="status_ket"  checked="checked" value="Aktif" <?php if($status_ket=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status_ket" id="status_ket" value="Tidak Aktif" <?php if($status_ket=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>


<tr>
  <td height="24">Gambar<td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("pendaftaran/zoom.php?id=<?php echo $id_pendaftaran;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_pendaftaran" type="hidden" id="id_pendaftaran" value="<?php echo $id_pendaftaran;?>" />
        <input name="id_pendaftaran0" type="hidden" id="id_pendaftaran0" value="<?php echo $id_pendaftaran0;?>" />
        <a href="?mnu=pendaftaran"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <?php  
  $sqlq="select distinct(status_ket) from `$tbpendaftaran` order by `id_pendaftaran` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status_ket=$dq["status_ket"];

?>   
  <h3>Data Pendaftaran <?php echo $status_ket;?></h3>
  <div>
Data pendaftaran: 
| <a href="pendaftaran/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="pendaftaran/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="pendaftaran/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
<table id="mytable">
  <tr >
    <th width="3%" height="32" bgcolor="#FF9933">No </th>
    <th width="15%" bgcolor="#FF9933">Nama  </th>
    <th width="15%" bgcolor="#FF9933">Email </th>
    <th width="10%" bgcolor="#FF9933">No Telp </th>
    <th width="10%" bgcolor="#FF9933">Alamat </th>
    <th width="10%" bgcolor="#FF9933">Username </th>
    <th width="10%" bgcolor="#FF9933">Password </th>
    <th width="10%" bgcolor="#FF9933">Komunitas </th>
    <th width="15%" bgcolor="#FF9933">Menu </th>
  </tr>
  <?php  
  $sql="select * from `$tbpendaftaran` where status_ket='$status_ket' order by `id_pendaftaran` desc";
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
				$id_pendaftaran=$d["id_pendaftaran"];
				$nama=$d["nama"];
				$email=$d["email"];
				$no_tlp=$d["no_tlp"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$status_ket=$d["status_ket"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr>
				<td>$no</td>
				<td>$nama</td>
				<td>$email</td>
				<td>$alamat</td>
				<td>$no_tlp</td>
				<td>$username</td>
				<td>$password</td>
				<td>$keterangan</td>
			
				<td><div align='center'>
<a href='?mnu=pendaftaran&pro=ubah&kode=$id_pendaftaran'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pendaftaran&pro=hapus&kode=$id_pendaftaran'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data pendaftaran ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pendaftaran belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pendaftaran'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pendaftaran'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pendaftaran'>Next »</a></span>";
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
	$id_pendaftaran=strip_tags($_POST["id_pendaftaran"]);
	$id_pendaftaran0=strip_tags($_POST["id_pendaftaran"]);
	$nama=strip_tags($_POST["nama"]);
	$email=strip_tags($_POST["email"]);
	$no_tlp=strip_tags($_POST["no_tlp"]);
	$alamat=strip_tags($_POST["alamat"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$status_ket=strip_tags($_POST["status_ket"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
echo $sql=" INSERT INTO `$tbpendaftaran` (
`id_pendaftaran` ,
`nama` ,
`email` ,
`no_tlp` ,
`alamat` ,
`username` ,
`password` ,
`status_ket` ,
`keterangan` ,
`gambar` 
) VALUES (
'$id_pendaftaran', 
'$nama' ,
'$email' ,
'$no_tlp' ,
'$alamat',
'$username' ,
'$password' ,
'$status_ket' ,
'$keterangan' ,
'$gambar' 
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_pendaftaran berhasil disimpan !');document.location.href='?mnu=pendaftaran';</script>";}
		else{echo"<script>alert('Data $id_pendaftaran gagal diubah...');document.location.href='?mnu=pendaftaran';</script>";}
	}//else simpan}
	else{
	$sql="update `$tbpendaftaran` set 
	`nama`='$nama',
	`email`='$email',
	`no_tlp`='$no_tlp' ,
	`alamat`='$alamat',
	`username`='$username',
	`password`='$password',
	 `status_ket`='$status_ket',
	 `keterangan`='$keterangan',
	`gambar`='$gambar'
	  where `id_pendaftaran`='$id_pendaftaran0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_pendaftaran berhasil diubah !');document.location.href='?mnu=pendaftaran';</script>";}
		else{echo"<script>alert('Data $id_pendaftaran gagal diubah...');document.location.href='?mnu=pendaftaran';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pendaftaran=$_GET["kode"];
$sql="delete from `$tbpendaftaran` where `id_pendaftaran`='$id_pendaftaran'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_pendaftaran berhasil dihapus !');document.location.href='?mnu=pendaftaran';</script>";}
	else{echo"<script>alert('Data $id_pendaftaran gagal dihapus...');document.location.href='?mnu=pendaftaran';</script>";}
}
?>

