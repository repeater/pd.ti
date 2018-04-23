<div class="page-sub-nav">
    <div class="row">
        <div class="columns">
            <?php
            $args = array(
                'theme_location'  => 'products_navigation',
                'echo'            => true,
                'container'      => '',
                'items_wrap'      => '<ul>%3$s</ul>'
            );
            wp_nav_menu( $args );
            ?>
        </div>
    </div>
</div>
