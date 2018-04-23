<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
?>

<div id="mobile-nav" data-toggler=".expanded">
    
    <div class="row">
        <div class="columns small-12 text-left">
    
            <div class="row vertical-pad-1">
                <div class="columns small-12">
                    <div class="mobile-search">
                        <?php get_search_form( ) ?>
                    </div>
                    <div class="responsive-menu">
                        <?php
                        $mobile_nav = array(
                        'theme_location'  => 'primary_navigation',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_class' => 'menu-header',
                        'container_id'    => '',
                        'menu_class'      => 'menu',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '<input id="menu-expand" class="arrow-down fa fa-chevron-down" type="checkbox">',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                        );
                        wp_nav_menu( $mobile_nav );
                        ?>
                    </div>
                    
                    <div class="mobile-utility">
                        <ul>
                            <?php
                            $args = array(
                                'theme_location'  => 'utility_navigation',
                                'echo'            => true,
                                'container'      => '',
                                'items_wrap'      => '%3$s'
                            );
                            wp_nav_menu( $args );
                            ?>
                        </ul>
                    </div>
                    <div>
                        <a class="mobile-utility-cta" data-toggle="get-more-info">Get More Info!</a>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>

<div id="utility" class="clearfix utility-navigation show-for-large">
    
    <ul>
        <?php
            $args = array(
                'theme_location'  => 'utility_navigation',
                'echo'            => true,
                'container'      => '',
                'items_wrap'      => '%3$s'
            );
            wp_nav_menu( $args );
        ?>
        <li>
            <a class="utility-cta" data-toggle="get-more-info">Get More Info!</a>
        </li>
    </ul>

    <div class="utility-search">
        <?php get_search_form( ) ?>
    </div>

</div>

<div id="header" class="clearfix">
    
    <div id="primary-nav" class="clearfix main-menu">
        
        <h2 id="logo">
            <a href="<?php bloginfo('url'); ?>/">
                <?php get_template_part('partials/logo'); ?>
                <span class="hide"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </h2>
        <div id="main-nav">
            <ul class="primary-menu">
                <?php
                    $args = array(
                        'theme_location'  => 'primary_navigation',
                        'echo'            => true,
                        'container'      => '',
                        'items_wrap'      => '%3$s'
                    );
                    wp_nav_menu( $args );
                ?>
                
            </ul>
        </div>

        <a class="hamburger hamburger--collapse" id="mobile-nav-trigger" data-toggle="mobile-nav">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
             </div>

        </a>
    </div>
   

  <script>

    var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }
  </script>
    
</div>

<div id="breadcrumba" class="breadcrumb-wrapper show-for-large">

    <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

</div>