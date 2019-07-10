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
win=window.open('komunitas/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, k5=0'); } 
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
if($_GET["pro"]=="ubah"){
	$id_datauji=$_GET["kode"];
	$sql="select * from `$tbdatauji` where `id_datauji`='$id_datauji'";
	$d=getField($conn,$sql);
			 $id_datauji=$d["id_datauji"];
        $id_datauji0=$d["id_datauji"];
      	$k1=$d["k1"];
				$k2=$d["k2"];
				$k3=$d["k3"];
				$k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];
				$k7=$d["k7"];
				
				$kategori=$d["kategori"];		
}
?>

<div id="accordion">
  <h3>Input Data Uji</h3>
  <div>


<form name="import_export_form" method="post" action="" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit2" class="btn btn-info" />
    </form>
<hr>
  

<form action="" method="post" enctype="multipart/form-data">
<table width="568">



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
<td><label for="k5">*Riwayat Penyakit</label>
<td>:<td colspan="2">
  <select name="k8" id="k4">
    <option value="tidak ada" <?php if($k8=="tidak ada"){echo"checked";}?>>Tidak Ada</option>
    <option value="ada" <?php if($k8=="a"){echo"checked";}?>>Ada</option>
  </select></td></tr>



<tr>
<td><label for="kategori">kategori</label>
<td>:<td colspan="2">
  <select name="kategori" id="kategori">
    <option value="Lingkungan" <?php if($kategori=="Lingkungan"){echo"checked";}?>>Lingkungan</option>
    <option value="Pendidikan" <?php if($kategori=="Pendidikan"){echo"checked";}?>>Pendidikan</option>
    <option value="Kesehatan" <?php if($kategori=="Kesehatan"){echo"checked";}?>>Kesehatan</option>
    <option value="Budaya" <?php if($kategori=="Kesehatan"){echo"checked";}?>>Budaya </option>
  </select></td></tr>

<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_datauji0" type="hidden" id="id_datauji0" value="<?php echo $id_datauji0;?>" />
        <a href="?mnu=datauji"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>


 </div>
  <?php  
  $sqlq="select distinct(kategori) from `$tbdatauji` order by `id_datauji` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kategori=$dq["kategori"];

?>   
  <h3>Data Datauji <?php echo $kategori;?></h3>
  <div>


  
Data Uji: 
| <a href="komunitas/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="komunitas/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="komunitas/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table id="mytable">
  <tr bgcolor="#036">
    <th width="3%" height="39" bgcolor="#E60000"><center>No</th>
     <th width="50%" bgcolor="#E60000"><center>Parameter</th>
      <th width="20%" bgcolor="#E60000"><center>Kategori </th>
    <th width="10%" bgcolor="#E60000"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbdatauji` where kategori='$kategori' order by `id_datauji` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_datauji=$d["id_datauji"];
				$k1=$d["k1"];
				$k2=$d["k2"];
				$k3=$d["k3"];
				$k4=$d["k4"];
				$k5=$d["k5"];
				$k6=$d["k6"];
				$k7=$d["k7"];
				$k8=$d["k8"];
				$kategori=$d["kategori"];

	/*		
$tk7=getV7($k7);
$sqlc="update `$tbdatauji` set `tk7`='$tk7' where `id_datauji`='$id_datauji'";
$ubah=process($conn,$sqlc);
*/


					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><strong>Params : </strong>$k1#$k2#$k3#$k4#$k5#$k6#$k7#$k8</td>
				<td>$kategori</td>
		
				
				<td align='center'>
<a href='?mnu=datauji&pro=ubah&kode=$id_datauji'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=datauji&pro=hapus&kode=$id_datauji'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $k1 pada data Datauji ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data data uji belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=datauji'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=komunitas'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=datauji'>Next »</a></span>";
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
	$id_datauji0=strip_tags($_POST["id_datauji0"]);
	$k1=strip_tags($_POST["k1"]);
	$k2=strip_tags($_POST["k2"]);
	$k3=strip_tags($_POST["k3"]);
	$k4=strip_tags($_POST["k4"]);
	$k5=strip_tags($_POST["k5"]);
	$k6=strip_tags($_POST["k6"]);
	$k7=strip_tags($_POST["k7"]);
  $k8=strip_tags($_POST["k8"]);
	$kategori=strip_tags($_POST["kategori"]);
	$tk2=getV2($k2);
	$tk6=getV6($k6);
	$tk7=getV7($k7);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbdatauji` (
`id_datauji` ,
`k1` ,
`k2` ,
`k3` ,
`k4` ,
`k5` ,
`k6` ,
`k7` ,
`k8` ,`tk2` ,`tk6` ,`tk7` ,
`kategori` 
) VALUES (
'', 
'$k1', 
'$k2',
'$k3',
'$k4',
'$k5',
'$k6',
'$k7',
'$k8','$tk2','$tk6','$tk7',
'$kategori'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_datauji berhasil disimpan !');document.location.href='?mnu=datauji';</script>";}
		else{echo"<script>alert('Data $id_datauji gagal disimpan...');document.location.href='?mnu=datauji';</script>";}
	}
	else{
$sql="update `$tbdatauji` set 
`k1`='$k1',
`k2`='$k2' ,`tk2`='$tk2' ,`tk6`='$tk6' ,`tk7`='$tk7' ,
`k3`='$k3',
`k5`='$k5',
`k4`='$k4',
`k6`='$k6',
`k7`='$k7',
`k8`='$k8',
`keterangan`='$keterangan' 
where `id_datauji`='$id_datauji0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_datauji berhasil diubah !');document.location.href='?mnu=datauji';</script>";}
	else{echo"<script>alert('Data $id_datauji gagal diubah...');document.location.href='?mnu=datauji';</script>";}
	}//else simpan
}
?>


