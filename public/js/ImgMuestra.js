
	function CambiarFotoRecurso(input) {	
	  
	  if(input.files && input.files[0]){
		  var reader = new FileReader;
		  reader.onload = function (e) {
		  	var Imagen = new Image;
 			Imagen.onload = function() {
		  		document.getElementById('imgmuestra').src = Imagen.src;	
 			}
 			Imagen.src = reader.result;
		  }

		  	reader.readAsDataURL(input.files[0]);
	  }
	}