<?php
$pro="simpan";
$tgl=WKT(date("Y-m-d"));
$jam=date("H:i:s");
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengujian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, email=0'); } 
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
  $sql="select `id_pengujian` from `$tbpengujian` order by `id_pengujian` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="UJI".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pengujian"];
   
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
  $id_pengujian=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_pengujian=$_GET["kode"];
	$sql="select * from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
	$d=getField($conn,$sql);
				$id_pengujian=$d["id_pengujian"];
				$tgl=WKT($d["tgl"]);
				$jam=$d["jam"];
				$nama_pengujian=$d["nama_pengujian"];
				$nama=$d["nama"];
				$email=$d["email"];
				$k1=$d["k1"];
				$k2=$d["k2"];
				$k3=$d["k3"];
				$k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];	
				$k7=$d["k7"];
				$k8=$d["k8"];	
				$kategori=$d["kategori"];	
				$rekapitulasi=$d["rekapitulasi"];	
				$keterangan=$d["keterangan"];		
}
?>

<div id="accordion">
  <h3>Input Data Pengujian</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="574">


<tr>
<td width="223" valign="top"><label for="id_pengujian">Id Pengujian</label>
<td width="10">:
<td width="328" colspan="2"><b><?php echo $id_pengujian;?></b>
</tr>

<tr>
<td height="24"><label for="tgl">Tanggal</label>
<td>:<td colspan="2"><input  class="form-control" name="tgl" type="text" id="tgl" value="<?php echo $tgl;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="jam">Jam</label>
<td>:<td colspan="2"><input name="jam" type="text" id="jam" value="<?php echo $jam;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="nama_pengujian">Nama Pengujian</label>
<td>:<td colspan="2"><input name="nama_pengujian" type="text" id="nama_pengujian" value="<?php echo $nama_pengujian;?>" size="25" />
</td>
</tr>


<tr>
<td height="24"><label for="nama">nama</label>
<td>:<td colspan="2"><input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="email">email</label>
<td>:<td colspan="2"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="15" /></td></tr>

<tr>
<td height="35"><label for="k1">*Jenis Kelamin</label>
<td>:<td colspan="2">
<input type="radio" name="k1" id="k1"  checked="checked" value="Laki-Laki" <?php if($k1=="Laki-Laki"){echo"checked";}?>/>Laki-Laki 
<input type="radio" name="k1" id="k1" value="Perempuan" <?php if($k1=="Perempuan"){echo"checked";}?>/>Perempuan
</td></tr>

<tr>
<td><label for="k2">*Umur</label>
<td>:<td colspan="2"><input name="k2" type="text" id="k2" value="<?php echo $k2;?>" size="15" /></td></tr>

<tr>
<td><label for="k3">*Hobi</label>
<td>:<td colspan="2">
  <select name="k3" id="k4">
    <option value="naik gunung" <?php if($k3=="naik gunung"){echo"checked";}?>>Naik Gunung</option>
    <option value="traveling" <?php if($k3=="traveling"){echo"checked";}?>>Travelling</option>
    <option value="membaca" <?php if($k3=="membaca"){echo"checked";}?>>Membaca</option>
    <option value="olahraga" <?php if($k3=="olahraga"){echo"checked";}?>>Olahraga</option>
  </select></td></tr>

<tr>
<td><label for="k4">*Karakter</label>
<td>:<td colspan="2">
  <select name="k4" id="k4">
    <option value="damai" <?php if($k4=="damai"){echo"checked";}?>>Damai</option>
    <option value="optimis" <?php if($k4=="optimis"){echo"checked";}?>>Optimis</option>
    <option value="leadership" <?php if($k4=="leadership"){echo"checked";}?>>Leadership</option>
  </select></td></tr>

<tr>
<td><label for="k5">*Pengalaman Organisasi</label>
<td>:<td colspan="2">
  <select name="k5" id="k5">
    <option value="tidak ada" <?php if($k5=="tidak ada"){echo"checked";}?>>Tidak Ada</option>
    <option value="ada" <?php if($k5=="ada"){echo"checked";}?>>Ada</option>
  </select></td></tr>

