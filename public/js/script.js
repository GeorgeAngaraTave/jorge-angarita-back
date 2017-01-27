$( document ).ready(
	function() {

		$('#querydiv').hide();
		$('#setdiv').hide();
		$('#boton').hide();
		

	$('#dropdown').change(function(){
	    
		var valor=$('#dropdown').val();
		if(valor=="Set")
		{
			$('#setdiv').show();
			$('#querydiv').hide();
			$('#boton').show();
			$('#respuesta').html('');
		
		}

		if(valor=="Query")
		{
			
			$('#querydiv').show();
			$('#setdiv').show();
			$('#boton').show();
			$('#respuesta').html('');


		}

		if(valor=="")
		{
			
			$('#querydiv').hide();
			$('#setdiv').hide();
			$('#boton').hide();
			$('#respuesta').html('');
		}


	});

	$('#boton').click(
		function(){
			var dato = $("#miform").serialize();
			var route  = window.location.href;
			var token = $("#token").val();

			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data:dato,
				success: function(result){
				console.log(result);
						$("#respuesta").html(result.mensaje)
					
				}
			});

		});


});