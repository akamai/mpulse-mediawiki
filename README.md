# Akamai mPulse

The Akamai mPulse extension for [MediaWiki](http://www.mediawiki.org) integrates
mPulse Real User Monitoring into your MediaWiki site.

# Installation

Create a new directory `extensions/mPulse/`, and copy all of these files into it.

Add the following line to the end of LocalSettings.php:

    // Akamai mPulse API key (e.g. A1A1A-B2B2B-C3C3C-D4D4Dl-E5E5E)
    require_once( "$IP/extensions/mPulse/mPulse.php" );
    $wgmPulseApiKey = '';

# Version History

Version 1.1.0

* Changed branding to Akamai
* Updated to Loader Snippet Version 12

Version 1.0.1

* Fixed script warning

Version 1.0

* Initial release
