<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(''); ?></title>
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/apple.png">
    <?php wp_head(); ?>  
</head>
<body <?php body_class(); ?>>
    <?php
    if (get_the_title() != 'Registration') {
        get_template_part( 'partials/navigation', 'main' );
        get_template_part( 'partials/hero' );
    }
    ?>
