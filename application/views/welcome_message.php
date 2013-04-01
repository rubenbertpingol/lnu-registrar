<!DOCTYPE html>
<html>
	<head>
		<title>LNU Registrar</title>
		<meta title="Author" content="Kim Lagonoy, Ruben Bert Pingol, John Temoty Roca" />
		<link rel='stylesheet' type='text/css' href="<?php echo base_url().'bs/docs/assets/css/bootstrap.css';?>" />
		<link rel='stylesheet' type='text/css' href="<?php echo base_url().'bs/docs/assets/css/bootstrap-responsive.css';?>" />
		<link rel='stylesheet' type='text/css' href="<?php echo base_url().'public/css/style.css';?>" />
		<script type='text/javascript' src="<?php echo base_url().'bs/docs/assets/js/jquery.js';?>"></script>
		<script type='text/javascript' src="<?php echo base_url().'bs/docs/assets/js/bootstrap.js';?>"></script>
		<script type='text/javascript' src="<?php echo base_url().'public/js/javascript.js'; ?>"></script>
	</head>
	<body>
		<div class="container">
			<div class="row-fluid div-padding hr-border theHead" align=center>
				<img src="image/lnu_logo_white.png" style="width:110px;height:110px;position:relative;top:-18px;" />
				<span style="font-size:25px;position:relative;"><span style="position:absolute;float:left; font-size:15px;top:-40px;left:120px">Republic of the Philippines<br />Leyte Normal University</span>Application Form for Student's Record</span>
			</div><br /><br />
			<div id="print_button"></div><br />
			<strong>NAME OF STUDENT</strong>: <input type='text' style="width:175px;" id="ln" value="Last Name" /> <input type='text' id="fn" value="First Name" /> <input type='text' id="mn" style="width:140px" value="Middle Name" /> <input type='text' id="mnm" style="width:150px" value="Middle Name for Married" /><br /><br />
			<table cellpadding=10 style="width:100%;" class="table_short_text">
				<tr><td>Student #: </td><td><input type='text' id="stud_num" /></td><td>Date of Birth: </td><td><input type='date' id="bday" /></td><td>Place of Birth: </td><td><input type='text' id="PoB" /></td></tr>
				<tr><td>Citizenship: </td><td><input type='text' id="citizenship" /></td><td>Civil Status: </td><td><select id="civil_status"><?php $civilStatus=array("Single", "Married", "Widowed", "Divorced"); for($i=0;$i<=count($civilStatus)-1;$i++){ echo "<option value='".$civilStatus[$i]."'>".$civilStatus[$i]."</option>"; } ?></select></td><td>Religion: </td><td><input type='text' id="religion" /></td></tr>
				<tr><td>Name of Father: </td><td><input type='text' id="father" /></td><td>Name of Mother: </td><td><input type='text' id="mother" /></td><td>Name of Spouse: </td><td><input type='text' id="spouse" /></td></tr>
				<tr><td>Permanent Address: </td><td><input type='text' id="perm_address" /></td><td>Contact Number: </td><td colspan=3><input type='text' id="contact" /></td></tr>
			</table><hr />
			<strong id="educational_background">Educational Background</strong>
			<table cellpadding=10 style="width:100%;">
				<tr><td>Elementary: </td><td><input type='text' id="elem" /></td><td></td><td><select id="elem_yr"><?php $year = date("Y"); $end_date = $year - 100; for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
				<tr><td>High School: </td><td><input type='text' id="hs" /></td><td></td><td><select id="hs_yr"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
				<tr><td>Undergraduate: </td><td><input type='text' id="ug" /></td><td></td><td><select id="ug_yr"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
				<tr><td>Graduate: </td><td><input type='text' id="grad" /></td><td></td><td><select id="grad_yr"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
			</table><hr />
			<strong>Request for: </strong> (Please check appropriate box)<br /><br />
			<button type="button" class="btn btn-primary" data-toggle="button" onClick="torChoice()" id="torChoice">Transcript of Record</button><br /><br />
			<div id="torInner"></div>
			<table><tr><td><button type="button" class="btn btn-primary" data-toggle="button" onClick="forCertification()" id="certification">Certification (<i>Specify</i>): </button></td><td>&nbsp;&nbsp;&nbsp; <input type='text' id='certification_reason' class="certification_reason" /></td></tr></table><br />
			<button type="button" class="btn btn-primary" data-toggle="button" onClick="getDiploma()" id="diploma">Diploma </button><hr /><br />
			<strong>Course: </strong> <select id="course">
				<?php
					$programs = array(
							"ABCOM",
							"AB English",
							"ABPOLSCI",
							"BEED",
							"BSED",
							"BEED-BSED",
							"BLIS",
							"BSBIO",
							"BSHAE",
							"BSIT",
							"BSHRM",
							"BSMATH",
							"BSTHRM",
							"BSSW",
							"D.A.",
							"D.M.",
							"Ed.D.",
							"M.A. EdAd",
							"M.A. Math",
							"M.A. Sped",
							"M.A.T",
							"M.B.",
							"M.E.",
							"M.M.",
							"M.P.E.",
							"M.S.W.",
							"Ph.D.",
						);
					for($i=0;$i<=count($programs) - 1;$i++){
						echo "<option value=".$programs[$i].">".$programs[$i]."</option>";
					}
				?>
			</select>&nbsp;&nbsp;<strong>Major/Specialization:</strong> <input type='text' id="spec" style="width:170px;" />
			<table cellpadding=10 style="width:100%;">
				<tr><td>First Attendance in the institution: </td><td>
					<select id="fa">
						<?php
							$month = array(
								"January",
								"February",
								"March",
								"April",
								"May",
								"June",
								"July",
								"August",
								"September",
								"October",
								"November",
								"December"
							);
							for($i=0;$i<=count($month)-1;$i++){
								echo "<option value='".$month[$i]."'>".$month[$i]."</option>";
							}
						?>
					</select></td><td></td><td><select id="fa_yr" style="width:120px;"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
					<tr><td>Last Attendance in the institution: </td><td>
					<select id="la">
						<?php
							$month = array(
								"January",
								"February",
								"March",
								"April",
								"May",
								"June",
								"July",
								"August",
								"September",
								"October",
								"November",
								"December"
							);
							for($i=0;$i<=count($month)-1;$i++){
								echo "<option value='".$month[$i]."'>".$month[$i]."</option>";
							}
						?>
					</select></td><td></td><td><select id="la_yr" style="width:120px;"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
					<tr><td>Number of Semesters and Summers: </td><td colspan=3><input type='text' id="sum_sem" /></td></tr>
					<tr><td>Graduation Date: </td><td><select id="grad_month">
						<?php
							$month = array(
								"January",
								"February",
								"March",
								"April",
								"May",
								"June",
								"July",
								"August",
								"September",
								"October",
								"November",
								"December"
							);
							for($i=0;$i<=count($month)-1;$i++){
								echo "<option value='".$month[$i]."'>".$month[$i]."</option>";
							}
						?>
					</select></td><td></td><td><select id="grad_yr" style="width:120px;"><?php for($i=$year;$i>=$end_date;$i--){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>
			</table><hr />
			<div id="for_blank"></div><br /><br />
			<center><button class="btn btn-success btn-large" id="finish" onClick="finish()">Finish</button></center>
		</div>
	</body>
</html>