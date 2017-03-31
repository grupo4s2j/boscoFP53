function Traductor(){
	new google.translate.TranslateElement({
		pageLanguaje: 'es',
		layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
		multilanguajePage: true
	}, 'google_traductor');
}