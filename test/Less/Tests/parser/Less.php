<?php
error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);

$test  = '';
$test1  = '';
$test2  = '';
$error = 'No Errors...';
$css   = 'Empty Compiler...';
$report = '';

	// Require appgati and initialize it
	require_once "bench/appgati.class.php";
	$app = new AppGati();

	// Require phpless
	require_once "phpless/Less.php";

	// Set options
//	$options = array( 'compress' => true );
	$options = null;

	// Initiate parser with given options
	$parser = new Less_Parser( $options );

	// Set cacheDir
	$parser->SetCacheDir( getcwd() . '/cache' );

								// BM Step
								$app->Step('1');

	try {
//		$parser->parseFile( 'font-awesome.less' );
		$parser->parseFile( 'bootstrap.less' );
//		$parser->parseFile( 'bootstrap-theme.less' );
//		$parser->parseFile( 'mixins/index.less' );
	} catch (exception $e) {
		$error = $e->getMessage();
	}

								// BM Step
								$app->Step('2');

	$test1 = $parser->getFilePresets();

								// BM Step
								$app->Step('3');

	$css = $parser->getCss();

								// BM Step
								$app->Step('4');

	$test2 = $parser->allParsedFiles();

								// BM Step
								$app->Step('5');

//	file_put_contents('master.css', $css);

								// BM Step
								$app->Step('8');


echo '<pre>';
// Test Section
echo '<h1>Test</h1>';
print_r( $test );
echo '<br>==> getFilePresets()';
print_r( $test1 );
echo '<br>==> allParsedFiles()';
print_r( $test2 );


// Error Section
echo '<hr>';
echo '<h1>Errors</h1>';
print_r( $error );


// BM Section
// Generate the report
$report = $app->Report('1', '8');
$report1 = $app->Report('2','3');
$report2 = $app->Report('3','5');

echo '<hr>';
echo '<h1>Benchmark</h1>';
echo '<br>BM Total';
print_r( $report );
echo '<br><br>BM to get files with getFilesPresets()';
print_r( $report1 );
echo '<br><br>BM to get files with using compiler first';
print_r( $report2 );


// CSS Section
echo '<hr>';
echo '<h1>Compiled CSS</h1>';
print_r( $css );
echo '</pre>';
?>