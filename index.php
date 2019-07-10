<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

$cr1="Jenis Kelamin";
$cr2="Umur";
$cr3="Hobi";
$cr4="Karakter";
$cr5="Pengalaman Organisasi";
$cr6="Jumlah Kegiatan Yang Pernah Di ikuti";
$cr7="Jurusan";
$cr8="Riwayat Penyakit";


?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Aplikasi Rekomendasi Naive Bayes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="css/cubeportfolio.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />

<!-- Theme skin -->
<link id="t-colors" href="skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>



<div id="wrapper">
	<!-- start header -->
	<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
						<img src="img/volunteer.png" alt="" width="35%"  /></a>
						</div>
						<div class="col-md-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						</div>


						</div>
					</div>
				</div>
			</div>	
			
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                 
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <?php
if($_SESSION["cstatus"]=="Administrator"){  
      echo"
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=home'>Home</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=admin'>Admin</a></li>
      <li class='nav-item'><a  class='nav-link' href='index.php?mnu=komunitas'>Komunitas</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=galery'>galery</a></li>
      <li class='nav-item'> <a class='nav-link' href='index.php?mnu=campaign'>campaign</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=datauji'>datauji</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=pengujian'>pengujian</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=pendaftaran'>pendaftaran</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=relawan'>relawan</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=akurasi'>Akurasi Data</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=logout'>Logout</a></li>";
  }elseif($_SESSION["cstatus"]=="Komunitas"){  
      echo"
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=home'>Home</a></li>
      <li class='nav-item'><a  class='nav-link' href='index.php?mnu=kprofil'>Profil</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=kgalery'>galery</a></li>
      <li class='nav-item'> <a class='nav-link' href='index.php?mnu=kcampaign'>campaign</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=logout'>Logout</a></li>";
  }elseif($_SESSION["cstatus"]=="Pendaftaran"){  
      echo"
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=home'>Home</a></li>
      <li class='nav-item'><a  class='nav-link' href='index.php?mnu=bkomunitas'>Komunitas</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=cgalery'>galery</a></li>
      <li class='nav-item'> <a class='nav-link' href='index.php?mnu=ccampaign'>campaign</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=rprofile'>profile</a></li>
      <li class='nav-item'><a class='nav-link' href='index.php?mnu=logout'>Logout</a></li>";
  }else{
   echo"<li class='nav-item'><a class='nav-link' href='index.php?mnu=home'>Home</a></li>";
   echo"<li class='nav-item'><a class='nav-link' href='index.php?mnu=ppengujian'>Pengujian</a></li>";
   echo"<li class='nav-item'><a class='nav-link' href='index.php?mnu=registrasi'>Registrasi</a></li>";
   echo"<li class='nav-item'><a class='nav-link' href='index.php?mnu=registrasikomunitas'>Daftar Komunitas</a></li>";
   echo"<li class='nav-item'><a class='nav-link' href='index.php?mnu=login'>Login</a></li>
   "
   ;   }
      ?>

                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="featured" class="bg">
	<!-- start slider -->

			
	
<?php if($mnu=="" || $mnu=="home"){?><!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="main-slider flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/flexslider/foto8.jpg" alt="" />
                <div class="flex-caption">
                    <h3></h3> 
					<p>Kita menyalahgunakan lahan karena kita menganggapnya sebagai komoditas milik kita. Bila kita melihat lahan sebagai komunitas tempat kita berada, kita mungkin mulai menggunakannya dengan cinta dan rasa hormat.</p> 
                </div>
              </li>
              <li>
                <img src="img/slides/flexslider/foto2.jpg" alt="" />
                <div class="flex-caption">
					<p>Dengan berbagi, kamu tak akan pernah kekurangan. Dan saat yang tepat untuk berbagi adalah disaat kamu dalam kekurangan.</p> 
                </div>
              </li>
              <li>
                <img src="img/slides/flexslider/foto5.jpg" alt="" />
                <div class="flex-caption">
          <p>Berbagi adalah bentuk lain dari rasa bersyukur, berbagilah dengan sesama tanpa mengharapkan apapun.</p> 
                </div>
              </li>
              <li>
                <img src="img/slides/flexslider/foto7.jpg" alt="" />
                <div class="flex-caption">
					<p>Sesungguhnya bagian terindah dalm hidup ini adalah saat kita bisa berbagi hal positif, kebaikan dan kebahagiaan dengan orang lain</p> 	
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
<?php }?>

	
	<section id="content">
		<section id="content">
		<div class="container">
		<div class="row">

  <?php 

        
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="komunitas"){require_once"komunitas/komunitas.php";}
else if($mnu=="akurasi"){require_once"akurasi/akurasi.php";}
else if($mnu=="kprofil"){require_once"komunitas/kprofil.php";}
else if($mnu=="kprofil2"){require_once"komunitas/kprofil2.php";}
else if($mnu=="bkomunitas"){require_once"bkomunitas.php";}
else if($mnu=="detailkomunitas"){require_once"detailkomunitas.php";}

