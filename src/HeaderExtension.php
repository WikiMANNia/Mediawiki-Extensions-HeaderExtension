<?php

class HeaderExtension {

	/**
	 * Code for adding the head script to the wiki
	 *
	 * @param OutputPage &$out
	 * @param Skin &$skin
	 */
	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
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
