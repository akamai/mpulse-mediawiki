<?php

class mPulse {
   /**
    * onBeforePageDisplay hook
    * @param OutputPage $out Output
    * @param Skin $skin Skin
    * @return boolean True on success
    */
   public static function onBeforePageDisplay(OutputPage &$out, Skin &$skin) {
       global $wgmPulseApiKey;

       if ($wgmPulseApiKey !== '') {
           $script .= <<<EOD
(function(){
  if (window.BOOMR && window.BOOMR.version) { return; }
  var dom,doc,where,iframe = document.createElement("iframe"),win = window;

  function boomerangSaveLoadTime(e) {
    win.BOOMR_onload=(e && e.timeStamp) || new Date().getTime();
  }
  if (win.addEventListener) {
    win.addEventListener("load", boomerangSaveLoadTime, false);
  } else if (win.attachEvent) {
    win.attachEvent("onload", boomerangSaveLoadTime);
  }

  iframe.src = "javascript:void(0)";
  iframe.title = ""; iframe.role = "presentation";
  (iframe.frameElement || iframe).style.cssText = "width:0;height:0;border:0;display:none;";
  where = document.getElementsByTagName("script")[0];
  where.parentNode.insertBefore(iframe, where);

  try {
    doc = iframe.contentWindow.document;
  } catch(e) {
    dom = document.domain;
    iframe.src="javascript:var d=document.open();d.domain='"+dom+"';void(0);";
    doc = iframe.contentWindow.document;
  }
  doc.open()._l = function() {
    var js = this.createElement("script");
    if (dom) { this.domain = dom; }
    js.id = "boomr-if-as";
    js.src = '//c.go-mpulse.net/boomerang/{{API_KEY}}';
    BOOMR_lstart=new Date().getTime();
    this.body.appendChild(js);
  };
  doc.write('<body onload="document._l();"' + String.fromCharCode(62));
  doc.close();
})();
EOD;

            $script = str_replace('{{API_KEY}}', $wgmPulseApiKey, $script);
            $out->AddInlineScript($script);
       }

       return true;
   }
}