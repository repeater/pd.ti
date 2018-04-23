<?php
function excerpt($limit) {
    $linking = get_permalink();
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
function new_excerpt_more($more) {
    global $post;
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function syrup_meta() {
    $reading_time = simple_fields_value('reading_time');
    echo '<div class="post-meta">';
    echo '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">';
    echo '<span class="pm-image">'.get_avatar( get_the_author_meta( 'user_email' ), 100).'</span>';
    echo '<span class="pm-name">'.get_the_author_meta('display_name').'</span>';
    echo '<span class="pm-title">'.get_the_author_meta('description').'</span>';
    echo '</a>';
    echo '<span class="pm-date">'.get_the_date('F j, Y').'</span>';
    if (!empty($reading_time)) {
        echo '<span class="pm-readingtime">'.$reading_time.'</span>';
    }
    // echo '<a href="#comments" class="pm-count scroll">';
    // comments_number( '0', '1', '%' );
    // echo '</a>';
    echo '</div>';
}

function syrup_share() {
    ?>
    <ul class="share-buttons">
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&source=<?php echo urlencode(get_bloginfo('name')); ?>" target="_blank" title="Share on LinkedIn"><span class="icon-linkedin"></span></a></li>
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>&t=<?php echo urlencode(get_the_title()); ?>" title="Share on Facebook" target="_blank"><span class="icon-facebook"></span></a></li>
        <li><a href="https://twitter.com/intent/tweet?source=<?php echo urlencode(get_the_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>:%20<?php echo urlencode(get_the_permalink()); ?>" target="_blank" title="Tweet"><span class="icon-twitter"></span></a></li>
    </ul>
    <?php
}


add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');
function posts_link_attributes_1() {
    return 'class="button"';
}
function posts_link_attributes_2() {
    return 'class="button"';
}
