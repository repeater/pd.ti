<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
/* Display navigation to next/previous pages when applicable */
if (  $wp_query->max_num_pages > 1 ) {
    /* altered for infinite scroll */
//    echo '<div id="pagination">';
//        echo '<div class="row">';
//            echo '<div class="columns large-8 large-centered">';
//                echo '<div class="row">';
//                    echo '<div class="columns small-6">';
//                        echo '<div id="prev">';
//                            previous_posts_link( __( 'Newer', 'syrup' ) );
//                        echo '</div>';
//                    echo '</div>';
//                    echo '<div class="columns small-6">';
//                        echo '<div id="next">';
//                            next_posts_link( __( 'Older', 'syrup' ) );
//                        echo '</div>';
//                    echo '</div>';
//                echo '</div>';
//            echo '</div>';
//        echo '</div>';
//    echo '</div>';
    /* original */
     echo '<div class="row" id="pagination">';
     echo '<div class="columns small-6" id="prev">';
         previous_posts_link( __( '&larr; Newer Posts', 'syrup' ) );
     echo '</div>';
     echo '<div class="columns small-6" id="next">';
         next_posts_link( __( 'Older Posts &rarr;', 'syrup' ) );
     echo '</div>';
     echo '</div>';
}
?>
