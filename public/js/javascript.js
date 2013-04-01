var torChoiceVar = 0, forEmp = 0, grad_level = 0, under_grad_level = 0, new_application = 0, renewal = 0, further_studies = 0, other_reasons = 0;
var certification = 0, diploma = 0;
var browserName = navigator.appName;
var isEmptyVar = 0;
function is_Empty(element){
	//var theID = document.getElementById("#" + value);
	if(document.getElementById(element).value==""){
		$("#" + element).css("border","1px solid red");
		isEmptyVar = 1;
	}
}
var torInner = "<ul class=\"no_bullets forEmployment\" style=\"position:relative;left:20px;\">\
		<li>\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" onClick='forEmployment()' id=\"forEmployment\">For Employment</button><br /><br />\
			<div id=\"forEmploymentInner\"></div>\
		</li>\
		<li>\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" id=\"forFurtherStudies\" onClick=\"forFurtherStudies()\">For further studies</button> (Transfer Credentials/Honorable Dismissal - <strong>Note: to be issued only ONCE</strong>)\
		</li>\
		<li><br />\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" onClick='torOthers()' id=\"torOthers\">Others</button>&nbsp;&nbsp;&nbsp;<span id='torOthersOutput'></span>\
		</li>\
	</ul>";
var forEmploymentInner = "<ul>\
				<li style=\"padding:10px;\"><strong>Level</strong>\
					<ul>\
						<li>\
							<span></span>\
							<div class=\"btn-group\" data-toggle=\"buttons-radio\">\
							  <button type=\"button\" class=\"btn btn-primary\" id='grad_level_val' onClick='grad_level=1;under_grad_level=0;'>Graduate</button>\
							  <button type=\"button\" class=\"btn btn-primary\" id='under_grad_level_val' onClick='grad_level=0;under_grad_level=1;'>Undergraduate</button>\
							 </div>\
						</li>\
					</ul>\
				</li>\
				<li style=\"padding:10px;\"><strong>Type of Application</strong>\
				<div id='output_message'></div>\
					<ul>\
						<li><span></span><div class=\"btn-group\" data-toggle=\"buttons-radio\">\
							  <button type=\"button\" class=\"btn btn-primary\" onClick='new_TOR()' id='new_TOR'>New</button>\
							  <button type=\"button\" class=\"btn btn-primary\" onClick='renew_TOR()' id='renew_TOR'>Renewal</button>\
							 </div>\
						</li>\
					</ul>\
				</li>\
			</ul>";
