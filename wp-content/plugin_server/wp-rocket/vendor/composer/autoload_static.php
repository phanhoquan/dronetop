<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc02275739d57ca306c769bd6246c3412
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RocketLazyload\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
            'MatthiasMullie\\PathConverter\\' => 29,
            'MatthiasMullie\\Minify\\' => 22,
        ),
        'L' => 
        array (
            'League\\Container\\' => 17,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Cloudflare\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RocketLazyload\\' => 
        array (
            0 => __DIR__ . '/..' . '/wp-media/rocket-lazyload-common/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'MatthiasMullie\\PathConverter\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/path-converter/src',
        ),
        'MatthiasMullie\\Minify\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/minify/src',
        ),
        'League\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/container/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Cloudflare\\' => 
        array (
            0 => __DIR__ . '/..' . '/jamesryanbell/cloudflare/src/CloudFlare',
        ),
    );

    public static $classMap = array (
        'Imagify_Partner' => __DIR__ . '/../..' . '/inc/vendors/classes/class-imagify-partner.php',
        'Minify_CSS_UriRewriter' => __DIR__ . '/../..' . '/inc/vendors/classes/class-minify-css-urirewriter.php',
        'Minify_HTML' => __DIR__ . '/../..' . '/inc/vendors/classes/class-minify-html.php',
        'WP_Async_Request' => __DIR__ . '/..' . '/a5hleyrich/wp-background-processing/classes/wp-async-request.php',
        'WP_Background_Process' => __DIR__ . '/..' . '/a5hleyrich/wp-background-processing/classes/wp-background-process.php',
        'WP_Rocket\\Abstract_Render' => __DIR__ . '/../..' . '/inc/classes/class-abstract-render.php',
        'WP_Rocket\\Admin\\Abstract_Options' => __DIR__ . '/../..' . '/inc/classes/admin/class-abstract-options.php',
        'WP_Rocket\\Admin\\Database\\Optimization' => __DIR__ . '/../..' . '/inc/classes/admin/Database/class-optimization.php',
        'WP_Rocket\\Admin\\Database\\Optimization_Process' => __DIR__ . '/../..' . '/inc/classes/admin/Database/class-optimization-process.php',
        'WP_Rocket\\Admin\\Deactivation\\Render' => __DIR__ . '/../..' . '/inc/classes/admin/deactivation/class-render.php',
        'WP_Rocket\\Admin\\Logs' => __DIR__ . '/../..' . '/inc/classes/admin/class-logs.php',
        'WP_Rocket\\Admin\\Options' => __DIR__ . '/../..' . '/inc/classes/admin/class-options.php',
        'WP_Rocket\\Admin\\Options_Data' => __DIR__ . '/../..' . '/inc/classes/admin/class-options-data.php',
        'WP_Rocket\\Admin\\Settings\\Beacon' => __DIR__ . '/../..' . '/inc/classes/admin/settings/class-beacon.php',
        'WP_Rocket\\Admin\\Settings\\Page' => __DIR__ . '/../..' . '/inc/classes/admin/settings/class-page.php',
        'WP_Rocket\\Admin\\Settings\\Render' => __DIR__ . '/../..' . '/inc/classes/admin/settings/class-render.php',
        'WP_Rocket\\Admin\\Settings\\Settings' => __DIR__ . '/../..' . '/inc/classes/admin/settings/class-settings.php',
        'WP_Rocket\\Buffer\\Abstract_Buffer' => __DIR__ . '/../..' . '/inc/classes/Buffer/class-abstract-buffer.php',
        'WP_Rocket\\Buffer\\Cache' => __DIR__ . '/../..' . '/inc/classes/Buffer/class-cache.php',
        'WP_Rocket\\Buffer\\Config' => __DIR__ . '/../..' . '/inc/classes/Buffer/class-config.php',
        'WP_Rocket\\Buffer\\Optimization' => __DIR__ . '/../..' . '/inc/classes/Buffer/class-optimization.php',
        'WP_Rocket\\Buffer\\Tests' => __DIR__ . '/../..' . '/inc/classes/Buffer/class-tests.php',
        'WP_Rocket\\Busting\\Abstract_Busting' => __DIR__ . '/../..' . '/inc/classes/busting/class-abstract-busting.php',
        'WP_Rocket\\Busting\\Busting_Factory' => __DIR__ . '/../..' . '/inc/classes/busting/class-busting-factory.php',
        'WP_Rocket\\Busting\\Facebook_Pickles' => __DIR__ . '/../..' . '/inc/classes/busting/class-facebook-pickles.php',
        'WP_Rocket\\Busting\\Facebook_SDK' => __DIR__ . '/../..' . '/inc/classes/busting/class-facebook-sdk.php',
        'WP_Rocket\\Busting\\File_Busting' => __DIR__ . '/../..' . '/inc/classes/busting/trait-file-busting.php',
        'WP_Rocket\\Busting\\Google_Analytics' => __DIR__ . '/../..' . '/inc/classes/busting/class-google-analytics.php',
        'WP_Rocket\\Busting\\Google_Tag_Manager' => __DIR__ . '/../..' . '/inc/classes/busting/class-google-tag-manager.php',
        'WP_Rocket\\Event_Management\\Event_Manager' => __DIR__ . '/../..' . '/inc/classes/event-management/class-event-manager.php',
        'WP_Rocket\\Event_Management\\Event_Manager_Aware_Subscriber_Interface' => __DIR__ . '/../..' . '/inc/classes/event-management/event-manager-aware-subscriber-interface.php',
        'WP_Rocket\\Event_Management\\Subscriber_Interface' => __DIR__ . '/../..' . '/inc/classes/event-management/subscriber-interface.php',
        'WP_Rocket\\Interfaces\\Render_Interface' => __DIR__ . '/../..' . '/inc/classes/interfaces/class-render-interface.php',
        'WP_Rocket\\Logger\\HTML_Formatter' => __DIR__ . '/../..' . '/inc/classes/logger/class-html-formatter.php',
        'WP_Rocket\\Logger\\Logger' => __DIR__ . '/../..' . '/inc/classes/logger/class-logger.php',
        'WP_Rocket\\Logger\\Stream_Handler' => __DIR__ . '/../..' . '/inc/classes/logger/class-stream-handler.php',
        'WP_Rocket\\Optimization\\Abstract_Optimization' => __DIR__ . '/../..' . '/inc/classes/optimization/class-abstract-optimization.php',
        'WP_Rocket\\Optimization\\Assets_Local_Cache' => __DIR__ . '/../..' . '/inc/classes/optimization/class-assets-local-cache.php',
        'WP_Rocket\\Optimization\\CDN_Favicons' => __DIR__ . '/../..' . '/inc/classes/optimization/class-cdn-favicons.php',
        'WP_Rocket\\Optimization\\CSS\\Abstract_CSS_Optimization' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-abstract-css-optimization.php',
        'WP_Rocket\\Optimization\\CSS\\Combine' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-combine.php',
        'WP_Rocket\\Optimization\\CSS\\Combine_Google_Fonts' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-combine-google-fonts.php',
        'WP_Rocket\\Optimization\\CSS\\Critical_CSS' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-critical-css.php',
        'WP_Rocket\\Optimization\\CSS\\Critical_CSS_Generation' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-critical-css-generation.php',
        'WP_Rocket\\Optimization\\CSS\\Minify' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/class-minify.php',
        'WP_Rocket\\Optimization\\CSS\\Path_Rewriter' => __DIR__ . '/../..' . '/inc/classes/optimization/CSS/trait-path-rewriter.php',
        'WP_Rocket\\Optimization\\Cache_Dynamic_Resource' => __DIR__ . '/../..' . '/inc/classes/optimization/class-cache-dynamic-resource.php',
        'WP_Rocket\\Optimization\\JS\\Abstract_JS_Optimization' => __DIR__ . '/../..' . '/inc/classes/optimization/JS/class-abstract-js-optimization.php',
        'WP_Rocket\\Optimization\\JS\\Combine' => __DIR__ . '/../..' . '/inc/classes/optimization/JS/class-combine.php',
        'WP_Rocket\\Optimization\\JS\\Minify' => __DIR__ . '/../..' . '/inc/classes/optimization/JS/class-minify.php',
        'WP_Rocket\\Optimization\\Remove_Query_String' => __DIR__ . '/../..' . '/inc/classes/optimization/class-remove-query-string.php',
        'WP_Rocket\\Plugin' => __DIR__ . '/../..' . '/inc/classes/class-plugin.php',
        'WP_Rocket\\Preload\\Abstract_Preload' => __DIR__ . '/../..' . '/inc/classes/preload/class-abstract-preload.php',
        'WP_Rocket\\Preload\\Full_Process' => __DIR__ . '/../..' . '/inc/classes/preload/class-full-process.php',
        'WP_Rocket\\Preload\\Homepage' => __DIR__ . '/../..' . '/inc/classes/preload/class-homepage.php',
        'WP_Rocket\\Preload\\Partial_Process' => __DIR__ . '/../..' . '/inc/classes/preload/class-partial-process.php',
        'WP_Rocket\\Preload\\Sitemap' => __DIR__ . '/../..' . '/inc/classes/preload/class-sitemap.php',
        'WP_Rocket\\ServiceProvider\\Addons_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-addons-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Admin_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-admin-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Beacon' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-beacon.php',
        'WP_Rocket\\ServiceProvider\\Common_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-common-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Database' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-database.php',
        'WP_Rocket\\ServiceProvider\\Hostings_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-hostings-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Lazyload' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-lazyload.php',
        'WP_Rocket\\ServiceProvider\\Optimization_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-optimization-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Options' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-options.php',
        'WP_Rocket\\ServiceProvider\\Preload_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-preload-subscribers.php',
        'WP_Rocket\\ServiceProvider\\Settings' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-settings.php',
        'WP_Rocket\\ServiceProvider\\Third_Party_Subscribers' => __DIR__ . '/../..' . '/inc/classes/ServiceProvider/class-third-party-subscribers.php',
        'WP_Rocket\\Subscriber\\Admin\\Database\\Optimization_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/admin/Database/class-optimization-subscriber.php',
        'WP_Rocket\\Subscriber\\Admin\\Deactivation\\Deactivation_Intent_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/admin/Deactivation/class-deactivation-intent-subscriber.php',
        'WP_Rocket\\Subscriber\\Admin\\Settings\\Beacon_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/admin/Settings/class-beacon-subscriber.php',
        'WP_Rocket\\Subscriber\\Admin\\Settings\\Page_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/admin/Settings/class-page-subscriber.php',
        'WP_Rocket\\Subscriber\\Facebook_Tracking_Cache_Busting_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/class-facebook-tracking-cache-busting-subscriber.php',
        'WP_Rocket\\Subscriber\\Google_Tracking_Cache_Busting_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/class-google-tracking-cache-busting-subscriber.php',
        'WP_Rocket\\Subscriber\\Heartbeat_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/class-heartbeat-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Buffer_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-buffer-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\CDN_Favicons_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-cdn-favicons-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Cache_Dynamic_Resource_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-cache-dynamic-resource-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Combine_Google_Fonts_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-combine-google-fonts-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Critical_CSS_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-critical-css-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\IE_Conditionals_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-ie-conditionals-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Lazyload_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-lazyload-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Minify_CSS_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-minify-css-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Minify_HTML_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-minify-html-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Minify_JS_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-minify-js-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Minify_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-abstract-minify-subscriber.php',
        'WP_Rocket\\Subscriber\\Optimization\\Remove_Query_String_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Optimization/class-remove-query-string-subscriber.php',
        'WP_Rocket\\Subscriber\\Preload\\Partial_Preload_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/preload/class-partial-preload-subscriber.php',
        'WP_Rocket\\Subscriber\\Preload\\Preload_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/preload/class-preload-subscriber.php',
        'WP_Rocket\\Subscriber\\Preload\\Sitemap_Preload_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/preload/class-sitemap-preload-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Hostings\\Pressable_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/Hostings/class-pressable-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\Ecommerce\\WooCommerce_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/ecommerce/class-woocommerce-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\Mobile_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/class-mobile-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\NGG_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/class-ngg-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\Optimization\\Hummingbird_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/Optimization/class-hummingbird-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\PageBuilder\\Elementor_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/PageBuilder/class-elementor-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\Security\\Sucuri_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/security/class-sucuri-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Plugins\\SyntaxHighlighter_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/plugins/class-syntaxhighlighter-subscriber.php',
        'WP_Rocket\\Subscriber\\Third_Party\\Themes\\Bridge_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/third-party/Themes/class-bridge-subscriber.php',
        'WP_Rocket\\Subscriber\\Tools\\Cache_Dir_Size_Check_Subscriber' => __DIR__ . '/../..' . '/inc/classes/subscriber/Tools/class-cache-dir-size-check-subscriber.php',
        'WP_Rocket\\Traits\\Config_Updater' => __DIR__ . '/../..' . '/inc/classes/traits/trait-config-updater.php',
        'WP_Rocket\\Traits\\Memoize' => __DIR__ . '/../..' . '/inc/classes/traits/trait-memoize.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc02275739d57ca306c769bd6246c3412::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc02275739d57ca306c769bd6246c3412::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc02275739d57ca306c769bd6246c3412::$classMap;

        }, null, ClassLoader::class);
    }
}
