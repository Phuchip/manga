<main class="main">
	<div class="container">
		<div class="recommend">
			<a href="">
				<h2 class="page-title">Truyện đề cử <i class="fa fa-angle-right"></i></h2>
			</a>
			<div class="item-slide">
			    <div class="owl-carousel owl-theme" style="opacity: 1; display: block;">
				    <?php foreach ($query->result() as $key => $value): ?>
				    	<div class="item">
					        <a href="<?= setHref($value->alias,$value->id) ?>"><img class="lazyload" src="./images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>" /></a>
					        <div class="slide-caption">
					        	<h3>
					        		<a href="<?= setHref($value->alias,$value->id) ?>"><?php echo $value->name_manga ?></a>
					        	</h3>
					        	<a href="<?= setHref($value->alias,$value->cid,$value->chapter) ?>">Chapter <?= $value->chapter ?></a>
					        	<span class="time">
					        		<i class="fa fa-clock-o"> <?= timming($value->modify_time) ?></i>
					        	</span>
					        </div>
				      	</div>
				    <?php endforeach ?>
			    </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 center-side">
				<div class="item">
					<a href="">
						<h1 class="page-title">Truyện mới cập nhập <i class="fa fa-angle-right"></i></h1>
					</a>
					<div class="row">
						<?php foreach ($new_manga->result() as $key => $value): ?>
							<div class="new">
							<figure class="clearfix">
								<div class="image">
									<a href="<?php echo base_url().$value->alias.'-'.$value->id ?>">
										<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>">
									</a>
									<span class="icon icon-hot"></span>
									<div class="view clearfix">
										<span class="pull-left">
											<i class="fa fa-eye"> <?php echo $value->view; ?></i>
											<i class="fa fa-comment"> 2.000.000</i>
											<i class="fa fa-heart"> 50.000</i>
										</span>
									</div>
								</div>
								<figcaption>
									<h3>
										<a href="<?php echo base_url().$value->alias.'-'.$value->id ?>"><?php echo $value->name_manga ?></a>
									</h3>
									<?php $list = $this->db->query('SELECT LAST_VALUE(chapter) as chapter,id,modify_time FROM `chapter` WHERE `id_manga` = '.$value->id.' LIMIT 3')->result(); ?>
									<ul>
										<?php foreach($list as $value2){?>
											<li class="chapter clearfix">
												<a href="<?= setHref($value->alias,$value2->id,$value2->chapter) ?>">Chapter <?= $value2->chapter ?></a>
												<i class="time"><?= timming($value2->modify_time) ?></i>
											</li>
										<?php } ?>
									</ul>
								</figcaption>
							</figure>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div class="col-md-4 right-side">
				<?php $this->load->view('site/sidebar'); ?>
			</div>
		</div>
	</div>
</main>
<style type="text/css">
	
</style>