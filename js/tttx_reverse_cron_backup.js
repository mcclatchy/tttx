var canonicalRootUrl= "http://www.titletowntx.com";
var ttPlayerInstance = jwplayer("tt-playlist-player");
var playerList;
var freezeForAd;
var debug=true;

console.log('edit');

var ttVideoUtil = {
	//Function to scroll to top of page
		scrollToPlayer: function(){
	$('html, body').animate({scrollTop: 5,}, 1000);
	},
	
	//Function for playing using the visual playlist
	playThis: function(mediaid) {
		if(freezeForAd){
			//Do nothing if an ad is running		
		}else{
			//Play appropriate playlist item
			this.scrollToPlayer();
			index = this.grabIndex(playerList,mediaid);
			jwplayer("tt-playlist-player").playlistItem(index);		
		}
	},
	  
	//Function for getting an index from a playlist using mediaid
	grabIndex: function(list,id){
		var playlistIndices = [];
		var i = 0;
			for (i=0; i<list.length; i++) {
				var mediaid = list[i].mediaid; 
				playlistIndices[mediaid]=i;
			}
		return(playlistIndices[id]);
	},
	  
	//Function for getting mediaID from URL and then index from mediaID 
	// Returns Index or False
	deepLink: function(originalList){
		var parts = window.location.search.substr(1).split("&");
		var $_GET = {};
		for (var i = 0; i < parts.length; i++) {
			var temp = parts[i].split("=");
			$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
		}
		var mediaRequest= $_GET.play; 
		var playspot = this.grabIndex(originalList,mediaRequest);
		if (typeof playspot !== 'undefined') {
			return(playspot);
		}else{
			return(false); //NO DEEPLINK or MALFORMED DEEPLINK
		}
	},
	
	//Function for moving deeplinked content up in the array
	move: function(arr, old_index, new_index) {  
	    while (old_index < 0) {  
	        old_index += arr.length;  
	    }  
	    while (new_index < 0) {  
	        new_index += arr.length;  
	    }  
	    if (new_index >= arr.length) {  
	        var k = new_index - arr.length;  
	        while ((k--) + 1) {  
	            arr.push(undefined);  
	        }  
	    }  
	     arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);    
	   return arr;  
	},  
	
	//Function to fade out current episode info, Also starts playlist disabling for ad
	dissolveInfo: function(){
	    $( "#episode-info" ).addClass( 'fadeOut' );
	    $( "#hero" ).addClass( 'smaller_hero' );
		this.adstart();
	},
	
	//Function to temporarily gray out Playlist during ad
	adstart: function(){
	    freezeForAd = true;
	    $('#tt-playlist-items').addClass('dim_for_ad');
	},
	
	//Function to return Playlist functionality after ad    
	adstop: function(){
	    freezeForAd = false;
	    $('#tt-playlist-items').removeClass('dim_for_ad');
	}
}	    

/*
//When page finishes loading animate title
$(window).load(function() {
	$("#hero").attr("src","http://media.star-telegram.com/static/labs/TitleTownTx/images/title_animated.gif");
});
*/

/*
//When page finishes loading animate title
$(window).load(function() {
	$("#hero").attr("src","http://media.star-telegram.com/static/labs/TitleTownTx/images/title_animated.gif");
});
*/


$("#hero").delay( 800 ).attr("src","http://media.star-telegram.com/static/labs/TitleTownTx/images/title_animated.gif");



//Grab playlist array from the JSON
var grabJson = {
	videos: function() {
		jsonUrl = 'http://content.jwplatform.com/feeds/Fsks2jeZ.json'; //Production Playlist
			//jsonUrl = 'https://content.jwplatform.com/feeds/vwhlRkuq.json'; // QA Playlist
		
		return $.getJSON(jsonUrl).then(function(data) {
	    	return data.playlist;
	    });
	}
};

