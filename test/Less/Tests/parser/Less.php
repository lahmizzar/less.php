<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$error = 'No Errors...';
$test = 'Empty Compiler...';

		// file_put_contents, file_exists, 

		// Require Lessc
		require "phpless/Less.php";

		// Set options
//		$options = array( 'compress' => true );
		$options = null;

		// Initiate parser with given options
		$parser = new Less_Parser( $options );

		// Set cacheDir
		$parser->SetCacheDir('/var/www/vhosts/cdn.wgmd.net/httpdocs/dev/less/cache');

		try {
			$parser->parseFile( 'font-awesome.less' );
			$parser->parseFile( 'bootstrap.less' );
			$parser->parseFile( 'bootstrap-theme.less' );
			$parser->parseFile( 'mixins/index.less' );
		} catch (exception $e) {
			$error = $e->getMessage();
		}

		$test = $parser->getFilePresets();

//		$css = $parser->getCss();
//		$test = $parser->allParsedFiles();


// file_put_contents('master.css', $css);



echo '<pre>';
print_r( $test );
echo '<hr>';
print_r( $css );
echo '<hr>';
print_r( $error );
echo '</pre>';

?>