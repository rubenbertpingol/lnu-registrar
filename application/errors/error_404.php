<?php header("HTTP/1.1 404 Not Found") ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>404 Page Not Found</title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: black;
	background-color: transparent;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
	position:relative;
	left: 265px;
	top: 40px;
	font-size: 50px;
	text-shadow:#999 0px 0px 5px;
}

#container, .footer{
	margin: 10px auto;
	height:400px;
	width:700px;
}
#container {
	box-shadow:0px 10px 20px #ccc;
	border:1px solid white;
}
.footer{
	background: url(<?php echo base_url() ?>public/img/back-shadow.jpg) no-repeat bottom right; );
	
}
p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div style="position: absolute; z-index:-10; left:0;width:100%; height:400px; top: 200px; background:url(<?php echo base_url() ?>public/img/side.gif) repeat-x;box-shadow: inset 0px 2px 1px white;">
    </div>
	<div style="  background: url(<?php echo base_url() ?>public/img/Error_404.jpg) no-repeat; );" id="container">
    	<h1> Error 404 </h1>
        <div style="float:right; width: 500px; height:auto;">
        	<p style="margin-left:80px; position:relative; top: 20px; padding:10px 0;"> The Page you requested is		            <strong>not found</strong>. <br/>
            Return to <a href="<?php echo base_url(); ?>"> LNU HomePage</a></p>
            
        </div>
	</div>
    <div class="footer">
    </div>
</body>
</html>