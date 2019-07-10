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
  $id_pendaftaran=$_SESSION["cid"];
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
        $id_pendaftaran=$d["id_pendaftaran"];
  
        $gambar=$d["gambar"];
        $gambar0=$d["gambar"];
        
         

?>

<h3>Form Registrasi</h3>

 <hr class="colorgraph">

    

<form action="" method="post" enctype="multipart/form-data">
<table width="53%" >

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
        <a href="?mnu=rprofile"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
 <hr class="colorgraph">

    


<?php
if(isset($_POST["Simpan"])){
	





	$nama=strip_tags($_POST["nama"]);
	$email=strip_tags($_POST["email"]);
	$no_tlp=strip_tags($_POST["no_tlp"]);
	$alamat=strip_tags($_POST["alamat"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$status_ket="Aktif";
	$id_komunitas=strip_tags($_POST["id_komunitas"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
$sql="update `$tbpendaftaran` set 
  `nama`='$nama',
  `email`='$email',
  `no_tlp`='$no_tlp' ,
  `alamat`='$alamat',
  `username`='$username',
  `password`='$password',
   `status_ket`='$status_ket',
   `id_komunitas`='$id_komunitas',
  `gambar`='$gambar'
    where `id_pendaftaran`='".$_SESSION["cid"]."'";
  $ubah=process($conn,$sql);
    if($ubah) {echo "<script>alert('Data $id_pendaftaran berhasil diubah !');document.location.href='?mnu=rprofile';</script>";}
    else{echo"<script>alert('Data $id_pendaftaran gagal diubah...');document.location.href='?mnu=rprofile';</script>";}
  }//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pendaftaran=$_GET["kode"];
$sql="delete from `$tbpendaftaran` where `id_pendaftaran`='$id_pendaftaran'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_pendaftaran berhasil dihapus !');document.location.href='?mnu=rprofile';</script>";}
	else{echo"<script>alert('Data $id_pendaftaran gagal dihapus...');document.location.href='?mnu=rprofile';</script>";}
}
?>

