<?php
  header('Content-type: application/xml');

echo'<?xml version="1.0" encoding="UTF-8"?>';  

//Get playlist array
$url = 'http://content.jwplatform.com/feeds/Fsks2jeZ.json';
$data = file_get_contents($url);
$json = json_decode($data, true);
$videos = $json['playlist'];
$root_url = 'http://media.star-telegram.com/static/labs/TitleTownTx/index.php';	


  
echo'
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
  <url> 
		<loc>http://titletowntx.com/</loc>
		<changefreq>weekly</changefreq>
		<priority>
		    1.0
		</priority>
  </url>
 ';
 	foreach($videos as $video){

			$v_content = 'http:' . $video[sources][3][file];
			$v_duration = $video[sources][3][duration];
			$id = $video[mediaid];
	        $title = $video[title];
	        $description = $video[description];
	        $v_thumbnail = 'http:'.$video[image];
	        $canonical_url = $root_url . '?play=' . $id;
	        
	        echo'
	          <url> 
		<loc>
		  http://titletowntx.com/index.php?play='.$id.'
		</loc>   
		<video:video>
			<video:content_loc>
			'.$v_content.'
			</video:content_loc>
			<video:thumbnail_loc>
			'.$v_thumbnail.'
			</video:thumbnail_loc>
			<video:title>'.$title.'</video:title>  
			<video:description>
			'.$description.'
			</video:description>
			<video:duration>'.$v_duration.'</video:duration>
			<video:rating>5</video:rating>
			<video:family_friendly>yes</video:family_friendly>
			<video:gallery_loc title="Title Town Tx">
			http://titletowntx.com
			</video:gallery_loc>    
			<video:live>no</video:live>    
		</video:video>
  </url>'; }
echo '
</urlset>'; ?>