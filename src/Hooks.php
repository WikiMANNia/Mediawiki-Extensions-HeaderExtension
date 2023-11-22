<?php
/**
 * Hooks for HeaderExtension extension
 *
 * @file
 * @ingroup Extensions
 */

namespace MediaWiki\Extension\HeaderExtension;

use OutputPage;
use Skin;

/**
 * @phpcs:disable MediaWiki.NamingConventions.LowerCamelFunctionsName.FunctionName
 */
class Hooks implements BeforePageDisplayHook {

	/**
	 * Code for adding the head script to the wiki
	 *
	 * @param OutputPage $out
	 * @param Skin $skin
	 * @return void This hook must not abort, it must return no value
	 */
	public function onBeforePageDisplay( $out, $skin ) : void {
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
	}
}
