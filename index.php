<!DOCTYPE html>
<html lang="en">
	<head>
	    <!-- Basic Page Needs -->
	    <meta charset="utf-8">
<?php include('custom_meta.php'); ?>
	    <!-- Mobile Specific Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <!-- CSS -->
	    <!-- BOOTSRAP CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <link rel="stylesheet" href="css/bootstrap-horizon.css">
	    <link rel="stylesheet" href="css/tttx.css">        
	
	    <!-- JW CLOUD PLAYER 
	    <script src="https://content.jwplatform.com/libraries/eIPXqY6e.js"></script>-->
	    <script src="self_host/jwplayer.js"></script>
		<script>jwplayer.key="tTakaWDwaA/5t6sLfLhYBB4EfEa1ETrJDYnTPw==";</script>
	
	    <!-- JQUERY  (Just for pulling the .JSON) -->
	    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		
		<!-- Start: GPT Async -->
		<script type='text/javascript'>
			var gptadslots=[];
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];
			(function(){ var gads = document.createElement('script');
				gads.async = true; gads.type = 'text/javascript';
				var useSSL = 'https:' == document.location.protocol;
				gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
				var node = document.getElementsByTagName('script')[0];
				node.parentNode.insertBefore(gads, node);
			})();
		</script>
		
		<script type="text/javascript">
			googletag.cmd.push(function() {
		// GPT slots
		// define ad mapping by viewport slot 1
			var mapping1 = googletag.sizeMapping().
			addSize([320, 400], [320, 50]).	// Accepts both common mobile banner formats
			addSize([320, 700], [320, 50]).	// Same width as mapping above, more available height
			addSize([750, 200], [728, 90]). // Landscape tablet
			addSize([1050, 200], [728, 90]).build(); // Desktop
		
				
		//Adslot 1 declaration
				gptadslots[1]= googletag.defineSlot('/7675/ftw.site_star-telegram/sports/highschool/football', [[320,50]],'div-gpt-ad-584431792727835734-1').setTargeting('sect',['titletowntx']).defineSizeMapping(mapping1).addService(googletag.pubads());
		
				googletag.pubads().enableSingleRequest();
				googletag.pubads().setTargeting('pl',['static']);
				googletag.pubads().collapseEmptyDivs();
				googletag.pubads().enableAsyncRendering();
				googletag.enableServices();
			});
		</script>
		<!-- End: GPT -->
		
		
		<!-- Facebook Pixel Code -->
			<script>
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','https://connect.facebook.net/en_US/fbevents.js');
			
			fbq('init', '1081709588515684');
			fbq('track', "PageView");fbq('track', 'Lead');</script>
			<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=1081709588515684&ev=PageView&noscript=1"
			/></noscript>
		<!-- End Facebook Pixel Code -->	

		
		<title>
		Titletown, TX: The Aledo Way | The Star-Telegram
		</title>
	</head>
<body>	
	<!-- Primary Page Layout -->
	<div class="container">
	    <div class="row">
		    <center>
		    	<img class="star-tel" src="images/star.png" ><BR>
	    	    <img id="hero" class="hero" alt="Titletown, TX" src="images/title_still.gif"/> 
	    	    <!-- <img id="hero" class="hero" alt="Titletown, TX" src="images/title_animated.gif"/> -->
	    	</center>
	    </div>
	
		
		<div class="row">
	        <div id="tt-playlist-player"></div>
		 </div>
	    
	    
	    <div class="row" id="episode-info">
		    <div id="cur_ep_num">Episode</div>
		    <div id="cur_title"></div>
			<div id="cur_desc"></div>		
		</div>
	    
	
	    <div class="row row-horizon" id="tt-playlist-items">
	    </div>
	
	    <div id="desktop_sharing" class="row">
	        <h2>
	            Follow us
	        </h2><center>
	        <a target="popup" onclick="window.open('https://twitter.com/intent/user?screen_name=titletowntx','name','width=550,height=556')"><img class="button" src="images/twitter.png"></a>
	        <a target="popup" onclick="window.open('https://www.snapchat.com/add/titletowntexas','name','width=550,height=556')"><img class="button" src="images/snapchat.png"></a>
	        <a target="popup" onclick="window.open('https://www.instagram.com/titletowntx/?ref=badge','name','width=550,height=556')"><img class="button" src="images/instagram.png"></a>
	        <a target="_blank" href="http://www.star-telegram.com/customer-service/newsletter-signup/"><img class="button" src="images/mail.png"></a>             
	        </center>
	        
	    </div>
	    <div id="mobile_sharing" class="row hide_me">
	        <h2>
	            Follow us
	        </h2><center>
	        <a href="twitter://user?screen_name=titletowntx"><img class="button" src="images/twitter.png"></a>
	        <a href="https://www.snapchat.com/add/titletowntexas"><img class="button" src="images/snapchat.png"></a>
	        <a href="instagram://user?username=titletowntx"><img class="button" src="images/instagram.png"></a>
			<a href="http://www.star-telegram.com/customer-service/newsletter-signup/"><img class="button" src="images/mail.png"></a>    
	        </center>
	        
	    </div>
