<style type="text/css">
	.header{
		height: auto;
	}
	.input-group{
		align-items: center;
		width: 21.8rem;
	}
	.input-group .form-control-feedback {
		position: absolute;
		z-index: 3;
		display: block;
		width: 2.375rem;
		text-align: center;
		pointer-events: none;
		color: #6f6f6f;
		right: 0;
	}
	.navbar.navbar-expand-md{
		padding: 0
	}
	.header-content{
		display: flex;
		margin: auto;
	}
	.header-message i,.header-bell i{
		font-size: 24px;
		color: #90dede;
	}
	.header-message,.header-bell{
		margin: 0 25px;
	}
	.account{
		margin-left: auto;
	}
	.navbar-mobile .navbar-ul{
		padding: 0;
	}
	.navbar-mobile .navbar-ul li{
		text-align: center;
	}
	.navbar-mobile{
		display: none;
	}
	@media(min-width: 1025px){
		.header-search{
			margin-left: 9rem;
			margin-right: 5rem;
		}
	}
	@media(max-width: 1024px){
		.header-search{
			margin-left: 4rem;
			margin-right: 0;
		}
	}
	
	@media(max-width: 768px){
		.header-search{
			margin: 0 30px;
		}
		.header-content{
			display: none;
		}
		.input-group{
			width: 19rem
		}
	}
	@media(max-width: 425px){
		.header-search{
			margin: auto;
		}
		.input-group{
			width: auto;
		}
		.account{
			text-align: center;
		}
		.navbar-mobile{
			display: block;
		}
	}
</style>
<header class="header">
	<div class="container">
		<nav class="navbar navbar-expand-md">
			<button class="navbar-toggler order-2" type="button" data-toggle="collapse" data-target="#navbarMenu">
				<i class="fa fa-bars"></i>
			</button>
			<div class="logo order-2">
				<a href="<?php echo base_url() ?>">
					<img class="logo-overlord" src="<?php echo base_url() ?>image/overlord.png">
				</a>
			</div>
			<button class="navbar-toggler order-2 search-mobie-ct" type="button" data-toggle="collapse" data-target="#navbarSearch">
				<i class="fa fa-search"></i>
			</button>
			<div class="order-3 header-search navbar-collapse collapse" id="navbarSearch">
				<form action="<?php echo base_url()?>Site/search" method="GET">
					<div class="input-group">
						<input type="text" id="search" placeholder="Nhập từ khóa tìm kiếm..." autocomplete="off" class="input-form form-control">
						<i class="fa fa-search form-control-feedback"></i>
						<ul class="output-search" id="complete-search"></ul>
					</div>
				</form>
			</div>
			<div class="header-content order-3">
				<div class="header-message">
					<a href="" title="Tin nhắn">
						<i class="fa fa-comment"></i>
						<span class="badge">1</span>
					</a>
				</div>
				<div class="header-bell">
					<a href="" title="Thông báo">
						<i class="fa fa-bell"></i>
						<span class="badge">2</span>
					</a>
				</div>
			</div>
			<div class="navbar-mobile order-3" id="navbarMenu">
				<ul class="navbar-ul">
				  	<li><a href="#home">Trang chủ</a></li>
				  	<li><a href="#news">Hot</a></li>
				  	<li><a href="#contact">Mới</a></li>
				  	<li><a href="#contact">Thể loại</a></li>
				  	<li><a href="#home">Yêu thích</a></li>
				  	<li><a href="#news">Lịch sử</a></li>
				  	<li><a href="#contact">Theo dõi</a></li>
				  	<li><a href="#about">Manhwa</a></li>
				  	<li><a href="#about">Manhua</a></li>
				</ul>
			</div>
			<div class="account order-3 navbar-collapse collapse" id="navbarMenu">
			<?php if (!isset($_SESSION['username'])) { ?>
				<ul class="account-header">
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
					<a class="account-header name-user" href="javascript:void(0);">
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
			
		</nav>
	</div>
</header>