<!doctype html>
<html>
  <head>
    <title>Leyte Normal University Official Website Administrator</title>
	<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
	<link href="<?php echo base_url('public/img/lnu logo.ico'); ?>" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-responsive.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/admin.style.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("public/jqueryui/development-bundle/themes/base/jquery.ui.all.css");?>" />
	
	<?php if(isset($css)): ?>
		<?php foreach($css as $value ): ?>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url($value);?>" />
		<?php endforeach; ?>
	<?php endif; ?>
</head>
  <body>
    <header class="navbar">
			<div class="container-fluid">			
				<button type="button" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" style="color: #fff;text-shadow: 1px 1px 1px #000;"> LNU Accounting's Officce </a>
				<div class="nav-collapse collapse">
					<?php if(isset($_SESSION['accountant_login'])): ?>
						<nav class="clearfix">
          
							<span class="pull-right clearfix" style="line-height: 40px;">
							  <strong style="cursor: pointer;color: #fff;" target="_blank" onClick="window.open('<?php echo base_url();?>');">
								<span class="icon-home icon-white"></span>&nbsp;View Site!
							  </strong>
							</span>
							<ul class="nav">
                            	<li class="dropdown">
									<a class="dropdown-toggle" onClick="location.href='<?php echo base_url('accounting'); ?>'" data-toggle="dropdown" href="#"> Home</a>
                            	<li class="dropdown">
									<!--<a class="dropdown-toggle" data-toggle="dropdown" href="#"> System History</a>-->
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" onClick="location.href='<?php echo base_url('accounting/logout'); ?>'" href="#">Logout</a>
								</li>
							</ul>
						</nav>
					<?php endif; ?>
				</div>
			</div>
		</header>