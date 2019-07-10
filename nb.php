


<div id="accordion">
  <h3>Info Data Pengujian</h3>
  <div>

<?php
	
	$id_pengujian=$_GET["id"];
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
				
	
	$v1=($k1);
	$v2=($k2);
	$v3=($k3);
	$v4=($k4);
	$v5=($k5);
	$v6=($k6);
	$v7=($k7);
	$v8=($k8);
	
	$k1=getV1($k1);
	$k2=getV2($k2);
	$k3=getV3($k3);
	$k4=getV4($k4);
	$k5=getV5($k5);
	$k6=getV6($k6);
	$k7=getV7($k7);
	$k8=getV8($k8);
	

?>


<div id="accordion">
  <h3>Input Data Pengujian</h3>
  <div>


<table width="60%">

<tr>
<th width="226" height="37"><label for="id_pengujian">ID pengujian</label>
<th width="10">:
<th width="336" colspan="2"><b><?php echo $id_pengujian;?></b>
</tr>

<tr>
<td height="47"><label for="nama_pengujian">Nama pengujian</label>
<td>:
<td colspan="2"><?php echo $nama_pengujian;?></td>
</tr>

<tr>
<td height="43"><label for="nama">Waktu</label>
<td>:<td colspan="2"><?php echo "$tgl $jam";?>
</td>
</tr>

<tr>
<td height="50"><label for="nama">Nama</label>
<td>:<td colspan="2"><?php echo $nama;?> 
</td>
</tr>

<tr>
<td height="41"><label for="no_tlpo">Email</label>
<td>:<td colspan="2"><?php echo $email;?> 
</td>
</tr>

<tr>
<td height="43"><label for="k1"><?php echo $cr1;?></label>
<td>:
<td colspan="2"><?php echo $k1;?></td>
</tr>


<tr>
<td height="42"><label for="k2"><?php echo $cr2;?></label>
<td>:
<td colspan="2"><?php echo "$v2 thn /Kat:".$k2;?></td>
</tr>


<tr>
<td height="46"><label for="k3"><?php echo $cr3;?></label>
<td>:
<td colspan="2"><?php echo $k3;?></td>
</tr>



<tr>
<td height="46"><label for="k4"><?php echo $cr4;?></label>
<td>:
<td colspan="2"><?php echo $k4;?></td>
</tr>


<tr>
<td height="38"><label for="k5"><?php echo $cr5;?></label>
<td>:
<td colspan="2"><?php echo $k5;?></td>
</tr>

<tr>
<td height="38"><label for="k6"><?php echo $cr6;?></label>
<td>:
<td colspan="2"><?php echo "$v6 Kegiatan /Kat $k6";?></td>
</tr>


<tr>
<td height="38"><label for="k7"><?php echo $cr7;?></label>
<td>:
<td colspan="2"><?php echo $k7;?></td>
</tr>


<tr>
<td height="38"><label for="k8"><?php echo $cr8;?></label>
<td>:
<td colspan="2"><?php echo $k8;?></td>
</tr>



</table>

<hr>

<?php
	
	
	$sql="select distinct(kategori) from `tb_datauji`  order by `kategori` asc";		
	$arr=getData($conn,$sql);
	$i=0;
		foreach($arr as $d) {						
				$kategori=$d["kategori"];
				$ik[$i]=$kategori;
				$nhasil[$i]=$kategori;
				$i++;
		}
	
	$jumK1=getOut($conn,$ik[0]);
	$jumK2=getOut($conn,$ik[1]);
	$jumK3=getOut($conn,$ik[2]);
	$jumK4=getOut($conn,$ik[3]);
	
	$totK=$jumK1+$jumK2+$jumK3+$jumK4;

$jumG1A=getKK($conn,'k1',$k1,$ik[0]);
$jumG1B=getKK($conn,'k1',$k1,$ik[1]);
$jumG1C=getKK($conn,'k1',$k1,$ik[2]);
$jumG1D=getKK($conn,'k1',$k1,$ik[3]);

$jumG2A=getKK($conn,'tk2',$k2,$ik[0]);
$jumG2B=getKK($conn,'tk2',$k2,$ik[1]);
$jumG2C=getKK($conn,'tk2',$k2,$ik[2]);
$jumG2D=getKK($conn,'tk2',$k2,$ik[3]);

$jumG3A=getKK($conn,'k3',$k3,$ik[0]);
$jumG3B=getKK($conn,'k3',$k3,$ik[1]);
$jumG3C=getKK($conn,'k3',$k3,$ik[2]);
$jumG3D=getKK($conn,'k3',$k3,$ik[3]);

$jumG4A=getKK($conn,'k4',$k4,$ik[0]);
$jumG4B=getKK($conn,'k4',$k4,$ik[1]);
$jumG4C=getKK($conn,'k4',$k4,$ik[2]);
$jumG4D=getKK($conn,'k4',$k4,$ik[3]);

$jumG5A=getKK($conn,'k5',$k5,$ik[0]);
$jumG5B=getKK($conn,'k5',$k5,$ik[1]);
$jumG5C=getKK($conn,'k5',$k5,$ik[2]);
$jumG5D=getKK($conn,'k5',$k5,$ik[3]);

$jumG6A=getKK($conn,'k6',$k6,$ik[0]);
$jumG6B=getKK($conn,'k6',$k6,$ik[1]);
$jumG6C=getKK($conn,'k6',$k6,$ik[2]);
$jumG6D=getKK($conn,'k6',$k6,$ik[3]);