<tr>
<td><label for="k6">*Jumlah Kegiatan Yang Pernah Di ikuti</label>
<td>:<td colspan="2">
  <select name="k6" id="k6">
    <option value="0" <?php if($k6=="0"){echo"checked";}?>>0</option>
    <option value="1" <?php if($k6=="1"){echo"checked";}?>>1</option>
    <option value="2" <?php if($k6=="2"){echo"checked";}?>>2</option>
    <option value="3" <?php if($k6=="3"){echo"checked";}?>>3</option>
    <option value="4" <?php if($k6=="4"){echo"checked";}?>>4</option>
    <option value="5" <?php if($k6=="5"){echo"checked";}?>>5</option>
  </select></td></tr>

<tr>
<td><label for="k7">*Jurusan</label>
<td>:<td colspan="2">
  <select name="k7" id="k7">
    <option value="IPA" <?php if($k7=="0"){echo"checked";}?>>IPA</option>
    <option value="IPS" <?php if($k7=="1"){echo"checked";}?>>IPS</option>
    <option value="Kesehatan" <?php if($k7=="2"){echo"checked";}?>>Kesehatan</option>
    <option value="MIPA" <?php if($k7=="3"){echo"checked";}?>>MIPA</option>
    <option value="sosial & humaniora" <?php if($k7=="4"){echo"checked";}?>>Sosial dan Humaniora</option>
    <option value="Ekonomi &bisnis" <?php if($k7=="5"){echo"checked";}?>>Ekonomi dan Bisnis</option>
    <option value="sastra & ilmu budaya" <?php if($k7=="5"){echo"checked";}?>>Sastra dan Budaya</option>
    <option value="Teknik" <?php if($k7=="5"){echo"checked";}?>>Teknik</option>
    <option value="Pendidikan" <?php if($k7=="5"){echo"checked";}?>>Pendidikan</option>
    <option value="pertanian" <?php if($k7=="5"){echo"checked";}?>>Pertanian</option>
    <option value="Profesi & ilmu Terapan" <?php if($k7=="5"){echo"checked";}?>>Profesi dan Ilmuterapan</option>
    <option value="seni" <?php if($k7=="5"){echo"checked";}?>>Seni</option>
    <option value="komputer & teknologi" <?php if($k7=="5"){echo"checked";}?>>Komputer dan Teknologi</option>
      </select></td></tr>

<tr>
<td><label for="k8">*Riwayat Penyakit</label>
<td>:<td colspan="2">
  <select name="k8" id="k8">
    <option value="tidak ada" <?php if($k8=="tidak ada"){echo"checked";}?>>Tidak Ada</option>
    <option value="ada" <?php if($k8=="ada"){echo"checked";}?>>Ada</option>
  </select></td></tr>


<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_pengujian" type="hidden" id="id_pengujian" value="<?php echo $id_pengujian;?>" />
        <input name="id_pengujian0" type="hidden" id="id_pengujian0" value="<?php echo $id_pengujian0;?>" />
        <a href="?mnu=pengujian"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <?php  
  $sqlq="select distinct(kategori) from `$tbpengujian` order by `id_pengujian` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];

?>   
  <h3>Data Pengujian <?php echo $kategori;?></h3>
  <div>


