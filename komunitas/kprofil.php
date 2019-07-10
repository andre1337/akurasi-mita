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



?>


 <hr class="colorgraph">

<form action="" method="post" enctype="multipart/form-data">
<table width="499">


<tr>
<td><label for="nama_komunitas">Nama Komunitas</label><td>:
<td colspan="2"><?php echo $nama_komunitas;?></td>
</tr>

<tr>
<td height="24" valign="top"><label for="deskripsi">Deskripsi</label><td valign="top">:<td colspan="2"><?php echo $deskripsi;?>
</td>
</tr>

<tr>
<td height="24"><label for="kategori">Kategori</label><td>:
<td><?php echo $kategori;?></td>
<td width="81" rowspan="4">
<center>
<?php 
echo"
<img src='$YPATH/$gambar0' width='100' height='120' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24" valign="top"><label for="alamat">Alamat</label><td valign="top">:<td colspan="2"><?php echo $alamat;?>
</td>
</tr>

<tr>
<td><label for="email">Email</label><td>:<td colspan="2"><?php echo $email;?></td></tr>

<tr>
<td><label for="no_tlp">No Tlp</label><td>:<td colspan="2"><?php echo $no_tlp;?></td></tr>

<tr>
<td><label for="instagram">Instagram</label><td>:<td colspan="2"><?php echo $instagram;?></td></tr>

<tr>
<td><label for="username">Username</label><td>:<td colspan="2"><?php echo $username;?></td></tr>

<tr>
<td height="35"><label for="status">Status</label>
<td>:<td colspan="2"><?php echo $status;?></td></tr>


<tr>
<td valign="top"><label for="keterangan">Keterangan</label><td valign="top">:<td colspan="2"><?php echo $keterangan;?></td></tr>


<tr>
  <td height="24"><strong>Gambar</strong>
  <td>:<td colspan="2"><label for="gambar"></label>
      <a href='#'><?php echo $gambar0;?></a></td>
</tr>


<td>
<td>
<td colspan="2">	
        <a href="?mnu=kprofil2"><input name="Batal" type="button" id="Batal" value="Update Profil" /></a>
</td></tr>
</table>
</form>
 <hr class="colorgraph">