var canonicalRootUrl= "http://www.titletowntx.com";
var ttPlayerInstance = jwplayer("tt-playlist-player");
var playerList;
var freezeForAd;
var debug=true;

var ttVideoUtil = {

		  
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
}	    


//Grab playlist array from the JSON
var grabJson = {
	videos: function() {
		jsonUrl = 'http://content.jwplatform.com/feeds/Fsks2jeZ.json'; //Production Playlist
		//	jsonUrl = 'https://content.jwplatform.com/feeds/vwhlRkuq.json'; // QA Playlist
		
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
		

//Setup the Player	
	ttPlayerInstance.setup({
		playlist: playerList,
		visualplaylist:false,
		  //"displaydescription": true,
		  "displaytitle": true,
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


});

