<div class="top-right-side">
	<h1 class="h1-title-history">Lịch sử đọc</h1>
	<div class="content-history">
		<ul class="list-history-manga">
			<?php if(isset($_SESSION['read_history'])){ 
				$i=1;
				foreach($_SESSION['read_history'] as $key => $value){ 
					if($i < 4){ ?>
			<li>
				<img class="lazyload" src="./images/icon/loading.gif" data-src="/<?= $value['image'] ?>" alt="<?= $value['name'] ?>" title="<?= $value['name'] ?>">
				<div class="info-left-history-manga">
					<a href="<?= setHref($value['alias'],$key) ?>" title="<?= $value['name'] ?>">
						<h3 class="title-commic-tab"><?= $value['name'] ?></h3>
					</a>
					<span class="chapter-commic-tab">
						<a href="<?= setHref($value['alias'],$value['id_chapter'],$value['chapter']) ?>" title="Chapter <?= $value['chapter'] ?>">
							Chapter <?= $value['chapter'] ?>
						</a>
					</span>
					<span class="star-commic-tab star-5"></span>
					<span class="remove-history-btn" data-id="<?= $key ?>"><i class="fa fa-trash" aria-hidden="true"></i></span>
				</div>
			</li>
			<?php }$i++; }}else{ ?>
				<li style="justify-content: center;">Bạn chưa có lịch sử đọc</li>
			<?php }  ?>
		</ul>
		<?php if(isset($_SESSION['read_history'])){?>
			<a href="" title="Xem thêm lịch sử" class="btn-more bottom-btn-more"> Xem thêm</a>
		<?php }?>
	</div>
</div>
<div class="box-tab dark-box">
	<div class="tab-nav clearfix">
		<button class="tablink active" onclick="TopName(event,'TopMonth')">Top Tháng</button>
		<button class="tablink" onclick="TopName(event,'TopWeek')">Top Tuần</button>
		<button class="tablink" onclick="TopName(event,'TopDay')">Top Ngày</button>
	</div>
	<div class="tab-pane">
		<div id="TopMonth" class="Top">
			<ul class="list-unstyled">
				<?php $i=1; foreach ($topMonth->result() as $key => $value): ?>
				<li class="clearfix">
					<span class="txt-rank fn-order pos<?php echo $i ?>">0<?php echo $i ?></span>
					<div class="month-item">
						<a href="<?= setHref($value->alias,$value->id) ?>" class="thumb">
							<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>" style="display: inline;">
						</a>
						<h3 class="title"><a href="<?php echo base_url().$value->alias.'-'.$value->id ?>"><?php echo $value->name_manga ?></a></h3>
						<p class="chapter top">
							<a href="<?= setHref($value->alias,$value->id) ?>">Chapter 61</a>
							<span class="view pull-right">
								<i class="fa fa-eye"> <?php echo $value->view ?></i>
							</span>
						</p>
					</div>
				</li>
				<?php $i++; endforeach ?>
			</ul>
		</div>
		<div id="TopWeek" class="Top" style="display: none;">
			<ul class="list-unstyled">
				<?php $i=1; foreach ($topMonth->result() as $key => $value): ?>
				<li class="clearfix">
					<span class="txt-rank fn-order pos<?php echo $i ?>">0<?php echo $i ?></span>
					<div class="month-item">
						<a href="<?php echo base_url().$value->alias.'-'.$value->id ?>" class="thumb">
							<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>" style="display: inline;">
						</a>
						<h3 class="title"><a href="<?php echo base_url().$value->alias.'-'.$value->id ?>"><?php echo $value->name_manga ?></a></h3>
						<p class="chapter top">
							<a href="<?php echo base_url().$value->alias.'/chap-'.$value->id ?>">Chapter 61</a>
							<span class="view pull-right">
								<i class="fa fa-eye"> <?php echo $value->view ?></i>
							</span>
						</p>
					</div>
				</li>
				<?php $i++; endforeach ?>
			</ul>
		</div>
		<div id="TopDay" class="Top" style="display: none;">
			<ul class="list-unstyled">
				<?php $i=1; foreach ($topMonth->result() as $key => $value): ?>
				<li class="clearfix">
					<span class="txt-rank fn-order pos<?php echo $i ?>">0<?php echo $i ?></span>
					<div class="month-item">
						<a href="<?php echo base_url().$value->alias.'-'.$value->id ?>" class="thumb">
							<img class="lazyload" src="<?php echo base_url() ?>images/icon/loading.gif" data-src="<?php echo base_url().$value->image ?>" style="display: inline;">
						</a>
						<h3 class="title"><a href="<?php echo base_url().$value->alias.'-'.$value->id ?>"><?php echo $value->name_manga ?></a></h3>
						<p class="chapter top">
							<a href="<?php echo base_url().$value->alias.'/chap-'.$value->id ?>">Chapter 61</a>
							<span class="view pull-right">
								<i class="fa fa-eye"> <?php echo $value->view ?></i>
							</span>
						</p>
					</div>
				</li>
				<?php $i++; endforeach ?>
			</ul>
		</div>
	</div>
</div>