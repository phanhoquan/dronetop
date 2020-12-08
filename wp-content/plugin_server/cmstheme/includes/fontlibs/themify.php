<?php
/* Loads themify Font. */
add_filter( 'vc_iconpicker-type-themify', 'vc_iconpicker_type_themify' );

/**
 * Et Line icons
 *
 * @param $icons - taken from filter - vc_map param field settings['source'] provided icons (default empty array).
 * If array categorized it will auto-enable category dropdown
 *
 * @since 4.4
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
function vc_iconpicker_type_themify( $icons ) {

	$list_icons = array(
		array("ti-wand" => __("ti-wand","cmstheme")),
        array("ti-volume" => __("ti-volume","cmstheme")),
        array("ti-user" => __("ti-user","cmstheme")),
        array("ti-unlock" => __("ti-unlock","cmstheme")),
        array("ti-unlink" => __("ti-unlink","cmstheme")),
        array("ti-trash" => __("ti-trash","cmstheme")),
        array("ti-thought" => __("ti-thought","cmstheme")),
        array("ti-target" => __("ti-target","cmstheme")),
        array("ti-tag" => __("ti-tag","cmstheme")),
        array("ti-tablet" => __("ti-tablet","cmstheme")),
        array("ti-star" => __("ti-star","cmstheme")),
        array("ti-spray" => __("ti-spray","cmstheme")),
        array("ti-signal" => __("ti-signal","cmstheme")),
        array("ti-shopping-cart" => __("ti-shopping-cart","cmstheme")),
        array("ti-shopping-cart-full" => __("ti-shopping-cart-full","cmstheme")),
        array("ti-settings" => __("ti-settings","cmstheme")),
        array("ti-search" => __("ti-search","cmstheme")),
        array("ti-zoom-in" => __("ti-zoom-in","cmstheme")),
        array("ti-zoom-out" => __("ti-zoom-out","cmstheme")),
        array("ti-cut" => __("ti-cut","cmstheme")),
        array("ti-ruler" => __("ti-ruler","cmstheme")),
        array("ti-ruler-pencil" => __("ti-ruler-pencil","cmstheme")),
        array("ti-ruler-alt" => __("ti-ruler-alt","cmstheme")),
        array("ti-bookmark" => __("ti-bookmark","cmstheme")),
        array("ti-bookmark-alt" => __("ti-bookmark-alt","cmstheme")),
        array("ti-reload" => __("ti-reload","cmstheme")),
        array("ti-plus" => __("ti-plus","cmstheme")),
        array("ti-pin" => __("ti-pin","cmstheme")),
        array("ti-pencil" => __("ti-pencil","cmstheme")),
        array("ti-pencil-alt" => __("ti-pencil-alt","cmstheme")),
        array("ti-paint-roller" => __("ti-paint-roller","cmstheme")),
        array("ti-paint-bucket" => __("ti-paint-bucket","cmstheme")),
        array("ti-na" => __("ti-na","cmstheme")),
        array("ti-mobile" => __("ti-mobile","cmstheme")),
        array("ti-minus" => __("ti-minus","cmstheme")),
        array("ti-medall" => __("ti-medall","cmstheme")),
        array("ti-medall-alt" => __("ti-medall-alt","cmstheme")),
        array("ti-marker" => __("ti-marker","cmstheme")),
        array("ti-marker-alt" => __("ti-marker-alt","cmstheme")),
        array("ti-arrow-up" => __("ti-arrow-up","cmstheme")),
        array("ti-arrow-right" => __("ti-arrow-right","cmstheme")),
        array("ti-arrow-left" => __("ti-arrow-left","cmstheme")),
        array("ti-arrow-down" => __("ti-arrow-down","cmstheme")),
        array("ti-lock" => __("ti-lock","cmstheme")),
        array("ti-location-arrow" => __("ti-location-arrow","cmstheme")),
        array("ti-link" => __("ti-link","cmstheme")),
        array("ti-layout" => __("ti-layout","cmstheme")),
        array("ti-layers" => __("ti-layers","cmstheme")),
        array("ti-layers-alt" => __("ti-layers-alt","cmstheme")),
        array("ti-key" => __("ti-key","cmstheme")),
        array("ti-import" => __("ti-import","cmstheme")),
        array("ti-image" => __("ti-image","cmstheme")),
        array("ti-heart" => __("ti-heart","cmstheme")),
        array("ti-heart-broken" => __("ti-heart-broken","cmstheme")),
        array("ti-hand-stop" => __("ti-hand-stop","cmstheme")),
        array("ti-hand-open" => __("ti-hand-open","cmstheme")),
        array("ti-hand-drag" => __("ti-hand-drag","cmstheme")),
        array("ti-folder" => __("ti-folder","cmstheme")),
        array("ti-flag" => __("ti-flag","cmstheme")),
        array("ti-flag-alt" => __("ti-flag-alt","cmstheme")),
        array("ti-flag-alt-2" => __("ti-flag-alt-2","cmstheme")),
        array("ti-eye" => __("ti-eye","cmstheme")),
        array("ti-export" => __("ti-export","cmstheme")),
        array("ti-exchange-vertical" => __("ti-exchange-vertical","cmstheme")),
        array("ti-desktop" => __("ti-desktop","cmstheme")),
        array("ti-cup" => __("ti-cup","cmstheme")),
        array("ti-crown" => __("ti-crown","cmstheme")),
        array("ti-comments" => __("ti-comments","cmstheme")),
        array("ti-comment" => __("ti-comment","cmstheme")),
        array("ti-comment-alt" => __("ti-comment-alt","cmstheme")),
        array("ti-close" => __("ti-close","cmstheme")),
        array("ti-clip" => __("ti-clip","cmstheme")),
        array("ti-angle-up" => __("ti-angle-up","cmstheme")),
        array("ti-angle-right" => __("ti-angle-right","cmstheme")),
        array("ti-angle-left" => __("ti-angle-left","cmstheme")),
        array("ti-angle-down" => __("ti-angle-down","cmstheme")),
        array("ti-check" => __("ti-check","cmstheme")),
        array("ti-check-box" => __("ti-check-box","cmstheme")),
        array("ti-camera" => __("ti-camera","cmstheme")),
        array("ti-announcement" => __("ti-announcement","cmstheme")),
        array("ti-brush" => __("ti-brush","cmstheme")),
        array("ti-briefcase" => __("ti-briefcase","cmstheme")),
        array("ti-bolt" => __("ti-bolt","cmstheme")),
        array("ti-bolt-alt" => __("ti-bolt-alt","cmstheme")),
        array("ti-blackboard" => __("ti-blackboard","cmstheme")),
        array("ti-bag" => __("ti-bag","cmstheme")),
        array("ti-move" => __("ti-move","cmstheme")),
        array("ti-arrows-vertical" => __("ti-arrows-vertical","cmstheme")),
        array("ti-arrows-horizontal" => __("ti-arrows-horizontal","cmstheme")),
        array("ti-fullscreen" => __("ti-fullscreen","cmstheme")),
        array("ti-arrow-top-right" => __("ti-arrow-top-right","cmstheme")),
        array("ti-arrow-top-left" => __("ti-arrow-top-left","cmstheme")),
        array("ti-arrow-circle-up" => __("ti-arrow-circle-up","cmstheme")),
        array("ti-arrow-circle-right" => __("ti-arrow-circle-right","cmstheme")),
        array("ti-arrow-circle-left" => __("ti-arrow-circle-left","cmstheme")),
        array("ti-arrow-circle-down" => __("ti-arrow-circle-down","cmstheme")),
        array("ti-angle-double-up" => __("ti-angle-double-up","cmstheme")),
        array("ti-angle-double-right" => __("ti-angle-double-right","cmstheme")),
        array("ti-angle-double-left" => __("ti-angle-double-left","cmstheme")),
        array("ti-angle-double-down" => __("ti-angle-double-down","cmstheme")),
        array("ti-zip" => __("ti-zip","cmstheme")),
        array("ti-world" => __("ti-world","cmstheme")),
        array("ti-wheelchair" => __("ti-wheelchair","cmstheme")),
        array("ti-view-list" => __("ti-view-list","cmstheme")),
        array("ti-view-list-alt" => __("ti-view-list-alt","cmstheme")),
        array("ti-view-grid" => __("ti-view-grid","cmstheme")),
        array("ti-uppercase" => __("ti-uppercase","cmstheme")),
        array("ti-upload" => __("ti-upload","cmstheme")),
        array("ti-underline" => __("ti-underline","cmstheme")),
        array("ti-truck" => __("ti-truck","cmstheme")),
        array("ti-timer" => __("ti-timer","cmstheme")),
        array("ti-ticket" => __("ti-ticket","cmstheme")),
        array("ti-thumb-up" => __("ti-thumb-up","cmstheme")),
        array("ti-thumb-down" => __("ti-thumb-down","cmstheme")),
        array("ti-text" => __("ti-text","cmstheme")),
        array("ti-stats-up" => __("ti-stats-up","cmstheme")),
        array("ti-stats-down" => __("ti-stats-down","cmstheme")),
        array("ti-split-v" => __("ti-split-v","cmstheme")),
        array("ti-split-h" => __("ti-split-h","cmstheme")),
        array("ti-smallcap" => __("ti-smallcap","cmstheme")),
        array("ti-shine" => __("ti-shine","cmstheme")),
        array("ti-shift-right" => __("ti-shift-right","cmstheme")),
        array("ti-shift-left" => __("ti-shift-left","cmstheme")),
        array("ti-shield" => __("ti-shield","cmstheme")),
        array("ti-notepad" => __("ti-notepad","cmstheme")),
        array("ti-server" => __("ti-server","cmstheme")),
        array("ti-quote-right" => __("ti-quote-right","cmstheme")),
        array("ti-quote-left" => __("ti-quote-left","cmstheme")),
        array("ti-pulse" => __("ti-pulse","cmstheme")),
        array("ti-printer" => __("ti-printer","cmstheme")),
        array("ti-power-off" => __("ti-power-off","cmstheme")),
        array("ti-plug" => __("ti-plug","cmstheme")),
        array("ti-pie-chart" => __("ti-pie-chart","cmstheme")),
        array("ti-paragraph" => __("ti-paragraph","cmstheme")),
        array("ti-panel" => __("ti-panel","cmstheme")),
        array("ti-package" => __("ti-package","cmstheme")),
        array("ti-music" => __("ti-music","cmstheme")),
        array("ti-music-alt" => __("ti-music-alt","cmstheme")),
        array("ti-mouse" => __("ti-mouse","cmstheme")),
        array("ti-mouse-alt" => __("ti-mouse-alt","cmstheme")),
        array("ti-money" => __("ti-money","cmstheme")),
        array("ti-microphone" => __("ti-microphone","cmstheme")),
        array("ti-menu" => __("ti-menu","cmstheme")),
        array("ti-menu-alt" => __("ti-menu-alt","cmstheme")),
        array("ti-map" => __("ti-map","cmstheme")),
        array("ti-map-alt" => __("ti-map-alt","cmstheme")),
        array("ti-loop" => __("ti-loop","cmstheme")),
        array("ti-location-pin" => __("ti-location-pin","cmstheme")),
        array("ti-list" => __("ti-list","cmstheme")),
        array("ti-light-bulb" => __("ti-light-bulb","cmstheme")),
        array("ti-Italic" => __("ti-Italic","cmstheme")),
        array("ti-info" => __("ti-info","cmstheme")),
        array("ti-infinite" => __("ti-infinite","cmstheme")),
        array("ti-id-badge" => __("ti-id-badge","cmstheme")),
        array("ti-hummer" => __("ti-hummer","cmstheme")),
        array("ti-home" => __("ti-home","cmstheme")),
        array("ti-help" => __("ti-help","cmstheme")),
        array("ti-headphone" => __("ti-headphone","cmstheme")),
        array("ti-harddrives" => __("ti-harddrives","cmstheme")),
        array("ti-harddrive" => __("ti-harddrive","cmstheme")),
        array("ti-gift" => __("ti-gift","cmstheme")),
        array("ti-game" => __("ti-game","cmstheme")),
        array("ti-filter" => __("ti-filter","cmstheme")),
        array("ti-files" => __("ti-files","cmstheme")),
        array("ti-file" => __("ti-file","cmstheme")),
        array("ti-eraser" => __("ti-eraser","cmstheme")),
        array("ti-envelope" => __("ti-envelope","cmstheme")),
        array("ti-download" => __("ti-download","cmstheme")),
        array("ti-direction" => __("ti-direction","cmstheme")),
        array("ti-direction-alt" => __("ti-direction-alt","cmstheme")),
        array("ti-dashboard" => __("ti-dashboard","cmstheme")),
        array("ti-control-stop" => __("ti-control-stop","cmstheme")),
        array("ti-control-shuffle" => __("ti-control-shuffle","cmstheme")),
        array("ti-control-play" => __("ti-control-play","cmstheme")),
        array("ti-control-pause" => __("ti-control-pause","cmstheme")),
        array("ti-control-forward" => __("ti-control-forward","cmstheme")),
        array("ti-control-backward" => __("ti-control-backward","cmstheme")),
        array("ti-cloud" => __("ti-cloud","cmstheme")),
        array("ti-cloud-up" => __("ti-cloud-up","cmstheme")),
        array("ti-cloud-down" => __("ti-cloud-down","cmstheme")),
        array("ti-clipboard" => __("ti-clipboard","cmstheme")),
        array("ti-car" => __("ti-car","cmstheme")),
        array("ti-calendar" => __("ti-calendar","cmstheme")),
        array("ti-book" => __("ti-book","cmstheme")),
        array("ti-bell" => __("ti-bell","cmstheme")),
        array("ti-basketball" => __("ti-basketball","cmstheme")),
        array("ti-bar-chart" => __("ti-bar-chart","cmstheme")),
        array("ti-bar-chart-alt" => __("ti-bar-chart-alt","cmstheme")),
        array("ti-back-right" => __("ti-back-right","cmstheme")),
        array("ti-back-left" => __("ti-back-left","cmstheme")),
        array("ti-arrows-corner" => __("ti-arrows-corner","cmstheme")),
        array("ti-archive" => __("ti-archive","cmstheme")),
        array("ti-anchor" => __("ti-anchor","cmstheme")),
        array("ti-align-right" => __("ti-align-right","cmstheme")),
        array("ti-align-left" => __("ti-align-left","cmstheme")),
        array("ti-align-justify" => __("ti-align-justify","cmstheme")),
        array("ti-align-center" => __("ti-align-center","cmstheme")),
        array("ti-alert" => __("ti-alert","cmstheme")),
        array("ti-alarm-clock" => __("ti-alarm-clock","cmstheme")),
        array("ti-agenda" => __("ti-agenda","cmstheme")),
        array("ti-write" => __("ti-write","cmstheme")),
        array("ti-window" => __("ti-window","cmstheme")),
        array("ti-widgetized" => __("ti-widgetized","cmstheme")),
        array("ti-widget" => __("ti-widget","cmstheme")),
        array("ti-widget-alt" => __("ti-widget-alt","cmstheme")),
        array("ti-wallet" => __("ti-wallet","cmstheme")),
        array("ti-video-clapper" => __("ti-video-clapper","cmstheme")),
        array("ti-video-camera" => __("ti-video-camera","cmstheme")),
        array("ti-vector" => __("ti-vector","cmstheme")),
        array("ti-themify-logo" => __("ti-themify-logo","cmstheme")),
        array("ti-themify-favicon" => __("ti-themify-favicon","cmstheme")),
        array("ti-themify-favicon-alt" => __("ti-themify-favicon-alt","cmstheme")),
        array("ti-support" => __("ti-support","cmstheme")),
        array("ti-stamp" => __("ti-stamp","cmstheme")),
        array("ti-split-v-alt" => __("ti-split-v-alt","cmstheme")),
        array("ti-slice" => __("ti-slice","cmstheme")),
        array("ti-shortcode" => __("ti-shortcode","cmstheme")),
        array("ti-shift-right-alt" => __("ti-shift-right-alt","cmstheme")),
        array("ti-shift-left-alt" => __("ti-shift-left-alt","cmstheme")),
        array("ti-ruler-alt-2" => __("ti-ruler-alt-2","cmstheme")),
        array("ti-receipt" => __("ti-receipt","cmstheme")),
        array("ti-pin2" => __("ti-pin2","cmstheme")),
        array("ti-pin-alt" => __("ti-pin-alt","cmstheme")),
        array("ti-pencil-alt2" => __("ti-pencil-alt2","cmstheme")),
        array("ti-palette" => __("ti-palette","cmstheme")),
        array("ti-more" => __("ti-more","cmstheme")),
        array("ti-more-alt" => __("ti-more-alt","cmstheme")),
        array("ti-microphone-alt" => __("ti-microphone-alt","cmstheme")),
        array("ti-magnet" => __("ti-magnet","cmstheme")),
        array("ti-line-double" => __("ti-line-double","cmstheme")),
        array("ti-line-dotted" => __("ti-line-dotted","cmstheme")),
        array("ti-line-dashed" => __("ti-line-dashed","cmstheme")),
        array("ti-layout-width-full" => __("ti-layout-width-full","cmstheme")),
        array("ti-layout-width-default" => __("ti-layout-width-default","cmstheme")),
        array("ti-layout-width-default-alt" => __("ti-layout-width-default-alt","cmstheme")),
        array("ti-layout-tab" => __("ti-layout-tab","cmstheme")),
        array("ti-layout-tab-window" => __("ti-layout-tab-window","cmstheme")),
        array("ti-layout-tab-v" => __("ti-layout-tab-v","cmstheme")),
        array("ti-layout-tab-min" => __("ti-layout-tab-min","cmstheme")),
        array("ti-layout-slider" => __("ti-layout-slider","cmstheme")),
        array("ti-layout-slider-alt" => __("ti-layout-slider-alt","cmstheme")),
        array("ti-layout-sidebar-right" => __("ti-layout-sidebar-right","cmstheme")),
        array("ti-layout-sidebar-none" => __("ti-layout-sidebar-none","cmstheme")),
        array("ti-layout-sidebar-left" => __("ti-layout-sidebar-left","cmstheme")),
        array("ti-layout-placeholder" => __("ti-layout-placeholder","cmstheme")),
        array("ti-layout-menu" => __("ti-layout-menu","cmstheme")),
        array("ti-layout-menu-v" => __("ti-layout-menu-v","cmstheme")),
        array("ti-layout-menu-separated" => __("ti-layout-menu-separated","cmstheme")),
        array("ti-layout-menu-full" => __("ti-layout-menu-full","cmstheme")),
        array("ti-layout-media-right-alt" => __("ti-layout-media-right-alt","cmstheme")),
        array("ti-layout-media-right" => __("ti-layout-media-right","cmstheme")),
        array("ti-layout-media-overlay" => __("ti-layout-media-overlay","cmstheme")),
        array("ti-layout-media-overlay-alt" => __("ti-layout-media-overlay-alt","cmstheme")),
        array("ti-layout-media-overlay-alt-2" => __("ti-layout-media-overlay-alt-2","cmstheme")),
        array("ti-layout-media-left-alt" => __("ti-layout-media-left-alt","cmstheme")),
        array("ti-layout-media-left" => __("ti-layout-media-left","cmstheme")),
        array("ti-layout-media-center-alt" => __("ti-layout-media-center-alt","cmstheme")),
        array("ti-layout-media-center" => __("ti-layout-media-center","cmstheme")),
        array("ti-layout-list-thumb" => __("ti-layout-list-thumb","cmstheme")),
        array("ti-layout-list-thumb-alt" => __("ti-layout-list-thumb-alt","cmstheme")),
        array("ti-layout-list-post" => __("ti-layout-list-post","cmstheme")),
        array("ti-layout-list-large-image" => __("ti-layout-list-large-image","cmstheme")),
        array("ti-layout-line-solid" => __("ti-layout-line-solid","cmstheme")),
        array("ti-layout-grid4" => __("ti-layout-grid4","cmstheme")),
        array("ti-layout-grid3" => __("ti-layout-grid3","cmstheme")),
        array("ti-layout-grid2" => __("ti-layout-grid2","cmstheme")),
        array("ti-layout-grid2-thumb" => __("ti-layout-grid2-thumb","cmstheme")),
        array("ti-layout-cta-right" => __("ti-layout-cta-right","cmstheme")),
        array("ti-layout-cta-left" => __("ti-layout-cta-left","cmstheme")),
        array("ti-layout-cta-center" => __("ti-layout-cta-center","cmstheme")),
        array("ti-layout-cta-btn-right" => __("ti-layout-cta-btn-right","cmstheme")),
        array("ti-layout-cta-btn-left" => __("ti-layout-cta-btn-left","cmstheme")),
        array("ti-layout-column4" => __("ti-layout-column4","cmstheme")),
        array("ti-layout-column3" => __("ti-layout-column3","cmstheme")),
        array("ti-layout-column2" => __("ti-layout-column2","cmstheme")),
        array("ti-layout-accordion-separated" => __("ti-layout-accordion-separated","cmstheme")),
        array("ti-layout-accordion-merged" => __("ti-layout-accordion-merged","cmstheme")),
        array("ti-layout-accordion-list" => __("ti-layout-accordion-list","cmstheme")),
        array("ti-ink-pen" => __("ti-ink-pen","cmstheme")),
        array("ti-info-alt" => __("ti-info-alt","cmstheme")),
        array("ti-help-alt" => __("ti-help-alt","cmstheme")),
        array("ti-headphone-alt" => __("ti-headphone-alt","cmstheme")),
        array("ti-hand-point-up" => __("ti-hand-point-up","cmstheme")),
        array("ti-hand-point-right" => __("ti-hand-point-right","cmstheme")),
        array("ti-hand-point-left" => __("ti-hand-point-left","cmstheme")),
        array("ti-hand-point-down" => __("ti-hand-point-down","cmstheme")),
        array("ti-gallery" => __("ti-gallery","cmstheme")),
        array("ti-face-smile" => __("ti-face-smile","cmstheme")),
        array("ti-face-sad" => __("ti-face-sad","cmstheme")),
        array("ti-credit-card" => __("ti-credit-card","cmstheme")),
        array("ti-control-skip-forward" => __("ti-control-skip-forward","cmstheme")),
        array("ti-control-skip-backward" => __("ti-control-skip-backward","cmstheme")),
        array("ti-control-record" => __("ti-control-record","cmstheme")),
        array("ti-control-eject" => __("ti-control-eject","cmstheme")),
        array("ti-comments-smiley" => __("ti-comments-smiley","cmstheme")),
        array("ti-brush-alt" => __("ti-brush-alt","cmstheme")),
        array("ti-youtube" => __("ti-youtube","cmstheme")),
        array("ti-vimeo" => __("ti-vimeo","cmstheme")),
        array("ti-twitter" => __("ti-twitter","cmstheme")),
        array("ti-time" => __("ti-time","cmstheme")),
        array("ti-tumblr" => __("ti-tumblr","cmstheme")),
        array("ti-skype" => __("ti-skype","cmstheme")),
        array("ti-share" => __("ti-share","cmstheme")),
        array("ti-share-alt" => __("ti-share-alt","cmstheme")),
        array("ti-rocket" => __("ti-rocket","cmstheme")),
        array("ti-pinterest" => __("ti-pinterest","cmstheme")),
        array("ti-new-window" => __("ti-new-window","cmstheme")),
        array("ti-microsoft" => __("ti-microsoft","cmstheme")),
        array("ti-list-ol" => __("ti-list-ol","cmstheme")),
        array("ti-linkedin" => __("ti-linkedin","cmstheme")),
        array("ti-layout-sidebar-2" => __("ti-layout-sidebar-2","cmstheme")),
        array("ti-layout-grid4-alt" => __("ti-layout-grid4-alt","cmstheme")),
        array("ti-layout-grid3-alt" => __("ti-layout-grid3-alt","cmstheme")),
        array("ti-layout-grid2-alt" => __("ti-layout-grid2-alt","cmstheme")),
        array("ti-layout-column4-alt" => __("ti-layout-column4-alt","cmstheme")),
        array("ti-layout-column3-alt" => __("ti-layout-column3-alt","cmstheme")),
        array("ti-layout-column2-alt" => __("ti-layout-column2-alt","cmstheme")),
        array("ti-instagram" => __("ti-instagram","cmstheme")),
        array("ti-google" => __("ti-google","cmstheme")),
        array("ti-github" => __("ti-github","cmstheme")),
        array("ti-flickr" => __("ti-flickr","cmstheme")),
        array("ti-facebook" => __("ti-facebook","cmstheme")),
        array("ti-dropbox" => __("ti-dropbox","cmstheme")),
        array("ti-dribbble" => __("ti-dribbble","cmstheme")),
        array("ti-apple" => __("ti-apple","cmstheme")),
        array("ti-android" => __("ti-android","cmstheme")),
        array("ti-save" => __("ti-save","cmstheme")),
        array("ti-save-alt" => __("ti-save-alt","cmstheme")),
        array("ti-yahoo" => __("ti-yahoo","cmstheme")),
        array("ti-wordpress" => __("ti-wordpress","cmstheme")),
        array("ti-vimeo-alt" => __("ti-vimeo-alt","cmstheme")),
        array("ti-twitter-alt" => __("ti-twitter-alt","cmstheme")),
        array("ti-tumblr-alt" => __("ti-tumblr-alt","cmstheme")),
        array("ti-trello" => __("ti-trello","cmstheme")),
        array("ti-stack-overflow" => __("ti-stack-overflow","cmstheme")),
        array("ti-soundcloud" => __("ti-soundcloud","cmstheme")),
        array("ti-sharethis" => __("ti-sharethis","cmstheme")),
        array("ti-sharethis-alt" => __("ti-sharethis-alt","cmstheme")),
        array("ti-reddit" => __("ti-reddit","cmstheme")),
        array("ti-pinterest-alt" => __("ti-pinterest-alt","cmstheme")),
        array("ti-microsoft-alt" => __("ti-microsoft-alt","cmstheme")),
        array("ti-linux" => __("ti-linux","cmstheme")),
        array("ti-jsfiddle" => __("ti-jsfiddle","cmstheme")),
        array("ti-joomla" => __("ti-joomla","cmstheme")),
        array("ti-html5" => __("ti-html5","cmstheme")),
        array("ti-flickr-alt" => __("ti-flickr-alt","cmstheme")),
        array("ti-email" => __("ti-email","cmstheme")),
        array("ti-drupal" => __("ti-drupal","cmstheme")),
        array("ti-dropbox-alt" => __("ti-dropbox-alt","cmstheme")),
        array("ti-css3" => __("ti-css3","cmstheme")),
        array("ti-rss" => __("ti-rss","cmstheme")),
        array("ti-rss-alt" => __("ti-rss-alt","cmstheme")),
    );

	return array_merge( $icons, $list_icons );
}