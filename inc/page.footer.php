<footer>
this is the footer
</footer>
<?
$scripts=array(
	'/js/jquery-1.7.1.js',
	'/js/underscore.js',
	'/js/backbone.js',
	'/js/model.Screen.js',
	'/js/model.Song.js',
	'/js/poggin.js',
);
if (true || getenv('DEV')) { // TODO: remove 'true' when else is 
	foreach ($scripts as $path) printf('<script src="%s"></script>', $path);
} else {
	// TODO:
	// maybe section out jquery to use CDN?
	// combine? minify?
}
?>
</body>
</html>