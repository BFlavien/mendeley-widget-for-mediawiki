<?php

	// Protect against register_globals vulnerabilities.
	// This line must be present before any global variable is referenced.
	if( !defined('MEDIAWIKI') ){
		echo("This is an extension to the MediaWiki package and cannot be run standalone.\n");
		die(-1);
	}

	// Extension credits that will show up on Special:Version    
	$wgExtensionCredits['parserhook'][] = array(
		'path'           => __FILE__,
		'name'           => 'MendeleyWidget',
		'version'        => '0.1',
		'author'         => 'Flavien Bossiaux', 
		'url'            => 'https://github.com/BFlavien/mendeley-widget-for-mediawiki',
		'descriptionmsg' => 'mendeleywidget-descriptionmsg',
		'description'    => 'mendeleywidget-description'
	);

	// Load the main class of the extension and his i18n
	$wgAutoloadClasses['MendeleyWidget']        = dirname( __FILE__ ) . "/MendeleyWidget.body.php";
	$wgExtensionMessagesFiles['MendeleyWidget'] = dirname( __FILE__ ) . '/MendeleyWidget.i18n.php';

	$wgResourceModules['MendeleyWidget'] = array(	
		'localBasePath' => dirname( __FILE__ ),
		'remoteExtPath' => 'MendeleyWidget'
	);

	$wgHooks['ParserFirstCallInit'][] = 'wfMendeleyWidget';

	// Hook our callback function into the parser
	function wfMendeleyWidget( Parser $parser ) {
		$MendeleyWidget = new MendeleyWidget;
		
		// When the parser sees the <sample> tag, it executes 
		// the 'createWidget' function of '$MendeleyWidget' previously created
		$parser->setHook( 'mendeleywidget', array($MendeleyWidget, 'createWidget') );
		
		// Always return true from this function. The return value does not denote
		// success or otherwise have meaning - it just must always be true.
		return true;
	}
?>