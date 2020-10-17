<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta  name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.ico');?>"/> 
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php echo logistics_get_page_loading(); ?>

<?php if(is_active_sidebar('options-control-demo')) dynamic_sidebar('options-control-demo'); ?>

<div id="page">
	<header id="masthead" class="site-header">
		<?php logistics_header(); ?>
	</header>
	<?php //logistics_page_title();?>
	<div id="main">
