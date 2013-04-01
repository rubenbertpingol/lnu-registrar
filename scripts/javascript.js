	// jQuery.fn.centralize = function(){
		// this.css({
			// "position":"absolute",
			// "left":($(window).width() - this.outerWidth())/2.0,
			// "top":($(window).height() - this.outerHeight())/2.0,
		// });
	// }
// function dialog(output){
// $("#modalMe").html("\
			// <div id='mask'></div>\
			// <div id='dialog'>"+output+"\
			// ").show();
			// $("#mask").hide();
			// $("#mask").css({"background":"black", "position":"fixed","top":"0", "bottom":"0","left":"0","right":"0", "opacity":"0.5", "z-index":"1"});
			// $("#dialog").css({"position":"fixed", "z-index":"2", "background":"white", "padding":"10px", "box-shadow":"0px 0px 10px #fff"}).centralize();
			// $("#dialog").css({"position":"fixed", "top":"-500px"});
			// $("#mask").fadeIn(500);
			// var myHeight = ($(window).height() - $("#dialog").outerHeight())/2.0;
			// $("#dialog").animate({"top":myHeight + 200}, function(){
				// $(this).animate({"top":myHeight});
			// });
			// $("#mask").click(function(){
				// $("#dialog").animate({"top":myHeight + 200}, function(){
					// $(this).animate({"top":"-500px"}, function(){
						// $("#mask").animate({"width":"0", "height":"0"}, function(){
							// $("#dialog").remove();
							// $("#mask").remove();
						// });
					// });
				// });
			// });
// 
//}
function edit(id){
	$.get(base_url+"crud/edit_data/"+id, function(output){
		$("#dialog:ui-dialog").dialog("destroy");
		$("#dialog").dialog({
			modal: true,
			show: "blind",
			hide: "explode",
			buttons:{
				Ok: function(){
					$( this ).dialog( "close" );
				}
			}
		});
		
		$("#dialog p").html(output);
	});
}
function delete_row(id){
	$.get(base_url+"crud/delete_data/"+id, function(output){
		$(".myRow"+id).fadeOut(500, function(){
			$(this).remove();
		});
	});
}