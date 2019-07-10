	<div class="col-lg-12">
				<h4 class="heading">Recent Works</h4>

				<div id="filters-container" class="cbp-l-filters-button">
					<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All<div class="cbp-filter-counter"></div></div>
					<div data-filter=".identity" class="cbp-filter-item">Lingkungan<div class="cbp-filter-counter"></div></div>
					<div data-filter=".web-design" class="cbp-filter-item">Pendidikan<div class="cbp-filter-counter"></div></div>
					<div data-filter=".graphic" class="cbp-filter-item">Kesehatan<div class="cbp-filter-counter"></div></div>
					<div data-filter=".logo" class="cbp-filter-item">Budaya<div class="cbp-filter-counter"></div></div>
				</div>
				

				<div id="grid-container" class="cbp-l-grid-projects">
					<ul> 
 <?php  
  $sql="select * from `$tbcampaign` order by `id_campaign` desc";
  	$arr=getData($conn,$sql);
		foreach($arr as $d) {	

			$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$gambar=$d["gambar"];
?>
		
						<li class="cbp-item graphic">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">
									<img src="ypathfile/<?php echo $gambar;?>" alt=""  width="100%" height="100%"/>
								</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="index.php?mnu=detailcampaign&kd=<?php echo $id_campaign;?>" class="cbp-l-caption-buttonRight" data-title="Dashboard<br>by Paul Flavius Nechita">Detail</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title"><?php echo $judul_campaign;?></div>
							<div class="cbp-l-grid-projects-desc"><?php echo $uraian;?></div>
						</li>

						<?php }?>
						
					</ul>
				</div>
				
				