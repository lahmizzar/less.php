<?php
$test  = 'Empty Compiler...';
$error = 'No Errors...';
$css   = '';

	// Require Lessc
	require "phpless/Less.php";

	// Set options
//	$options = array( 'compress' => true );
	$options = null;

	// Initiate parser with given options
	$parser = new Less_Parser( $options );

	// Set cacheDir
	$parser->SetCacheDir( getcwd() . '/cache' );

	try {
		$parser->parseFile( 'font-awesome.less' );
		$parser->parseFile( 'bootstrap.less' );
		$parser->parseFile( 'bootstrap-theme.less' );
		$parser->parseFile( 'mixins/index.less' );
	} catch (exception $e) {
		$error = $e->getMessage();
	}

	$test = $parser->getFilePresets();

//	$css = $parser->getCss();
//	$test = $parser->allParsedFiles();


//	file_put_contents('master.css', $css);



echo '<pre>';
echo '<h1>Test</h1>';
print_r( $test );
echo '<hr>';
echo '<h1>Compiled CSS</h1>';
print_r( $css );
echo '<hr>';
echo '<h1>Errors</h1>';
print_r( $error );
echo '</pre>';
?>