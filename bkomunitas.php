	
<?php  
  $sql="select * from `$tbkomunitas`  order by `id_komunitas` desc";
 	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
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

		<div class="row">
			<div class="col-lg-8">
				<article>
						<div class="post-image">
							<div class="post-heading">
								<h3><a href="#"><?php echo $nama_komunitas;?></a></h3>
							</div>
							<img src="ypathfile/<?php echo $gambar;?>" alt="" class="img-responsive" />
						</div>
						<p>
							<?php echo $deskripsi;?>
						</p>
						<div class="bottom-article">
							<ul class="meta-post">
		
							</ul>
							<a href="index.php?mnu=detailkomunitas&kd=<?php echo $id_komunitas;?>" class="readmore pull-right">Continue reading<i class="fa fa-angle-right"></i></a>
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

		<?php }?>