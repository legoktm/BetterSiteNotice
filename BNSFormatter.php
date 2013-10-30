<?php

class BNSFormatter extends EchoBasicFormatter {

	protected function formatNotificationTitle( $event, $user ) {
		global $wgSiteNoticeThing;
		return wfMessage( 'notification-sitenotice' )->params( $wgSiteNoticeThing['title'] );
	}

	protected function formatPayload( $payload, $event, $user ) {
		global $wgSiteNoticeThing;
		return $wgSiteNoticeThing['text'];
	}
}