function torChoice(){
		$("#torInner").html(torInner).show();
		$("#torChoice").attr("onClick", "closetorInner()");
		torChoiceVar = 1;
}
function closetorInner(){
	$(".forEmployment").remove();
	$("#torChoice").attr("onClick", "torChoice()");
	torChoiceVar = 0;
	forEmp = 0;
}
function forEmployment(){
	$("#forEmploymentInner").html(forEmploymentInner).show();
	$("#forEmployment").attr("onClick", "closeForEmployment()");
	forEmp = 1;
}
function closeForEmployment(){
	$("#forEmploymentInner ul").remove();
	$("#forEmployment").attr("onClick", "forEmployment()");
	forEmp = 0;
	grad_level = 0;
	under_grad_level = 0;
	new_application = 0;
	renewal = 0;
}
function torOthers(){
	$("#torOthersOutput").html("<input type='text' placeholder='Specify' />").show();
	$("#torOthers").attr("onClick", "closetorOthers()");
	other_reasons = 1;
}
function closetorOthers(){
	$("#torOthersOutput input").remove();
	$("#torOthers").attr("onClick", "torOthers()");
	other_reasons = 0;
}
function finish(){
	//fix this part here
	//must detect empty fields
	
	
	//alert(torChoiceVar + "" + forEmp + "" + grad_level + "" + under_grad_level + "" + new_application + "" + renewal + "" + further_studies + "" + other_reasons + "" + certification + "" + diploma);
	if(certification==1 && document.getElementById("certification_reason").value==""){
		
		$("#certification_reason").css("border", "1px solid red").after("<span style=\"color:red!important\"> * Please state your reason</span>");
		return false;
	}else{
		$("#certification_reason").next().remove();
	}
	/* is_Empty("ln");is_Empty("fn");is_Empty("mn");is_Empty("stud_num");is_Empty("bday");is_Empty("PoB");
	is_Empty("citizenship");is_Empty("civil_status");is_Empty("religon");is_Empty("father");is_Empty("mother");
	is_Empty("spouse");is_Empty("perm_address");is_Empty("contact");is_Empty("elem_yr");is_Empty("elem");is_Empty("hs");
	is_Empty("hs_yr");is_Empty("ug");is_Empty("ug_yr");is_Empty("grad");is_Empty("grad_yr");is_Empty("course");is_Empty("fa");
	is_Empty("fa_yr");is_Empty("la");is_Empty("la_yr");is_Empty("sum_sem");is_Empty("grad_month");is_Empty("grad_yr");
	is_Empty("certification_reason"); */
	
	var var_arr = [
		"ln",
		"fn",
		"mn",
		"mnm",
		"stud_num",
		"bday",
		"PoB",
		"citizenship",
		"civil_status",
		"religion",
		"father",
		"mother",
		"spouse",
		"perm_address",
		"contact",
		"elem",
		"elem_yr",
		"hs",
		"hs_yr",
		"ug",
		"ug_yr",
		"grad",
		"grad_yr",
		"course",
		"spec",
		"fa",
		"fa_yr",
		"la",
		"la_yr",
		"sum_sem",
		"grad_month",
		"grad_yr",
		"certification_reason"
	];
	for(var i=0; i<=32; i++){
		var holder = document.getElementById(var_arr[i]);
		console.log(holder);
		var_arr[i] = holder;
		
		
		
		/* 
		if(i==3){
			var "mnm" = (document.getElementById("mnm").value=="Middle Name for Married") ? "" : document.getElementById("mnm").value;
		}else if(i==24){
			var spec = (document.getElementById("spec").value=="") ? "n/a" : document.getElementById("spec").value;
		}else{ */
			//isEmpty(var_arr[i]);
			//var var_arr[i] = document.getElementById(var_arr[i]);
		//}
	}/*
	var mnm = (document.getElementById("mnm").value=="Middle Name for Married") ? "" : document.getElementById("mnm").value;
	var spec = (document.getElementById("spec").value=="") ? "n/a" : document.getElementById("spec").value; */
	if(isEmptyVar==1){
		return false;
	}
	var torChoice = document.getElementById("torChoice").innerHTML;
	if(torChoiceVar==1){
		var forEmployment = document.getElementById("forEmployment").innerHTML;
		if(forEmp==1){
			var grad_level_val = document.getElementById("grad_level_val").innerHTML;
			var under_grad_level_val = document.getElementById("under_grad_level_val").innerHTML;
		}
		var forFurtherStudies = document.getElementById("forFurtherStudies").innerHTML;
		var torOthers = document.getElementById("torOthers").innerHTML;
	}
	
	
	
	$("#ln").after(ln + ", ").remove();
	$("#fn").after(fn).remove();
	$("#mn").after(mn).remove();
	$("#mnm").after(mnm).remove();
	$("#course").after(course + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;").remove();
	$("#spec").after(spec).remove();
	
	to_label(stud_num, "stud_num", 0);
	to_label(bday, "bday", 0);
	to_label(PoB, "PoB", 0);
	to_label(citizenship, "citizenship", 0);
	to_label(civil_status, "civil_status", 0);
	to_label(religion, "religion", 0);
	to_label(father, "father", 0);
	to_label(mother, "mother", 0);
	to_label(spouse, "spouse", 1);
	to_label(perm_address, "perm_address", 0);
	to_label(contact, "contact", 0);
	to_label(elem, "elem", 0);
	to_label(elem_yr, "elem_yr", 0);
	to_label(hs, "hs", 0);
	to_label(hs_yr, "hs_yr", 0);
	to_label(ug, "ug", 0);
	to_label(ug_yr, "ug_yr", 0);
	to_label(grad, "grad", 1);
	to_label(grad_yr, "grad_yr", 1);
	to_label(fa, "fa", 0);
	to_label(fa_yr, "fa_yr", 0);
	to_label(la, "la", 0);
	to_label(la_yr, "la_yr", 0);
	to_label(sum_sem, "sum_sem", 0);
	to_label(grad_month, "grad_month", 0);
	to_label(grad_yr, "grad_yr", 0);
	to_label(certification_reason, "certification_reason", 1);
	
	check_box_change(torChoice, "torChoice", torChoiceVar);
	check_box_change(forEmployment, "forEmployment", forEmp);
	check_box_change(forFurtherStudies, "forFurtherStudies", further_studies);
	check_box_change(torOthers, "torOthers", other_reasons);
	check_box_change("Certification: &nbsp;&nbsp;&nbsp;", "certification", certification);
	check_box_change("Diploma", "diploma", diploma);
	radio_box_change(grad_level_val, "grad_level_val", grad_level);
	radio_box_change(under_grad_level_val, "under_grad_level_val", under_grad_level);
	radio_box_change("New", "new_TOR", new_application);
	radio_box_change("Renew", "renew_TOR", renewal);
	$("tr").css("border-bottom", "1px solid #ccc");
	if(new_application==1){
		$("#output_message").html("").show();
	}
	document.getElementById("print_button").innerHTML="<a href=\"javascript:void(0)\" onClick=\"print_application()\">Print</a>";
	var blank="<br />\
				<span class=\"pull-right\">\
					_____________________________________<br />\
					<strong>Student's Signature and Printed Name</strong>\
				</span>\
	";
	$("#for_blank").html(blank).show();
	$("#finish").fadeOut();
	//window.print();
}
function radio_box_change(innerhtml, element, checked){
	if(checked==1){
		$("#" + element).parents("div").prev("span").before("<i class='icon-ok'></i> " + innerhtml);
		$("#" + element).remove();
	}else{
		$("#" + element).parents("div").prev("span").before(" | " + innerhtml + " | ");
		$("#" + element).remove();
	}
}
function check_box_change(innerhtml, element, checked){
	if(checked==1){
		$("#" + element).before("<i class='icon-ok'></i> " + innerhtml);
		$("#" + element).remove();
	}else{
		$("#" + element).before(innerhtml);
		$("#" + element).remove();
	}
}
function print_application(){
	$("#print_button").html("").show();
	$(".theHead").css({"font-size":"0.5em"});
	window.print();
}
function isEmpty(element){
	if(element==""){
		$("#" + element).css("border","1px solid red");
	}
}
function to_label(element_value, element, allow_null){
	var element_parent = $("#" + element).parents("td");
	element_parent.prev().wrap("<strong></strong>");
	if(element_value=="" && allow_null==1){
		element_parent.html("n/a").show();
	}else{
		element_parent.html(element_value).show();
	}
}
function grad_level(){
	grad_level = 1;
	under_grad_level = 0;
}
function under_grad_level(){
	grad_level = 0;
	under_grad_level = 1;
}
function new_TOR(){
	$("#output_message").html("<div class='alert alert-info'><strong>Notice: </strong> For new applications, please go to LNU campus personally to obtain the signatures of the following: <strong>Student Affairs / Grad. School coordinator</strong>, <strong>Undergrad / Grad. School Library</strong>, and <strong>Accounting</strong>.</div>").show();
	new_application = 1
	renewal = 0;
}
function renew_TOR(){
	$("#output_message").html("").show();
	renewal = 1;
	new_application = 0;
}
function forFurtherStudies(){
	$("#forFurtherStudies").attr("onClick", "forFurtherStudiesCancel()");
	further_studies = 1;
}
function forCertification(){
	$("#certification").attr("onClick", "notCertificate()");
	certification = 1;
}
function notCertificate(){
	$("#certification").attr("onClick", "forCertification()");
	certification = 0;
}
function getDiploma(){
	$("#diploma").attr("onClick", "notDiploma()");
	diploma = 1;
}
function notDiploma(){
	$("#diploma").attr("onClick", "getDiploma()");
	diploma = 0;
}
function forFurtherStudiesCancel(){
	$("#forFurtherStudies").attr("onClick", "forFurtherStudies()");
	further_studies = 0;
}
$(document).ready(function(){
	if(browserName == "Microsoft Internet Explorer"){
		document.getElementById("bday").value="mm/dd/yyyy"
	}
	$("#forFurtherStudies").click(function(){
		alert("dsad");
	});
	var e = $("#educational_background").offset();
	$("#ln").click(function(){
		if(document.getElementById("ln").value=="Last Name"){
			document.getElementById("ln").value="";
		}
	});
	$("#fn").click(function(){
		if(document.getElementById("fn").value=="First Name"){
			document.getElementById("fn").value="";
		}
	});
	$("#mn").click(function(){
		if(document.getElementById("mn").value=="Middle Name"){
			document.getElementById("mn").value="";
		}
	});
	$("#mnm").click(function(){
		if(document.getElementById("mnm").value=="Middle Name for Married"){
			document.getElementById("mnm").value="";
		}
	});
	$("#bday").click(function(){
		if(browserName=="Microsoft Internet Explorer"){
			if(document.getElementById("bday").value=="mm/dd/yyyy"){
				document.getElementById("bday").value="";
			}
		}
	});
	
	$("#ln").blur(function(){
		if(document.getElementById("ln").value==""){
			document.getElementById("ln").value="Last Name";
		}
	});
	$("#fn").blur(function(){
		if(document.getElementById("fn").value==""){
			document.getElementById("fn").value="First Name";
		}
	});
	$("#mn").blur(function(){
		if(document.getElementById("mn").value==""){
			document.getElementById("mn").value="Middle Name";
		}
	});
	$("#mnm").blur(function(){
		if(document.getElementById("mnm").value==""){
			document.getElementById("mnm").value="Middle Name for Married";
		}
	});
	$("#bday").blur(function(){
		if(browserName=="Microsoft Internet Explorer"){
			if(document.getElementById("bday").value==""){
				document.getElementById("bday").value="mm/dd/yyyy";
			}
		}
	});
});