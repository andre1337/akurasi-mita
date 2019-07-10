

<?php
	$id_campaign=$_GET["kd"];
	$sql="select * from `$tbcampaign` where `id_campaign`='$id_campaign'";
	$d=getField($conn,$sql);
				$id_campaign=$d["id_campaign"];
				$judul_campaign=$d["judul_campaign"];
				$id_komunitas=$d["id_komunitas"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];


?>

		<div class="row">
			<div class="col-lg-8">
				<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><a href="#"><?php echo $judul_campaign;?></a></h3>
							</div>
							<img src="ypathfile/<?php echo $gambar;?>" alt="" class="img-responsive" />
						</div>
						<p>
							<?php echo $uraian;?>
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
		
							</ul>
						</div>
				</article>
			
				<div class="clear"></div>
			</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
			
				<div class="widget">
					<h5 class="widgetheading">Categories</h5>
					<ul class="cat">
						<li><i class="fa fa-angle-right"></i><a href="#">Lingkungan</a><span> (20)</span></li>
						<li><i class="fa fa-angle-right"></i><a href="#">Pendidikan</a><span> (11)</span></li>
						<li><i class="fa fa-angle-right"></i><a href="#">Kesehatan</a><span> (9)</span></li>
						<li><i class="fa fa-angle-right"></i><a href="#">Budaya</a><span> (12)</span></li>
					</ul>
				</div>
			
				<div class="widget">
					
						
					</ul>
				</div>
				</aside>
			</div>
		</div>

	