//When grabJson finishes loading originalList then do all the things... 
grabJson.videos().done(function(originalList) {
	var  visualPlaylist = originalList.slice(0);			// Make a copy of the playlist to use for Visual Playlist
	var  deepLinkIndex = ttVideoUtil.deepLink(originalList); 			// Return an Index or False according to URL
	if(deepLinkIndex!== false){  							// If DeepLinkIndex Adjust Playerlist to load deeplinked vid first
		playerList = ttVideoUtil.move(originalList,deepLinkIndex,0);
		var epNumber = playerList.length - deepLinkIndex;	// Also figure out the episode number.
	}else{													// Else There is no Deeplink so keep the playerlist as is.
		playerList = originalList;
		var epNumber = playerList.length;	  				// Also figure out the episode number.
	}
		
//Check whether user agent is Mobile or Tablet
	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};
	
//Show appropriate sharing div for user agent
	if( isMobile.any() ) $('#mobile_sharing').removeClass('hide_me'), $('#desktop_sharing').addClass('hide_me');
	
//Setup the Player	
	ttPlayerInstance.setup({
		playlist: playerList,
		visualplaylist:false,
		displaytitle: false,
		debug: true, 
		image:"http://media.star-telegram.com/static/media/titletowntxmain.jpg",
		// Shadow and Sharing Designs set here.
		skin: {
			name: 'mi-video'
		},
		sharing: {
			link: canonicalRootUrl+'?play=MEDIAID',
			sites: ['facebook', 'twitter', 'reddit', 'email'],
			code: '<style>.mcclatchy-embed{position:relative;padding:0px 0 62.5%;height:0;overflow:hidden;max-width:100%}.mcclatchy-embed iframe{position:absolute;top:0;left:0;width:100%;height:100%}</style><div class="mcclatchy-embed"><iframe src="'+ canonicalRootUrl +'/embed.php?play=MEDIAID" width="640" height="400" frameborder="0" allowfullscreen="true"></iframe></div>'
		}
	});

//Figure days till next episode
    var d = new Date();
	var n = d.getDay();
    var count_down;
 //   if  (n < 3){count_down = 3-n; }else{ count_down = 10-n; }
    
    if  (n == 0){count_down = 'IN 3 DAYS'; } //  3 - n  Sunday 
    if  (n == 1){count_down = 'IN 2 DAYS'; } //  3 - n  Monday
	if  (n == 2){count_down = 'IN 1 DAY' ; } //  3 - n  Tuesday
    
    if  (n == 3){count_down = 'IN 7 DAYS'; } // 10 - n  Wednesday
	if  (n == 4){count_down = 'IN 6 DAYS'; } // 10 - n  Thursday
	if  (n == 5){count_down = 'IN 5 DAYS'; } // 10 - n  Friday
	if  (n == 6){count_down = 'IN 4 DAYS'; } // 10 - n  Saturday

//Build the Visual Playlist	
	var html = '';
	var index;	
	ttPlayerInstance.on('ready',function(){
		var playlist = visualPlaylist;
		index = playlist.length +1;
		if (n !== 3){ 
			html += '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 episode-item">' +
				'<span class="episode-number" style="color:#999;">Next Episode</span>' +
		        '<img class="episode-thumb img-responsive" src="images/dummy.jpg">' +
		        '<h3 style="color:#999;">'+ count_down +'</h3>' +
		        '<div style="display:none;" class="description"></div>' +
		        '</a></div>';
		    }    
		for (var i=0;i<playlist.length;i++){
			index--;	
			if (index != 1){
				var pretitle = 'Episode ' + Number(index - 1) ;
			}else{
				var pretitle = 'Trailer';
			}
			html += '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 episode-item" data-mediaid="' + playlist[i].mediaid + '" data-index="' + i +
			'" ><a class="ep_link" href="javascript:ttVideoUtil.playThis(\''+playlist[i].mediaid+'\');">' +
	        '<span class="episode-number">' + pretitle + '</span>' +
	        '<img class="episode-thumb img-responsive" src="' + playlist[i].image + '">' +
	        '<h3>' + playlist[i].title + '</h3>' +
	        '<div style="display:none;" class="description">' + playlist[i].description + '</div>' +
	        '</a></div>';
		}
//Build the Current Title and Description
		$('#tt-playlist-items').html(html);
		
		if (epNumber != 1){
				var hero_ep = 'Episode ' + Number(epNumber - 1) ;
			}else{
				var hero_ep = 'Trailer';
			}
		
		$('#cur_ep_num').html(hero_ep);
		$('#cur_title').html(playerList[0].title);
		$('#cur_desc').html(playerList[0].description);
	});   
	
//Once the player has an item update the visual playlist and the URL to reflect chosen video. Fires on page load and when videos change
	ttPlayerInstance.on('playlistItem', function(currentVid) {
	    $('.episode-item').removeClass('active');
	    $('.episode-item[data-mediaid="' + currentVid.item.mediaid + '"]').addClass('active');
	    window.history.replaceState('Object', 'Title', '?play='+currentVid.item.mediaid);
	});			

//Once the player is about to start dissolve out the episode info, and pause the playlist functionality 
	ttPlayerInstance.on('beforePlay', function(){ ttVideoUtil.dissolveInfo();});

//Once an ad has run return the playlist functionality
	ttPlayerInstance.on('adComplete', function(){ ttVideoUtil.adstop();});
	ttPlayerInstance.on('adSkipped', function(){ ttVideoUtil.adstop();});
});

