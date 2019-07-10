	<div class="col-lg-12">
				<h4 class="heading">Recent Works</h4>
				

				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>
						<?php  
  $sql="select * from `$tbgalery` order by `id_galery` desc";
  	$arr=getData($conn,$sql);
		foreach($arr as $d) {	

			$id_galery=$d["id_galery"];
				$tanggal=WKT($d["tanggal"]);
				$id_komunitas=getKomunitas($conn,$d["id_komunitas"]);
				$judulgambar=$d["judulgambar"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
?>
						<li class="cbp-item graphic">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="ypathfile/<?php echo $gambar;?>" alt=""  width="100%" height="100%"/>
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="ypathfile/<?php echo $gambar;?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title"><?php echo $judul_campaign;?></div>
							<div class="cbp-l-grid-projects-desc"><?php echo uraian;?></div>
						</li>

						<?php }?>
						
					</ul>
				</div>
				
				