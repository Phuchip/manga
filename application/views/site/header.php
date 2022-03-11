<header class="header">
	<div class="container">
		<div class="logo">
			<a href="<?php echo base_url() ?>">
				<img class="logo-overlord" src="<?php echo base_url() ?>image/overlord.png">
			</a>
		</div>
		<div class="form-search">
			<form action="<?php echo base_url()?>Site/search" method="GET">
				<input type="text" id="search" placeholder="Nhập từ khóa tìm kiếm..." autocomplete="off" class="input-group form-control">
				<button class="icon-search">
					<i type="submit" class="fa fa-search"></i>
				</button>
			</form>
		</div>
		<div class="output-search" id="complete-search">
		</div>
		<div class="notification">
			<a href="" title="Thông báo">
				<i class="fa fa-comment"></i>
				<span class="badge">1</span>
			</a>
		</div>
		<div class="bell">
			<a href="">
				<i class="fa fa-bell"></i>
				<span class="badge badge-bell">2</span>
			</a>
		</div>
		<div class="account">
		<?php if (!isset($_SESSION['username'])) { ?>
			<ul class="account-header pull-right">
				<a type="button" data-toggle="modal" data-target="#Modal">
					<li class="login-header">
						Đăng nhập /
					</li>
					<li class="register-header">
						Đăng ký
					</li>
				</a>
			</ul>
		<?php }else { ?>
				<a class="account-header pull-right name-user" href="">
					<img class="avatar" src="<?php echo base_url().$_SESSION['image']; ?>">
					<span><?php echo $_SESSION['username']; ?></span> 
					<b class="fa fa-caret-down"></b>
				</a>
				<ul class="dropdown-menu-user">
					<li>
						<a href=""><i class="fa fa-user"></i> Trang cá nhân</a>
					</li>
					<li>
						<a href=""><i class="fa fa-book"></i> Truyện theo dõi</a>
					</li>
					<li>
						<a href=""><i class="fa fa-list"></i> Truyện đã đăng</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>site/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
					</li>
				</ul>
		<?php } ?>
		</div>
	</div>
</header>