<?php
 if(isset($_POST['form_submit2'])){
    require_once 'Excel/reader.php';
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('CP1251');
    $filename = $_FILES['excelfile']['tmp_name'];
    $nf = $_FILES['excelfile']['name'];
  
  $simpan=process($conn,"truncate `tb_datauji` ");

  $data->read($filename);//'Book1.xls');
$n=0;

  for($x =2; $x <=count ($data->sheets[0]["cells"]); $x++){
    $k1 = $data->sheets[0]["cells"][$x][2];
    $k2 = $data->sheets[0]["cells"][$x][3];
    $k3 = $data->sheets[0]["cells"][$x][4];
    $k4 = $data->sheets[0]["cells"][$x][5];
    $k5 = $data->sheets[0]["cells"][$x][6];
    $k6 = $data->sheets[0]["cells"][$x][7];
    $k7 = $data->sheets[0]["cells"][$x][8];
    $k8 = $data->sheets[0]["cells"][$x][9];
    $kategori = $data->sheets[0]["cells"][$x][10];
    //ipk penghasilan jumlah_tanggungan prestasi organisasi
	$tk2=getV2($k2);
	$tk6=getV6($k6);
	$tk7=getV6($k7);
  $n++;
 $sql=" INSERT INTO `tb_datauji` (
`id_datauji` ,
`k1`,
`k2` ,
`k3` ,
`k4` ,
`k5` ,
`k6` ,`tk2` ,`tk6` ,`tk7` ,
`k7`,
`k8`,
`kategori`

) VALUES (
'',
'$k1', 
'$k2',
'$k3',
'$k4',
'$k5',
'$k6','$tk2','$tk6','$tk7',
'$k7',
'$k8',
'$kategori'
)";
  process($conn,$sql);  
    
}
echo "<script>alert('Import data uji Sebanyak $loop berhasil !');document.location.href='?mnu=datauji';</script>";
}

?>


<?php
if($_GET["pro"]=="hapus"){
$id_datauji=$_GET["kode"];
$sql="delete from `$tbdatauji` where `id_datauji`='$id_datauji'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data uji $id_datauji berhasil dihapus !');document.location.href='?mnu=datauji';</script>";}
else{echo"<script>alert('Data uji $id_datauji gagal dihapus...');document.location.href='?mnu=datauji';</script>";}
}
?>