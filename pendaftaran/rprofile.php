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
win=window.open('pendaftaran/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, email=0'); } 
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
        
        $pro="ubah";    
				

?>



<h3>Profile Pendaftar</h3>

 <hr class="colorgraph">

    

<form action="" method="post" enctype="multipart/form-data">
<table width="53%" >

<td><label for="nama">Nama</label><td>:<td width="258"><?php echo $nama;?>
</td>

</tr>

<tr>
<td height="24"><label for="email">Email</label><td>:<td><?php echo $email;?></td>
</tr>


<tr>
<td height="24"><label for="no_tlp">No Tlp</label><td>:<td><?php echo $no_tlp;?>
</td>
</tr>

<tr>
<td height="24"><label for="alamat">Alamat</label><td>:<td><?php echo $alamat;?>
</td>
</tr>

<tr>
<td height="24"><label for="username">User</label><td>:<td><?php echo $username;?>
</td>
</tr>


<tr>
<td>
<td>
<td colspan="2"><a href="?mnu=rprofile2"><input  type="button"  value="Update Profil" /></a>
</td></tr>
</table>
</form>
 <hr class="colorgraph">
