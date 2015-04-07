function showErrors(errors){
	showBox(errors, 'error');
}
function showMessage(message){
	showBox(message, 'message');
}
function showBox(message, type){
	if(!$('#message').length){
		$('body').append('<div id="message">'+
								'<div id="messcont"></div>'+
								'<div id="messbut"><a class="aBut" href="javascript:void(0);" onclick="$(\'#message\').hide();">Ok</a></div>'+
							'</div>');
	}
	$('#messcont').html(message);
	$message = $('#message');
	if(type == 'error'){
		$message.attr('class','redM');
	}else{
		$message.attr('class','greenM');
	}
	$message.show();
}
if(typeof noga === 'undefined'){
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36599628-1']);
  _gaq.push(['_setDomainName', 'www.easy-bits.com']);
  _gaq.push(['_trackPageview']);

  (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 } 
 $(document).ready(function() {

	$("body").bind("ajaxSend", function(){
		   pWait();
		 }).bind("ajaxComplete", function(e, xhr, settings){
			if(settings.dataType == 'json'){
				var data = $.parseJSON( xhr.responseText );
				if(typeof data.errors != 'undefined'){
					if(data.errors.length > 0){
							alert(data.errors);
						}	
				}
			}
		   rWait();
		 });
});
var wait = 0;
function pWait(){
	wait++;
	$('#background').css('display', 'block');
}
function rWait(){
	wait--;
	if(wait == 0){
		$('#background').css('display', 'none');
	}	
}
function showSuccess( str ){
	$('body').append('<div id="success">'+str+'</div>');
	$('#success').animate({
				opacity:0,
				fontSize:"100px"
			},
			2000,
			function(){
				$('#success').remove();
			}
	);
}
function vemail( str ){
	return (str.search(/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/) != -1);
}