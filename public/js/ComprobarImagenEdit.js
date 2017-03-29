function ComprobarImagen() {   
	var imagen = document.getElementById('imgmuestra').src;
	var src = imagen + "";
	
      if(src.length < 42){
                document.getElementById('img').required = "true";
                iziToast.error({message: 'No has introducido la imagen',});

       }
      }