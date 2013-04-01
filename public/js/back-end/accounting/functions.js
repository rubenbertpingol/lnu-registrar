
function confirmRequest(id , event){
	var tr	=	$(event);
	$(tr).removeClass("btn-primary").addClass("btn-success").parents("tr").fadeOut(500);
	$.post(base_url+'/accounting/confirmRequest',{'requestId':id},function(data){
			$('table').prev().remove();
			if(data == 1){
				$('table').before('<div class="alert alert-success"> <i class="icon-check"></i> Request Confirmed!</div>');
				$('table').prev().fadeOut(2000);
			}else{
				$('table').before('<div class="alert alert-danger"> Record Not Confirmed. </div>');
			}
			setTimeout(function(){
				window.location.href=base_url+"accounting";
			},2500);
	});
	return false;
}

function createSearch( val,event ){
	$('form input[type="hidden"]').val(val);
	var value = $(event).children().html();
	$(event).parents("ul").prev().html("Search for "+ value);
	
	var arr	=	['asd','a'];
	
	console.log(arr[1]);
	return false;
}
