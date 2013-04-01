$(function(){
	
	$("button.validatedClientData").click(function(){
		var me = $(this),
				validData = me.attr('data-validated'),
				alert_mes = $(".alert-messages"),
				dismiss_btn = $("<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>");
			
			alert_mes.empty();
			
			if( validData.length > 0 )
			{
				$.ajax({
					url: base_url+"registrar/validateClientData",
					data: JSON.parse(validData),
					type: 'POST',
					beforeSend: function(){
						me.removeClass('btn-primary').addClass('btn-info');
						me.text("Validating...")
					},
					success: function(o){
						// console.log(me.parents("tr"));
						me.parents("tr").fadeOut("normal",function(){
							alert_mes.addClass("alert alert-success");
							alert_mes.text("Validation success...");
							alert_mes.append(dismiss_btn);
						});
					}
				});
			} else {
				return false;
			}
		
	});
	
});