Data komunitas: 
| <a href="pengujian/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="pengujian/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="pengujian/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable">
  <tr bgcolor="#036">
    <th width="3%" height="40" bgcolor="#D12E2E"><center>No</th>
    <th width="20%" bgcolor="#D12E2E"><center>Nama Pengujian</th>
    <th width="40%" bgcolor="#D12E2E"><center>Params</th>
    <th width="10%" bgcolor="#D12E2E"><center>kategori</th>
    <th width="10%" bgcolor="#D12E2E"><center>rekapitulasi</th>
    <th width="10%" bgcolor="#D12E2E"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbpengujian` where kategori='$kategori' order by `id_pengujian` desc";
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
				$id_pengujian=$d["id_pengujian"];
				$tgl=$d["tgl"];
				$jam=WKT($d["jam"]);
				$nama_pengujian=$d["nama_pengujian"];
				$nama=$d["nama"];
				$email=$d["email"];
				$k1=$d["k1"];
				$k2=$d["k2"];
				$k3=$d["k3"];
				$k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];
				$k7=$d["k7"];
				$k8=$d["k8"];	
				$kategori=$d["kategori"];	
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nama_pengujian ($tgl , $jam)</td>
				<td>Prams : $k1#$k2#$k3#$k4#$k5#$k6#$k7</td>
				<td>$kategori</td>
				<td>$keterangan</td>
				<td align='center'>
				<a href='?mnu=nb&id=$id_pengujian'><img src='ypathicon/11.png' title='Analisa NAive Bayes'></a>	
<a href='?mnu=pengujian&pro=ubah&kode=$id_pengujian'><img src='ypathicon/u.png' title='ubah'></a>
<a href='?mnu=pengujian&pro=hapus&kode=$id_pengujian'><img src='ypathicon/h.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tgl pada data pengujian ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pengujian belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pengujian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pengujian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pengujian'>Next »</a></span>";
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
	$id_pengujian=strip_tags($_POST["id_pengujian"]);
	$id_pengujian0=strip_tags($_POST["id_pengujian0"]);
	$tgl=BAL(strip_tags($_POST["tgl"]));
	$jam=strip_tags($_POST["jam"]);
	$nama_pengujian=strip_tags($_POST["nama_pengujian"]);
	$nama=strip_tags($_POST["nama"]);
	$email=strip_tags($_POST["email"]);
	$k1=strip_tags($_POST["k1"]);
	$k2=strip_tags($_POST["k2"]);
	$k3=strip_tags($_POST["k3"]);
	$k4=strip_tags($_POST["k4"]);
	$k5=strip_tags($_POST["k5"]);
	$k6=strip_tags($_POST["k6"]);
	$k7=strip_tags($_POST["k7"]);
	$k8=strip_tags($_POST["k8"]);
	$kategori=strip_tags($_POST["kategori"]);
	$rekapitulasi=strip_tags($_POST["rekapitulasi"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpengujian` (
`id_pengujian` ,
`tgl` ,
`jam` ,
`nama_pengujian` ,
`nama` ,
`email` ,
`k1` ,
`k2` ,
`k3` ,
`k4` ,
`k5` ,
`k6` ,
`k7` ,
`k8` 
) VALUES (
'$id_pengujian', 
'$tgl', 
'$jam',
'$nama_pengujian',
'$nama',
'$email',
'$k1',
'$k2',
'$k3',
'$k4',
'$k5',
'$k6',
'$k7',
'$k8'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_pengujian berhasil disimpan !');document.location.href='?mnu=nb&id=$id_pengujian';</script>";}
		else{echo"<script>alert('Data $id_pengujian gagal disimpan...');document.location.href='?mnu=pengujian';</script>";}
	}
	else{
$sql="update `$tbpengujian` set 
`id_pengujian`='$id_pengujian',
`tgl`='$tgl',
`jam`='$jam' ,
`nama_pengujian`='$nama_pengujian',
`nama`='$nama',
`email`='$email',
`k1`='$k1', 
`k2`='$k2', 
`k3`='$k3', 
`k4`='$k4', 
`k5`='$k5', 
`k6`='$k6', 
`k7`='$k7', 
`k8`='$k8'
where `id_pengujian`='$id_pengujian0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_pengujian berhasil diubah !');document.location.href='?mnu=nb&id=$id_pengujian';</script>";}
	else{echo"<script>alert('Data $id_pengujian gagal diubah...');document.location.href='?mnu=pengujian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pengujian=$_GET["kode"];
$sql="delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data komunitas $id_pengujian berhasil dihapus !');document.location.href='?mnu=pengujian';</script>";}
else{echo"<script>alert('Data komunitas $id_pengujian gagal dihapus...');document.location.href='?mnu=pengujian';</script>";}
}
?>

