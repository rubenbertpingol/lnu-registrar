
		<div style="clear: both;"></div>
		
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
		<script>
			
			$(".notifyClient").click(function(){
				$("#myModal").modal("show");
				
			});
			
			$(function(){
			
				$("ul.search-options li > a").click(function(event){
					
					var $me = $(event.target),
							$ul = $(event.target).parents(".search-options"),
							$search_by = $(".input-search-by");
					
					$ul.prev().find(".btn-text").text($me.text());
					$search_by.val($me.attr("data-role"));
					
				});
			
			});
			// $('#myModal').on('show', function (e) {
					// if (!data) return e.preventDefault() // stops modal from being shown
			// })
		</script>
	</body>
</html>