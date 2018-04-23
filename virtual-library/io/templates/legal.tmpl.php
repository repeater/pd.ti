<?php
/**
 * Template Name: Legal
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<div class="vertical-pad" id="terms">
    <div class="row">
        <div class="columns small-12 medium-7 large-8">
            <?php
            echo '<h2>';
            the_title();
            echo '</h2>';
            the_content();
            ?>
        </div>
        <div class="columns small-12 medium-5 large-4">
            <div id="terms-page-menu">
                <h3>More Information</h3>
                <p>Marketing Website Policies</p>
                <?php
                $args = array(
                    'theme_location' => 'legal_1_navigation',
                    'menu_class'     => 'terms-menu-list',
                    'echo'           => true,
                    'container'      => '',
                    'items_wrap'     => '<ul>%3$s</ul>'
                );
                wp_nav_menu( $args );
                ?>

                <p>Platform Policies</p> 
                <?php
                $args = array(
                    'theme_location' => 'legal_2_navigation',
                    'menu_class'     => 'terms-menu-list',
                    'echo'           => true,
                    'container'      => '',
                    'items_wrap'     => '<ul>%3$s</ul>'
                );
                wp_nav_menu( $args );
                ?>

                <p>Pledge to Parents</p>
                <?php
                $args = array(
                    'theme_location' => 'legal_3_navigation',
                    'menu_class'     => 'terms-menu-list',
                    'echo'           => true,
                    'container'      => '',
                    'items_wrap'     => '<ul>%3$s</ul>'
                );
                wp_nav_menu( $args );
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
