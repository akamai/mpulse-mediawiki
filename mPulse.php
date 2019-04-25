<?php
#
# Akamai mPulse MediaWiki extension
#
# Copyright (C) 2019 Akamai
# https://www.akamai.com/us/en/products/performance/mpulse-real-user-monitoring.jsp
#

if (!defined('MEDIAWIKI')) {
    exit( 1 );
}

$wgMessagesDirs['mPulse'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['mPulse'] = __DIR__ . '/mPulse.i18n.php';

// Extension credits that show up on Special:Version
$wgExtensionCredits['mPulse'][] = array(
    'path' => __FILE__,
    'name' => 'Akamai mPulse',
    'author' => 'Akamai',
    'url' => 'https://github.com/akamai/mpulse-mediawiki',
    'descriptionmsg' => 'mpulse-desc',
    'version' => '1.1.0'
);

/*** Default configuration ***/

// Akamai mPulse API key (e.g. A1A1A-B2B2B-C3C3C-D4D4Dl-E5E5E)
$wgmPulseApiKey = '';

$wgAutoloadClasses['mPulse'] = __DIR__ . '/mPulse.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'mPulse::onBeforePageDisplay';

?>
