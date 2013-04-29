<?php
//assign value for title of page
$pageTitle = 'Spotlight on Fiction';
$subTitle = 'MSU Libraries';
//declare filename for additional stylesheet variable - default is "none"
$customCSS = 'audio.css';
//create an array with filepaths for multiple page scripts - default is meta/scripts/global.js
$customScript[0] = './meta/scripts/global.js';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo($pageTitle); ?> : Montana State University Libraries</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/rss+xml" title="MSU Libraries: Tools" href="http://feeds.feedburner.com/msulibrarySpotlightTools" />
<style type="text/css" media="screen, projection, handheld">
<!-- @import url("./meta/styles/default.css"); -->
<!--
<?php if ($customCSS != 'none') {
	echo '@import url("'.dirname($_SERVER['PHP_SELF']).'/meta/styles/'.$customCSS.'");'."\n";
}
?>
-->
</style>
<?php
if ($customScript) {
  $counted = count($customScript);
  for ($i = 0; $i < $counted; $i++) {
   echo '<script type="text/javascript" src="'.$customScript[$i].'"></script>'."\n";
  }
}
?>
</head>
<body class="<?php if(!isset($_GET['view'])) { echo 'what'; } else { echo $_GET['view']; } ?>">
<h1><?php echo $pageTitle; ?><span>: <?php echo $subTitle; ?></span><small>(Podcasts from The New Yorker)</small></h1>
<div class="container">
    <ul id="tabs">
        <li id="tab1"><a href="./index.php">Now Playing</a></li>
        <li id="tab2"><a href="./what.php">What is this?</a></li>
        <li id="tab3"><a href="./code.txt">View Code</a></li>
    </ul><!-- end tabs unordered list -->
	<div class="main">
		<h2>A mashup or remix of a New Yorker podcast feed with a local flash .mp3 player</h2>
		<p>Originally promoted during summer 2008: "Take the sounds of fiction with you as summer starts and reading season begins. The New Yorker has brought together contemporary writers such as Louise Erdrich, T. Coraghessan Boyle, E. L. Doctorow, Paul Theroux, and many more to read and discuss famous fiction from The New Yorker archives. Each episode is recorded as a podcast and ready for your .mp3 player… Or just listen to the podcast from your web browser over lunch.
	Either way, it’s summer time and the reading is easy."</p>
	</div><!-- end div main -->
</div><!-- end container div -->
</body>
</html>
