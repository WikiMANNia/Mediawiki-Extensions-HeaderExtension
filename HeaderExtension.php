<?php

$wgExtensionCredits['other'][] = array(
        'path' => __FILE__,
        'name' => "HeaderExtension",
        'description' => "Allows Scripts to be added just before the </head> tag to the wiki as configured in the LocalSettings.php file.",
//      'descriptionmsg' => "",
        'version' => 1.3.0,
        'author' => "JinRyuu",
        'url' => "http://www.mediawiki.org/wiki/Extension:HeaderExtension",
);


//Explicitly defining global variables

$wgHeadScriptCode = '<!-- No Head Script -->';
$wgHeadScriptName = '<!-- No Script Name -->';

//Code for adding the head script to the wiki

$wgHooks['BeforePageDisplay'][] = 'HeaderExtension';
function HeaderExtension( OutputPage &$out, Skin &$skin ) {
	global $wgHeadScriptCode, $wgHeadScriptName;

	if ( !empty( $wgHeadScriptCode ) && !empty( $wgHeadScriptName ) ) {
		if ( ( $wgHeadScriptCode !== '<!-- No Head Script -->' ) && ( $wgHeadScriptName !== '<!-- No Script Name -->' ) ) {
			$out->addHeadItem( $wgHeadScriptName, $wgHeadScriptCode );
		}
	}

	return TRUE;
}
