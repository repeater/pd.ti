<?php
/**
 * Template Name: Partners
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<h1 class="hide"><?php the_title(); ?></h1>
<div class="row align-center vertical-pad" data-equalizer>
	<?php
	$partners = simple_fields_fieldgroup('partners');
	if (!empty($partners)) {
		for ($i = 0; $i < count($partners); $i++) {
			echo '<div class="wow slide-in columns large-4 medium-6 small-12">';
			echo '<div class="partner" data-equalizer-watch>';
			if (!empty($partners[$i]['url'])) {
				echo '<a href="'.$partners[$i]['url'].'" target="_blank">';
			}
			if ($partners[$i]['logo']['is_image']) {
				echo '<img class="lazy" data-original="'.$partners[$i]['logo']['image_src']['medium'][0].'" alt="'.$partners[$i]['name'].'">';
			}
			if (!empty($partners[$i]['name'])) {
				echo '<h3 class="text-center">'.$partners[$i]['name'].'</h3>';
			}
			if (!empty($partners[$i]['url'])) {
				echo '</a>';
			}
			if (!empty($partners[$i]['description'])) {
				echo $partners[$i]['description'];
			}
			echo '</div>';
			echo '</div>';
		}
	}
	?>
</div>
<?php
get_footer();
?>
