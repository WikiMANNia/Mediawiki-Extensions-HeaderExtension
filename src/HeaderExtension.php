<?php

class HeaderExtension {

	// Code for adding the head script and meta data to the wiki
    public static function BeforePageDisplay( OutputPage &$out, Skin &$skin ) {
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

        return true;
    }
}
