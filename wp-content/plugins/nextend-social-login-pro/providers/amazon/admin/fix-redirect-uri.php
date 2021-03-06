<?php
defined('ABSPATH') || die();
/** @var $this NextendSocialProviderAdmin */

$provider = $this->getProvider();
?>
<ol>
    <li><?php printf(__('Navigate to %s', 'nextend-facebook-connect'), '<a href="https://www.amazon.com/" target="_blank">https://www.amazon.com/</a>'); ?></li>
    <li><?php printf(__('Log in with your %s credentials if you are not logged in', 'nextend-facebook-connect'), 'Amazon'); ?></li>
    <li><?php printf(__('Visit %s', 'nextend-facebook-connect'), '<a href="https://developer.amazon.com/lwa/sp/overview.html" target="_blank">https://developer.amazon.com/lwa/sp/overview.html</a>'); ?></li>
    <li><?php _e('On the right side, under "Manage", hover over the gear icon and select "Web Settings" option.', 'nextend-facebook-connect') ?></li>
    <li><?php _e('Click "Edit".', 'nextend-facebook-connect') ?></li>
    <li><?php printf(__('Add the following URL to the "Allowed Return URLs" field <b>%s</b> ', 'nextend-facebook-connect'), $provider->getLoginUrl()) ?></li>
    <li><?php _e('Click on "Save"', 'nextend-facebook-connect'); ?></li>
</ol>