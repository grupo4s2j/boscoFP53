$(function(){
	margin = 10,
	PosicionInicial = 0;
	dom = {}
	st = {
		stickyElement: '#avisocookies',
		footer: '.footer',
	}
	catchDom = function(){
		dom.stickyElement = $(st.stickyElement);
		dom.footer = $(st.footer);
	}
	afterCatchDom = function (){
		functions.ubicarPosicionIn()
	}
	suscribeEvents = function (){
		$(window).on('scroll', events.moveStick);
	}
	events = {
		moveStick : function(){
			windowpos = $(window).scrollTop();
			box = dom.stickyElement;
			footer = dom.footer.offset();
			if ($(window).height() < footer.top - (windowpos + margin)){
				pos = windowpos + $(window).height() - (box.height() + margin);
				dom.stickyElement.css({ 
					top: pos + "px",
					bottom: ''	
				})
			}else{
				pos = footer.top - (box.height + margin);
				dom.stickyElement.css({ 
					top: pos + "px",
					bottom: ''	
				})
			}
		}
	}
	functions = {
		ubicarPosicionIn : function(){
			var nuevaPos = $(window).height() - (dom.stickyElement.height() + margin);
			$(st.stickyElement).css('top', nuevaPos + "px");
			PosicionInicial = nuevaPos;
		}
	}
	var init = function (){
		catchDom();
		afterCatchDom();
		suscribeEvents();
	}
	init()
})
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