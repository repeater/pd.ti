<div class="row" id="post-pagination">
    <div class="columns small-6 medium-4 medium-offset-1">
    <?php
    $next_post = get_next_post();
    if (!empty( $next_post )): ?>
      <a class="button expand" href="<?php echo get_permalink( $next_post->ID ); ?>">&larr; <?php echo $next_post->post_title; ?></a>
    <?php endif; ?>
    </div>
    <div class="columns small-6 medium-4 medium-offset-2 end">
    <?php
    $prev_post = get_previous_post();
    if (!empty( $prev_post )): ?>
      <a class="button expand" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?> &rarr;</a>
    <?php endif; ?>
    </div>
</div>