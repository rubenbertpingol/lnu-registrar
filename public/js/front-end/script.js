// JavaScript Document
$(document).ready(function(){
	$('img').click(function(){
		myIndex	=	$(this).parent().children().index(this);
		$(this).attr("data-toggle","modal");
		$(this).attr("href","#myModalImages");
		divElement	=	$(".mine")[myIndex];
		for(a=0; a <= $(".mine").length -1; a++){
			
			if($($(".mine")[a]).hasClass("active")){
				$($(".mine")[a]).removeClass('active');
			}
		}
		
		$(divElement).addClass('active');
		
	});
	
	$('#UP').popover({});
	$('#VPA').popover({});
	$('#VPAA').popover({});
	$('#DCME').popover({});
	$('#DCOE').popover({});
	$('#DCAS').popover({});
	$('#CAU').popover({});
	$('#VPAA').popover({});
	$('#CAF').popover({});
});