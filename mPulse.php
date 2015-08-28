<?php
#
# SOASTA mPulse MediaWiki extension
#
# Copyright (C) 2015 SOASTA
# http://www.soasta.com/mpulse/
#

if (!defined('MEDIAWIKI')) {
    exit( 1 );
}

$wgMessagesDirs['mPulse'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['mPulse'] = __DIR__ . '/mPulse.i18n.php';

// Extension credits that show up on Special:Version
$wgExtensionCredits['mPulse'][] = array(
    'path' => __FILE__,
    'name' => 'SOASTA mPulse',
    'author' => 'SOASTA',
    'url' => 'http://www.soasta.com/mpulse/',
    'descriptionmsg' => 'mpulse-desc',
    'version' => '1.0.1'
);

/*** Default configuration ***/

// SOASTA mPulse API key (e.g. A1A1A-B2B2B-C3C3C-D4D4Dl-E5E5E)
$wgmPulseApiKey = '';

$wgAutoloadClasses['mPulse'] = __DIR__ . '/mPulse.hooks.php';
$wgHooks['BeforePageDisplay'][] = 'mPulse::onBeforePageDisplay';

?>
