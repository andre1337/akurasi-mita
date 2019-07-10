<?php
session_start();
?>

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




<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">



<form method="post">
      <h2>Sign in <small>manage your account</small></h2>
      <hr class="colorgraph">

      <div class="form-group">
        <input type="text" name="user" id="email" class="form-control input-lg" placeholder="Input Username" tabindex="4">
      </div>
      <div class="form-group">
        <input type="password" class="form-control input-lg"  name="pass" id="pass" placeholder="Password">
      </div>

      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" name="Login" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        <div class="col-xs-12 col-md-6">Don't have an account? <a href="index.php?mnu=register">Register</a></div>
      </div>
    </form>

</div>
</div>

<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql2="select * from `$tbkomunitas` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql3="select * from `$tbpendaftaran` where `username`='$usr' and `password`='$pas' and `status_ket`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["kode_admin"];
				$nama=$d["username"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Administrator";
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		elseif(getJum($conn,$sql2)>0){
			 $d2=getField($conn,$sql2);
        $kode=$d2["id_komunitas"];
        $nama=$d2["nama_komunitas"];
           $_SESSION["cid"]=$kode;
           $_SESSION["cnama"]=$nama;
           $_SESSION["cstatus"]="Komunitas";
    echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
    document.location.href='index.php?mnu=home';</script>";
    }
  elseif(getJum($conn,$sql3)>0){
       $d3=getField($conn,$sql3);
        $kode=$d3["id_pendaftaran"];
        $nama=$d3["nama"];
           $_SESSION["cid"]=$kode;
           $_SESSION["cnama"]=$nama;
           $_SESSION["cstatus"]="Pendaftaran";
    echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
    document.location.href='index.php?mnu=home';</script>";
    }
		else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
		}
}


?>