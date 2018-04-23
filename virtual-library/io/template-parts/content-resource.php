<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package IO
 * 
 */
?>

<?php $path = get_field('file_upload'); ?>
<?php $label = get_field('download_label'); ?>

<div class="row">
	
	<div class=" <?php echo esc_attr( $class_to_add ); ?>">
		<article id="post-<?php the_ID(); ?>" class="column section section-text">
            <div class="resource-data-wrap column medium-10 medium-offset-1">
                
                <div class="resource-data text-center">
                    <div class="row resource-data-row align-middle">
                        <div class="columns small-12 medium-8 text-left">
                            <div class="row align-middle">
                                <div class="columns shrink">
                                    <span class="avatar-small"><?php echo get_avatar(); ?></span>
                                </div>
                                <div class="columns">
                                <span class="entry-author"><?php echo get_the_author(); ?></span><br><span class="entry-date"><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="columns small-12 medium-4 text-right">
                            <?php if (!empty($path)) : ?>
                            <a style="margin:0;" class="button" href="<?php the_field('file_upload'); ?>"><i class="fa fa-cloud-download" aria-hidden="true"></i> <?php the_field('download_label'); ?></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
                
            
                <?php the_content(); ?>
            </div>
		</article>

		
	</div>
	
</div>

