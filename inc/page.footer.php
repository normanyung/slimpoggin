<footer>
this is the footer
</footer>
<?
$scripts=array(
	'/js/jquery-1.7.1.js',
	'/js/underscore.js',
	'/js/backbone.js',
	'/js/poggin.js',
);
if (getenv('DEV')) {
	foreach ($scripts as $path) printf('<script src="%s"></script>', $path);
} else {
	// TODO:
	// maybe section out jquery to use CDN?
	// combine? minify?
}
?>
</body>
</html>