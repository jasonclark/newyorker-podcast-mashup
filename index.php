<?php
//assign value for title of page
$pageTitle = 'Spotlight on Fiction';
$subTitle = 'MSU Libraries';
//declare filename for additional stylesheet variable - default is "none"
$customCSS = 'audio.css';
//create an array with filepaths for multiple page scripts - default is meta/scripts/global.js
$customScript[0] = './meta/scripts/global.js';
//get and set url protocol
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
//set and sanitize global variables for URL construction
$server = htmlentities(strip_tags($_SERVER['SERVER_NAME']));
$path = htmlentities(strip_tags(dirname($_SERVER['PHP_SELF'])));
$fileName = htmlentities(strip_tags(basename($_SERVER['SCRIPT_NAME'])));
$fileNameURI = htmlentities(strip_tags($_SERVER['REQUEST_URI']));
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title><?php echo($pageTitle); ?> : Montana State University Libraries</title>
<meta name="description" content="Remix of a New Yorker podcast feed with a local .mp3 player."/>
<!-- Social Media Tags -->
<meta property="og:title" content="New Yorker Podcast Remix, Spotlight on Fiction"/>
<meta property="og:description" content="Remix of a New Yorker podcast feed with a local .mp3 player."/>
<meta property="og:image" content="<?php echo $protocol.$server.$path; ?>/meta/img/clark-share-default.png"/>
<meta property="og:url" content="<?php echo $protocol.$server.$path.'/'.$fileName; ?>"/>
<meta property="og:type" content="website"/>
<meta name="twitter:creator" property="og:site_name" content="@jaclark"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="http://www.jasonclark.info"/>
<!-- End Social Media Tags -->
<link rel="alternate" type="application/rss+xml" title="MSU Libraries: Tools" href="http://feeds.feedburner.com/msulibrarySpotlightTools"/>
<?php
if ($customCSS != 'none') {
?>
<link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/meta/styles/<?php echo $customCSS; ?>"/>
<?php
}
if ($customScript) {
	$counted = count($customScript);
	for ($i = 0; $i < $counted; $i++) {
?>
<script type="text/javascript" src="<?php echo $customScript[$i]; ?>"></script>
<?php
	}
}
?>
</head>
<body class="<?php if(!isset($_GET['view'])) { echo 'default'; } else { echo $_GET['view']; } ?>">
<h1><?php echo $pageTitle; ?><span>: <?php echo $subTitle; ?></span><small>(Podcasts from The New Yorker)</small></h1>
<div class="container">
	<ul id="tabs">
		<li id="tab1"><a href="./index.php">Now Playing</a></li>
		<li id="tab2"><a href="./what.php">What is this?</a></li>
		<li id="tab3"><a href="./code.txt">View Code</a></li>
	</ul><!-- end tabs unordered list -->
	<div class="main">
<?php
	//set default value for podcast feed
	//new yorker poetry podcast feed
	//$feed = isset($_GET['feed']) ? $_GET['feed'] : 'http://feeds.wnyc.org/tnypoetry?format=xml';
	//new yorker fiction podcast feed
	$feed = isset($_GET['feed']) ? $_GET['feed'] : 'http://feeds.wnyc.org/tnyfiction?format=xml';
	//set limit for number of items to display
	$limit = (empty($_GET['limit'])) ? '15' : (int)$_GET['limit'];
	    
	//request xml feed from external source 
	$xml = simplexml_load_file($feed);
	
	$feedTitle = $xml->channel->title;
	$feedDescription = html_entity_decode(substr($xml->channel->description,0,86)).'...';
?>
	<h2><?php echo $feedTitle; ?><a class="feed" title="subscribe to <?php echo $feedTitle; ?>" href="<?php echo $feed; ?>">Subscribe to the Feed</a></h2>
	<p><?php echo $feedDescription; ?></p>
	<dl>
<?php
	if (!empty($xml->channel->item)) {
		foreach ($xml->channel as $feed) {
		//loop through items for display; number of items determined by $limit variable above
			for ($i=0; $i<$limit; $i++) {
				//get media file
				$attrs = $feed->item[$i]->enclosure->attributes();
				$mediaFile = $attrs['url'];
				//get blog post link
				$postLink = $feed->item[$i]->link;
?>
		<dt class="postTitle"><a href="<?php echo $postLink; ?>"><?php echo html_entity_decode($feed->item[$i]->title); ?></a><span class="date"><?php echo substr($feed->item[$i]->pubDate,0,50); ?></span></dt>
		<dd><?php echo html_entity_decode($feed->item[$i]->description); ?></dd>
<?php			
		$itunes = $feed->item[$i]->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
?>
		<dd>Keywords: <?php echo $itunes->keywords; ?></dd>
		<dd>Duration: <?php echo $itunes->duration; ?> <a class="download" href="<?php echo $mediaFile; ?>">Download file</a></dd>
		<dd class="postControls">
			<object class="play" type="application/x-shockwave-flash" data="./meta/scripts/player.swf" width="300" height="30">
			<param name="movie" value="./meta/scripts/player.swf" />
			<param name="FlashVars" value="playerID=1&amp;soundFile=<?php echo $mediaFile; ?>" />
			<param name="quality" value="high" />
			<param name="menu" value="false" />
			<param name="wmode" value="transparent" />
			</object>
		</dd>
<?php
			}
		}
	} else {
?>
		<dt>There are no items available at this time. Check back with us later.</dt>
<?php
	}
?>
	</dl>
	</div><!-- end div main -->
</div><!-- end container div -->
</body>
</html>
