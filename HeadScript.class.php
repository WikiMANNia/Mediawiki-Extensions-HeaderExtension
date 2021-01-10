<?php

class HeadScript {
    
    //Code for adding the head script to the wiki
    public static function BeforePageDisplay( OutputPage &$out, Skin &$skin ) {
        global $wgHeadScriptCode, $wgHeadScriptName;

		if ( !empty( $wgHeadScriptCode ) && !empty( $wgHeadScriptName ) ) {
			if ( ( $wgHeadScriptCode !== '<!-- No Head Script -->' ) && ( $wgHeadScriptName !== '<!-- No Script Name -->' ) ) {
				$out->addHeadItem( $wgHeadScriptName, $wgHeadScriptCode );
			}
		}

        return true;
    }
}