$jumG7A=getKK($conn,'tk7',$k7,$ik[0]);
$jumG7B=getKK($conn,'tk7',$k7,$ik[1]);
$jumG7C=getKK($conn,'tk7',$k7,$ik[2]);
$jumG7D=getKK($conn,'tk7',$k7,$ik[3]);

$jumG8A=getKK($conn,'k8',$k8,$ik[0]);
$jumG8B=getKK($conn,'k8',$k8,$ik[1]);
$jumG8C=getKK($conn,'k8',$k8,$ik[2]);
$jumG8D=getKK($conn,'k8',$k8,$ik[3]);
	
$HA=($jumK1/$totK)*($jumG1A/$jumK1)*($jumG2A/$jumK1)*($jumG3A/$jumK1)*($jumG4A/$jumK1)*($jumG5A/$jumK1)*($jumG6A/$jumK1)*($jumG7A/$jumK1)*($jumG8A/$jumK1);
$HB=($jumK2/$totK)*($jumG1B/$jumK2)*($jumG2B/$jumK2)*($jumG3B/$jumK2)*($jumG4B/$jumK2)*($jumG5B/$jumK2)*($jumG6B/$jumK2)*($jumG7B/$jumK2)*($jumG8B/$jumK2);
$HC=($jumK3/$totK)*($jumG1C/$jumK3)*($jumG2C/$jumK3)*($jumG3C/$jumK3)*($jumG4C/$jumK3)*($jumG5C/$jumK3)*($jumG6C/$jumK3)*($jumG7C/$jumK3)*($jumG8C/$jumK3);
$HD=($jumK4/$totK)*($jumG1D/$jumK4)*($jumG2D/$jumK4)*($jumG3D/$jumK4)*($jumG4D/$jumK4)*($jumG5D/$jumK4)*($jumG6D/$jumK4)*($jumG7D/$jumK4)*($jumG8D/$jumK4);


$SHA="($jumK1/$totK) x ($jumG1A/$jumK1) x ($jumG2A/$jumK1) x ($jumG3A/$jumK1) x ($jumG4A/$jumK1) x ($jumG5A/$jumK1) x ($jumG6A/$jumK1) x ($jumG7A/$jumK1) x ($jumG8A/$jumK1)";
$SHB="($jumK2/$totK) x ($jumG1B/$jumK2) x ($jumG2B/$jumK2) x ($jumG3B/$jumK2) x ($jumG4B/$jumK2) x ($jumG5B/$jumK2) x ($jumG6B/$jumK2) x ($jumG7B/$jumK2) x ($jumG8B/$jumK2)";
$SHC="($jumK3/$totK) x ($jumG1C/$jumK3) x ($jumG2C/$jumK3) x ($jumG3C/$jumK3) x ($jumG4C/$jumK3) x ($jumG5C/$jumK3) x ($jumG6C/$jumK3) x ($jumG7C/$jumK3) x ($jumG8C/$jumK3)";
$SHD="($jumK4/$totK) x ($jumG1D/$jumK4) x ($jumG2D/$jumK4) x ($jumG3D/$jumK4) x ($jumG4D/$jumK4) x ($jumG5D/$jumK4) x ($jumG6D/$jumK4) x ($jumG7D/$jumK4) x ($jumG8D/$jumK4)";

$arV[0]=$HA;
$arV[1]=$HB;
$arV[2]=$HC;
$arV[3]=$HD;

$arS[0]=$SHA;
$arS[1]=$SHB;
$arS[2]=$SHC;
$arS[3]=$SHD;

  $array_count = count($arV);
        for($x = 0; $x < $array_count; $x++){
            for($a = 0 ;  $a < $array_count - 1 ; $a++){
                if($a < $array_count ){
                    if($arV[$a] < $arV[$a + 1] ){
                            swap($arV, $a, $a+1);
							swap($arS, $a, $a+1);
							swap($nhasil, $a, $a+1);
							swap($ik, $a, $a+1);
                    }
                }
            }
        }
		
		
$nout=$nhasil[0];
$bobot=$arV[0];
	
$nout2=$nhasil[1];
$bobot2=$arV[1];
	
			
$gab="<h3>Hasil Perhitungan</h3>";
$gab.="<table border='1'><tr><td>No<td>Kategori<td>Formula<td>Bobot<td>Ranking</tr>";
for($i=0;$i<$array_count;$i++){
	$no=$i+1;
	$gab.="<tr><td>$no<td>$nhasil[$i]<td>$arS[$i]<td>$arV[$i]<td>R-$no</tr>";
}
$gab.="<table>";
$_SESSION["gab"]=$gab;

echo $gab;


$gab="";
for($i=0;$i<$array_count;$i++){
	$no=$i+1;
	$gab.="$no. $nhasil[$i]->$arS[$i] : $arV[$i]<br>";
}
$keterangan="
<b>Analisa  Saran Jenis Peminatan / Naive Bayes Tertinggi Adalah : $nout ($bobot)  atau $nout2 ($bobot2)</b>";

echo $keterangan;

	
//$sql="delete from `$tbpengujian` where `id_pengujian`='$id_pengujian'";
//$hapus=process($conn,$sql);

 $sql="update  `$tbpengujian` set `rekapitulasi`='$gab',`kategori`='$nout',`kategori2`='$nout2',`keterangan`='$keterangan'  where `id_pengujian`='$id_pengujian'";
$up=process($conn,$sql);

?>
</div>