<!--	    <div class="row" style="margin-top:40px; text-align: center">
	        <h2>
	            BROUGHT TO YOU BY
	        </h2>
	    </div>
	    
	    <div class="row" style="margin-bottom:40px;">
		    
		 
			<center>
			    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">  
			        <img class="img-responsive" src="images/320x50_JerrysMobile.jpg" />    
			    </div>
			    <div class="hidden-xs col-sm-12 hidden-md hidden-lg">
			        <img class="img-responsive" src="images/320x50_JerrysMobile.jpg" />   
			    </div>
			    <div class="hidden-xs hidden-sm col-md-12 hidden-lg">
			        <img class="img-responsive" src="images/JerrysAd_728x90_V2.jpg" />  
			    </div>
			    <div class="hidden-xs hidden-sm hidden-md col-lg-12">
			        <img class="img-responsive" src="images/JerrysAd_728x90_V2.jpg" /> 
			    </div>
		    </center>
		      
			    
			 
			   <center> 
				    <div id='div-gpt-ad-584431792727835734-1'>
						<script type='text/javascript'>
							googletag.cmd.push(function() { googletag.display('div-gpt-ad-584431792727835734-1'); });
						</script>
					</div>
			    </center>
-->			    
		    
		</div>
		
		<div class="row" style="margin-top:40px;">
			<center>
				<h2>#TITLETOWNTX</h2>
		        <div style="border:2px solid #222; max-width: 580px; padding-top:10px; padding-bottom:20px ; border-radius:10px;">
		        
		                    <a class="twitter-timeline"  href="https://twitter.com/search?q=%23titletowntx%20-rt" data-chrome="nofooter noheader noborders transparent"
data-widget-id="762647487370829824"></a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 		    </center>
		 </div>
		 
		<div class="row" style="margin-top:40px; margin-bottom:30px;">
			<center>
				<h2>ABOUT THE SERIES</h2>
				<h3>
					Titletown, TX is the story of the 2016 Aledo Bearcats and their quest for a sixth state title in eight years.  Weekly documentary episodes, publishing on Wednesdays, produced by Star-Telegram video journalists <a target="_blank" href="https://twitter.com/JaredLChris">Jared Christopher</a> and <a target="_blank" href="https://twitter.com/photojeskos">Jessica Koscielniak</a>, will showcase the glory, the pressure and the passion of big-time high school football in Texas. 
					<a href="http://www.star-telegram.com/customer-service/newsletter-signup/">Sign up</a> for our email newsletter to get alerts when a new episode is posted. 
					<BR><BR>
					Welcome to Titletown, TX.
					
		    	</h3>
		    </center>
		 </div>
		 
	</div>         
	<script type="text/JavaScript" src="js/tttx.js"></script>
	
<div id="mistatstag" style="display:none;">
<!-- SiteCatalyst: McClatchy Static Stats Tag v.1.0 -->
<script type="text/javascript" src="http://media.star-telegram.com/misites/dfw/star-telegram.js"></script>
<script type="text/javascript" src="http://media.star-telegram.com/mistats/products/titletowntx_s_code.js"></script>
<script type="text/javascript">
mistats.pagename = "Static: Titletown Tx";
mistats.pagelevel = "Static";
mistats.channel = "Static: Sports";
mistats.contentsource = mistats.sitename + ": Static: Star-Telegram";
mistats.taxonomy = "Sports|Football|High School||";
</script>
<script type="text/javascript" src="http://media.star-telegram.com/mistats/products/titletowntx.js"></script>
<script type="text/javascript" src="http://media.star-telegram.com/mistats/finalizestats.js"></script>
<!-- End SiteCatalyst: McClatchy Static Stats Tag v.1.0 -->
</div>
</body>
</html>