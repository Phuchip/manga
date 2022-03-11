<!DOCTYPE html>
<html>
<head>
	<title><?php if (isset($meta_title)) {?><?php echo $meta_title;} ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="twitter:card" content="summary_large_image" />
  	<meta name="keywords" content="<?php if(isset($meta_key)){echo $meta_key;} ?>"/>
  	<meta name="description" content="<?php if(isset($meta_des)){echo $meta_des;} ?>"/>
  	<link rel="canonical" href="<?php echo $canonical; ?>"/>
    <link rel="alternate" href="<?php if($canonical){echo $canonical;}else{echo base_url();} ?>" hreflang="vi" />
    <meta name="robots" content="<?php if(isset($robots)){echo $robots;}?>" />
	<link href="<?php echo base_url() ?>image/overlord.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css">
	<script src="<?php echo base_url() ?>js/plugins.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css">
	<script src="<?php echo base_url() ?>css/carousel/owl.carousel.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>css/carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/carousel/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css?v=1.17">
</head>
<body>
	<?php 
		$this->load->view('site/header2');
		$this->load->view('site/navbar');
		$this->load->view($content);
		$this->load->view('site/footer');
	?>
	
	<script type="text/javascript" src="/js/custom.js?v=1.22"></script>
	<script type="text/javascript" src="/js/lazysizes.min.js"></script>
</body>
</html>