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
	$id_komunitas=$_SESSION["cid"];
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
				
?>


 <hr class="colorgraph">

<form action="" method="post" enctype="multipart/form-data">
<table width="499">


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
<td valign="top"><label for="keterangan">Keterangan</label><td valign="top">:<td colspan="2"><textarea name="keterangan" cols="15" rows="3" id="keterangan"><?php echo $keterangan;?></textarea></td></tr>


<tr>
  <td height="24"><strong>Gambar</strong>
  <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("galery/zoom.php?id=<?php echo $id_galery;?>")'><?php echo $gambar0;?></a></td>
</tr>
<tr>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Update Profil" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_komunitas" type="hidden" id="id_komunitas" value="<?php echo $id_komunitas;?>" />
        <input name="id_komunitas0" type="hidden" id="id_komunitas0" value="<?php echo $id_komunitas0;?>" />
        <a href="?mnu=komunitas"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 <hr class="colorgraph">
<?php
if(isset($_POST["Simpan"])){
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
`keterangan`='$keterangan',
`gambar`='$gambar'
where `id_komunitas`='$id_komunitas'";

$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_komunitas berhasil diubah !');document.location.href='?mnu=kprofil';</script>";}
	else{echo"<script>alert('Data $id_komunitas gagal diubah...');document.location.href='?mnu=kprofil';</script>";}
}
?>
