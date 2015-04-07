(function(){
	function isH264(){
		var video = document.createElement('video');
		return typeof video !== undefined && ( "canPlayType" in video ) && video.canPlayType('video/mp4') !== '';
	}
	if(!isH264()){
		head.js(ROOT_JS+'/js/swfobject.js',ROOT_JS+'/js/jquery.strobemediaplayback.js', function() {
			window.$players = [];
			var videos = document.getElementsByTagName("video");
			for(var i=0;i < videos.length;i++){
				var src = videos[i]['data-url'];
				
				var options = {
					poster: (typeof videos[i].poster !== 'undefined')?videos[i].poster:false,
					src: src,
					streamType: "recorded",
					width: 640,
					height: 360,
					enableStageVideo: true,
					controlBarAutoHide: true,
					playButtonOverlay: true
				};
				var $strobemediaplayback = $(videos[i]);
				window.$players.push( $strobemediaplayback.strobemediaplayback(options) );
				// window.player = $player[0];
			}
		});	
	}
})();