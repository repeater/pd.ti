<?php
/**
 * Template Name: Support Form
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<h1 class="hide"><?php the_title(); ?></h1>
<?php $contact = simple_fields_fieldgroup('contact'); ?>
<div id="contact" class="gray-back">
	<div class="row align-center">
		<div class="columns large-9 medium-10 small-12 vertical-pad">
			<h2 class="text-center"><?php echo $contact['top_line']; ?></h2>
			<p class="text-center"><?php echo $contact['bottom_line']; ?></p>
			<?php get_template_part('partials/support-form'); ?>
		</div>
	</div>
</div>
<hr>
<?php
get_footer();
?>
