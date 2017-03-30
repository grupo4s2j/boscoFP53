function checkearCookies(){
	if(window.localStorage.getItem('AvisoCookies')){
		$('#avisocookies').hide();
	}
}
checkearCookies();
$('#aceptarcookies').on("click", 
	function(){
		window.localStorage.setItem('AvisoCookies', true);
		$('#avisocookies').hide();
	}

)