else if($mnu=="relawan"){require_once"relawan/relawan.php";}

else if($mnu=="registrasikomunitas"){require_once"komunitas/registrasikomunitas.php";}

else if($mnu=="galery"){require_once"galery/galery.php";}
else if($mnu=="kgalery"){require_once"galery/kgalery.php";}
else if($mnu=="cgalery"){require_once"cgalery.php";}

else if($mnu=="campaign"){require_once"campaign/campaign.php";}
else if($mnu=="kcampaign"){require_once"campaign/kcampaign.php";}
else if($mnu=="ccampaign"){require_once"ccampaign.php";}
else if($mnu=="detailcampaign"){require_once"detailcampaign.php";}


else if($mnu=="datauji"){require_once"datauji/datauji.php";}

else if($mnu=="pengujian"){require_once"pengujian/pengujian.php";}
else if($mnu=="ppengujian"){require_once"pengujian/ppengujian.php";}

else if($mnu=="pendaftaran"){require_once"pendaftaran/pendaftaran.php";}
else if($mnu=="registrasi"){require_once"pendaftaran/registrasi.php";}
else if($mnu=="rprofile"){require_once"pendaftaran/rprofile.php";}

else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="nb"){require_once"nb.php";}
else if($mnu=="pnb"){require_once"pnb.php";}
else {require_once"home.php";}
 
 ?>

		</div>
		</div>
		
		
		
		
		<!-- divider -->
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		</div>
		<!-- end divider -->
	
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Get in touch with us</h4>
					<address>
					<strong>Sailor company Inc</strong><br>
					 Sailor suite room V124, DB 91<br>
					 Someplace 71745 Earth </address>
					<p>
						<i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
						<i class="icon-envelope-alt"></i> email@domainname.com
					</p>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Information</h4>
					<ul class="link-list">
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
				
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Pages</h4>
					<ul class="link-list">
						<li><a href="#">Press release</a></li>
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="#">Career center</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 col-lg-3">
				<div class="widget">
					<h4>Newsletter</h4>
					<p>Fill your email and sign up for monthly newsletter to keep updated</p>
                    <div class="form-group multiple-form-group input-group">
                        <input type="email" name="email" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-theme btn-add">Subscribe</button>
                        </span>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Sailor 2015 All right reserved. | <a href="http://bootstraptaste.com/">Bootstrap Themes</a> by BootstrapTaste
                             <!-- 
                                All links in the footer should remain intact. 
                                Licenseing information is available at: http://bootstraptaste.com/license/
                                You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Sailor
                            -->
						
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
S
<!-- Placed at the end of the document so the pages load faster -->

<?php if($mnu=="" || $mnu=="home" || $mnu=="ccampaign" || $mnu=="cgalery" || $mnu=="bkomunitas"){?>
<script src="js/jquery.min.js"></script>
<?php }?>
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="plugins/flexslider/flexslider.config.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/stellar.js"></script>
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/jquery.cubeportfolio.min.js"></script>
<script src="js/google-code-prettify/prettify.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

	
</body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
  $arr=split(" ",$tanggal);
  if($arr[1]=="Januari"){$bul="01";}
  else if($arr[1]=="Februari"){$bul="02";}
  else if($arr[1]=="Maret"){$bul="03";}
  else if($arr[1]=="April"){$bul="04";}
  else if($arr[1]=="Mei"){$bul="05";}
  else if($arr[1]=="Juni"){$bul="06";}
  else if($arr[1]=="Juli"){$bul="07";}
  else if($arr[1]=="Agustus"){$bul="08";}
  else if($arr[1]=="September"){$bul="09";}
  else if($arr[1]=="Oktober"){$bul="10";}
  else if($arr[1]=="November"){$bul="11";}
  else if($arr[1]=="Nopember"){$bul="11";}
  else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>

