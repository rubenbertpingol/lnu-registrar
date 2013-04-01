<!doctype html>
<html>
	<head>
		<title>Registrar's Office</title>
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/css/registrar.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-responsive.css");?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/admin.style.css");?>" />
		<script> var base_url = "<?php echo base_url(); ?>"; </script>
		<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
		<script src="<?php echo base_url("public/jqueryui/js/jquery-1.8.2.min.js");?>"></script>
		<script src="<?php echo base_url("public/js/back-end/registrar/functions.js");?>"></script>
	</head>
	<body>
    <header class="navbar">
			<div class="container-fluid">			
				<?php if( array_key_exists('isRegistrar_logged_in', $_SESSION) ) { ?>
				<button type="button" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" style="color: #fff;text-shadow: 1px 1px 1px #000;">Registrar's Office</a>
				<div class="nav-collapse collapse">
					<nav class="clearfix">
          
            <span class="pull-right clearfix" style="line-height: 40px;">
              <strong style="cursor: pointer;color: #fff;" target="_blank" onclick="window.open('<?php echo base_url();?>');">
                <span class="icon-home icon-white"></span>&nbsp;View Site!
              </strong>
            </span>
          
						<ul class="nav">
							<li><a href="<?php echo base_url("registrar/");?>">Home</a></li>
							<li><a href="<?php echo base_url("registrar/cleared");?>">Cleared Requests</a></li>
							<li><a href="<?php echo base_url("registrar/requeststatus");?>">Request Status</a></li>
							<li><a href="<?php echo base_url("registrar/logout");?>">Log out</a></li>
						</ul>
					</nav>
				</div>
				<?php } else { ?>
					<a class="brand" style="color: #fff;text-shadow: 1px 1px 1px #000;">Registrar's Log In</a>
				<?php } ?>
			</div>
		</header>