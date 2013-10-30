<?php

$wgSiteNoticeThing = array(
	'title' => 'OMG NEW NOTICE',
	'text' => 'Help the FDC do shit...',
);

$wgAutoloadClasses['BNSFormatter'] = __DIR__ . '/BNSFormatter.php';
$wgExtensionMessagesFiles['BNS'] = __DIR__ . '/BNS.i18n.php';

function makeEvent() {
	global $wgSiteNoticeThing;
	$mp = Title::newMainPage();
	$row = array(
		'event_type' => 'sitenotice',
		'event_id' => 999999999,
		'event_variant' => null,
		'event_agent_id' => null,
		'event_agent_ip' => null,
		'event_page_id' => null,
		'event_page_namespace' => null,
		'event_page_title' => null,
		'event_extra' => serialize( $wgSiteNoticeThing ),
		'notification_bundle_base' => null,
		'notification_timestamp' => wfTimestampNow(),
		'notification_read_timestamp' => null,
	);
	return (object)$row;
}

$wgHooks['BeforeCreateEchoEvent'][] = 'onBeforeCreateEchoEvent';

function onBeforeCreateEchoEvent( &$notifications, &$notificationCategories, &$icons ) {
	$notifications['sitenotice'] = array(
		'category' => 'system',
		'group' => 'positive',
		'formatter-class' => 'BNSFormatter',
		'title-message' => 'notification-sitenotice',
		'title-params' => array( 'title' ),
		'icon' => 'site',
		'flyout-message' => 'notification-sitenotice',
		'flyout-params' => array( 'text' ),
		'payload' => array( 'text' ),
	);
	return true;
}