<?php
function BALP($tanggal){
  $arr=split(" ",$tanggal);
  if($arr[1]=="Jan"){$bul="01";}
  else if($arr[1]=="Feb"){$bul="02";}
  else if($arr[1]=="Mar"){$bul="03";}
  else if($arr[1]=="Apr"){$bul="04";}
  else if($arr[1]=="Mei"){$bul="05";}
  else if($arr[1]=="Jun"){$bul="06";}
  else if($arr[1]=="Jul"){$bul="07";}
  else if($arr[1]=="Agu"){$bul="08";}
  else if($arr[1]=="Sep"){$bul="09";}
  else if($arr[1]=="Okt"){$bul="10";}
  else if($arr[1]=="Nov"){$bul="11";}
  else if($arr[1]=="Nop"){$bul="11";}
  else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
      $conn->commit();
      $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
      $s=true;
  }
} 
catch (Exception $e) {
  echo 'fail: ' . $e->getMessage();
    $conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
	
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
  $rs->free();
  return $jum;
}

function getField($conn,$sql){
  $rs=$conn->query($sql);
  $rs->data_seek(0);
  $d= $rs->fetch_assoc();
  $rs->free();
  return $d;
}

function getData($conn,$sql){
  $rs=$conn->query($sql);
  $rs->data_seek(0);
  $arr = $rs->fetch_all(MYSQLI_ASSOC);
  //foreach($arr as $row) {
  //  echo $row['nama_kelas'] . '*<br>';
  //}
  
  $rs->free();
  return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }  
function getGuru($conn,$kode){
$field="nama_guru";
$sql="SELECT `$field` FROM `guru` where `kd_guru`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }

  function getKomunitas($conn,$kode){
$field="nama_komunitas";
$sql="SELECT `$field` FROM `tb_komunitas` where `id_komunitas`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }
?>

<?php

				
function getKK($conn,$kolom,$data,$kat){
  $sql="select `id_datauji` from `tb_datauji` where `$kolom`='$data' and `kategori`='$kat'";
  $jum=getJum($conn,$sql);
  return $jum;
}

function getOut($conn,$kat){
  $sql="select `id_datauji` from `tb_datauji` where `kategori`='$kat'";
  $jum=getJum($conn,$sql);
  return $jum;
}


 function swap(&$arr, $a, $b) {
        $tmp = $arr[$a];
        $arr[$a] = $arr[$b];
        $arr[$b] = $tmp;
    }


function getV1($v){
	$h="?";
	if($v=="Perempuan"){$h="P";}
	else if($v=="Laki-Laki"){$h="L";}
	return $h;
}

function getV2($v){
	$h=0;
	if($v<15){$h=1;}
	else if($v<25){$h=2;}
	else if($v<35){$h=3;}
	else if($v>=35){$h=4;}
	return $h;
}

function getV3($v){
	return $v;
}

function getV4($v){
	return $v;
}

function getV5($v){
	return $v;
}

function getV6($v){
	$h=0;
	if($v<=1){$h=1;}
	else if($v<=3){$h=2;}
	else if($v<=6){$h=3;}
	return $h;
}


function getV7($v){
	
	$h="IPA";
	if($v=="IPA"){$h="IPA";}
	else if($v=="Kesehatan"||$v=="Kesehatan "||$v=="Kesehatan"){$h="IPA";}
	else if($v=="MIPA"){$h="IPA";}
	else if($v=="Teknik"){$h="IPA";}
	else if($v=="pertanian"){$h="IPA";}
	else if($v=="Profesi & ilmu Terapan"){$h="IPA";}
	
	else if($v=="komputer & teknologi"){$h="IPA";}
	
	else if($v=="IPS"){$h="IPS";}
	else if($v=="sosial & humaniora"){$h="IPS";}
	else if($v=="Ekonomi &bisnis"){$h="IPS";}
	else if($v=="Pendidikan"){$h="IPS";}
	
	else if($v=="sastra & ilmu budaya"){$h="Seni dan Budaya";}
	else if($v=="seni"){$h="Seni dan Budaya";}
	
	return $h;
}

function getV8($v){
	return $v;
}

?>
