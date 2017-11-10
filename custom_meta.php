<?php

//CHANGE LINE 4 TO MATCH ENVIRONMENT
$root_url = 'http://titletowntx.com';	
	
//Grab relevant meta from playlist json
function getMetaById($arr, $id){
	global $root_url,$title, $description, $image, $canonical_url;
	foreach($arr as $item){
	    $i=0;
	    if ($item[mediaid] ==  $id){
	        $title = $item[title];
	        $description = $item[description];
	        $image = 'http:'.$item[image];
	        $mediaid = $id;
	        $canonical_url = $root_url . '?play=' . $id;
	        $i++;
	    }else{
		   //Malformed URL, Use top of playlist instead
		   $meta_for = $json['playlist'][0]['mediaid'];
	    }   
	}
}

//Get playlist array
$url = 'http://content.jwplatform.com/feeds/Fsks2jeZ.json';
$data = file_get_contents($url);
$json = json_decode($data, true);

//Get MEDIA ID from URL
if($_GET['play']){
	$meta_for = $_GET['play'];
}else{
	$meta_for = $json['playlist'][0]['mediaid'];
}

getMetaByID($json['playlist'],$meta_for);

//PRINT METADATA
echo'
<title>Titletown, Tx | The Star-Telegram</title>
<meta name="title" content="' . $title .' | The Star-Telegram"/>
<meta name="description" content="' . $description .'" />
<meta name="keywords" content="Texas, high school football, Aledo, state champs, state champions, Friday Night Lights, Texas high school football, Fort Worth, Ft Worth,aledo Bearcats, Bearcats, 5A, Class 5A, District 6-5A, Titletown TX, titletowntx"/>
<meta name="googlebot" content="noodp, noarchive"/>
<meta name="original-source" content="'. $canonical_url .'"/>
<meta name="google-site-verification" content="..." />
<link rel="canonical" href="'. $canonical_url .'"/>
<meta property="og:title" content="' . $title .' "/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="' . $canonical_url .' "/>
<meta property="og:description" content="'. $description .'"/>
<meta property="og:image" content="'. $image .'"/>
<meta property="og:image:width" content="720"/>
<meta property="og:image:height" content="406"/>
<meta property="og:site_name" content="star-telegram"/>
<meta property="fb:app_id" content="155812681283151"/>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="startelegram">
<meta name="twitter:title" content="'. $title .'">
<meta name="twitter:description" content="'.$description.'">
<meta name="twitter:image" content="'.$image.'">
<meta name="msapplication-TileImage" content="http://www.star-telegram.com/static/theme/star-telegram/base/ico/windowsmetro-144.png"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.star-telegram.com/static/theme/star-telegram/base/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://www.star-telegram.com/static/theme/star-telegram/base/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://www.star-telegram.com/static/theme/star-telegram/base/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="http://www.star-telegram.com/static/theme/star-telegram/base/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="http://www.star-telegram.com/static/theme/star-telegram/base/ico/favicon.png">'	
	?>