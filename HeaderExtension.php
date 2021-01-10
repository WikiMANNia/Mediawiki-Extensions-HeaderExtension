<?php

$wgExtensionCredits['other'][] = array(
        'path' => __FILE__,
        'name' => "HeaderExtension",
        'description' => "Allows Scripts and Meta data to be added just before the </head> tag to the wiki as configured in the LocalSettings.php file.",
//      'descriptionmsg' => "",
        'version' => 2.0.0,
        'author' => "JinRyuu",
        'url' => "http://www.mediawiki.org/wiki/Extension:HeaderExtension",
);


//Explicitly defining global variables

$wgHeadMetaCode = '<!-- No Head Meta -->';
$wgHeadMetaName = '<!-- No Meta Name -->';
$wgHeadScriptCode = '<!-- No Head Script -->';
$wgHeadScriptName = '<!-- No Script Name -->';

//Code for adding the head script and meta data to the wiki

$wgHooks['BeforePageDisplay'][] = 'HeaderExtension';
function HeaderExtension( OutputPage &$out, Skin &$skin ) {
	global $wgHeadMetaCode, $wgHeadMetaName;

	if ( !empty( $wgHeadMetaCode ) && !empty( $wgHeadMetaName ) ) {
		if ( ( $wgHeadMetaCode !== '<!-- No Head Meta -->' ) && ( $wgHeadMetaName !== '<!-- No Meta Name -->' ) ) {
			$out->addMeta( $wgHeadMetaName, $wgHeadMetaCode );
		}
	}

	global $wgHeadScriptCode, $wgHeadScriptName;

	if ( !empty( $wgHeadScriptCode ) && !empty( $wgHeadScriptName ) ) {
		if ( ( $wgHeadScriptCode !== '<!-- No Head Script -->' ) && ( $wgHeadScriptName !== '<!-- No Script Name -->' ) ) {
			$out->addHeadItem( $wgHeadScriptName, $wgHeadScriptCode );
		}
	}

	return TRUE;
}
