
	function CambiarFotoRecurso(input) {	
	  
	  if(input.files && input.files[0]){
	  	 var extensiones_permitidas = new Array("gif", "jpg", "png");
		 var nombredocumento = document.getElementById('img').value + '';
		 var extension = nombredocumento.split('.').pop();
		 var esImagen = false;
		 for (var i=0; i < extensiones_permitidas.length; i++){
		 	if(extensiones_permitidas[i] == extension){
		 		esImagen = true;
		 		break;
		 	}
		 }
		 if(esImagen== true){
		  var reader = new FileReader;
		  reader.onload = function (e) {
		  	var Imagen = new Image;
 			Imagen.onload = function() {
		  		document.getElementById('imgmuestra').style["display"] = "block";
		  		document.getElementById('imgmuestra').src = Imagen.src;
 			}
 			Imagen.src = reader.result;
		  }

		  	reader.readAsDataURL(input.files[0]);
		  }else{
		  	document.getElementById('img').value = "";
		  	document.getElementById('imgmuestra').src = "";
		  	iziToast.error({message: 'El archivo que has introducido no es una imagen',});
		  }
	  }else{
	  	document.getElementById('imgmuestra').src = "";
	  	iziToast.error({message: 'No has seleccionado ninguna imagen',});
	  }
	}