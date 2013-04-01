var browserName = navigator.appName;
/* if(browserName=="Microsoft Internet Explorer"){
	window.location.href="https://www.google.com/intl/en/chrome/browser/";
} */

var torChoiceVar = 0, forEmployment = 0, forFurtherStudies = 0, torOthers = 0, graduate = 0, undergraduate = 0;

function readURL(input, img_id){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#'+img_id).attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function show_image_uploader(type){
	var uploader = document.getElementById("image_uploader_type");
	switch(parseInt(type)){
		case 1:
			uploader.innerHTML="<img src=\"d\" width='550' id='banner_img' class=\"banner_size\" /><input type='file' id='banner_upload' onchange='readURL(this, \"banner_img\")' />";
			break;
		case 2:
			uploader.innerHTML="<img src=\"d\" width='550' id='featured_img' class=\"banner_size\" /><input type='file' id='featured_upload' id='featured_upload' onchange='readURL(this, \"featured_img\")' />";
			break;
		case 3:
			uploader.innerHTML="";
			break;
		default:
			alert("Please choose from the given options");
	}
}
var torInner = "<ul class=\"no_bullets forEmployment\" style=\"position:relative;left:20px;\">\
		<li>\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" onClick='forEmployment()' id=\"forEmployment\">For Employment</button><br /><br />\
			<div id=\"forEmploymentInner\"></div>\
		</li>\
		<li>\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" id=\"forFurtherStudies\">For further studies</button> (Transfer Credentials/Honorable Dismissal - <strong>Note: to be issued only ONCE</strong>)\
		</li>\
		<li>\
			<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"button\" onClick='torOthers()' id=\"torOthers\">Others</button>&nbsp;&nbsp;&nbsp;<span id='torOthersOutput'></span>\
		</li>\
	</ul><br /><br />";
var forEmploymentInner = "<ul>\
				<li style=\"padding:10px;\"><strong>Level</strong>\
					<ul>\
						<li><div class=\"btn-group\" data-toggle=\"buttons-radio\">\
							  <button type=\"button\" class=\"btn btn-primary\" id=\"graduate\">Graduate</button>\
							  <button type=\"button\" class=\"btn btn-primary\" id=\"undergraduate\">Undergraduate</button>\
							 </div>\
						</li>\
					</ul>\
				</li>\
				<li style=\"padding:10px;\"><strong>Type of Application</strong>\
					<ul>\
						<li><div class=\"btn-group\" data-toggle=\"buttons-radio\">\
							  <button type=\"button\" class=\"btn btn-primary\" id=\"newTOR\">New</button>\
							  <button type=\"button\" class=\"btn btn-primary\" id\"renewTOR\">Renewal</button>\
							 </div>\
						</li>\
					</ul>\
				</li>\
			</ul>";
function finish(){
	var variables = [
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
		"elem",
		"elem_yr",
		"hs",
		"hs_yr",
		"ug",
		"ug_yr",
		"grad",
		"grad_yr"
	];
	alert(torChoiceVar, forEmployment, torOthers);
}
function torChoice(){
		$("#torInner").html(torInner).show();
		$("#torChoice").attr("onClick", "closetorInner()");
		torChoiceVar = 1;
		alert(torChoiceVar);
}
function closetorInner(){
	$(".forEmployment").remove();
	$("#torChoice").attr("onClick", "torChoice()");
	torChoiceVar = 0;
	alert(torChoiceVar);
}
function forEmployment(){
	$("#forEmploymentInner").html(forEmploymentInner).show();
	$("#forEmployment").attr("onClick", "closeForEmployment()");
	forEmployment = 1;
}
function closeForEmployment(){
	$("#forEmploymentInner ul").remove();
	$("#forEmployment").attr("onClick", "forEmployment()");
	forEmployment = 0;
}
function torOthers(){
	$("#torOthersOutput").html("<input type='text' placeholder='Specify' />").show();
	$("#torOthers").attr("onClick", "closetorOthers()");
	torOthers = 1;
}
function closetorOthers(){
	$("#torOthersOutput input").remove();
	$("#torOthers").attr("onClick", "torOthers()");
	torOthers = 0;
}
$(document).ready(function(){
	$('.carousel').carousel({
	  interval: 5000, pause: "hover"
	});
	$('#datepicker').datepicker({
					inline: true
				});
	$(".latest_news_content").hover(function(){
		$(this).css({"overflow-y":"scroll","padding-left":"15px","padding-right":"15px"});
		//$(".arrow_down").css({"visibility":"hidden"});
	}, function(){
			$(this).css({"overflow":"hidden","padding-left":"15px","padding-right":"34px"});
			//$(".arrow_down").css({"visibility":"visible"});
	});
});