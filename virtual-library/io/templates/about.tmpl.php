<?php
/**
 * Template Name: About
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
get_template_part('partials/navigation','about');
$story = simple_fields_value('story');
if (!empty($story)) {
?>
<div id="our-story" class="vertical-pad">
	<div class="row align-center">
		<div class="columns large-8 medium-10 text-center">
			<?php echo $story; ?>
		</div>
	</div>
</div>
<?php
}
?>

<?php $history = simple_fields_fieldgroup('history'); ?>
<div id="company-history">
	<?php
	if (!empty($history['image'])) {
		$img = wp_get_attachment_image_src($history['image'],'x_large')[0];
		$img_original = wp_get_attachment_image_src($history['image'],'full')[0];
		echo '<img data-original="'.$img.'" class="lazy wow slide-in" alt="'.$history['title'].'">';
	}
	?>
</div>



<div id="companies">
	<?php
	$companies = simple_fields_fieldgroup('company');
	echo '<div id="companies-list" class="row align-center">';
		for ($i = 0; $i < count($companies); $i++) {
			$company = (!empty($companies[$i]['company']) ? $companies[$i]['company'] : '');
			$brief = (!empty($companies[$i]['brief']) ? $companies[$i]['brief'] : '');
			$image = (!empty($companies[$i]['image']) ? wp_get_attachment_image_src($companies[$i]['image'],'medium')[0] : '');
		    echo '<div class="medium-3 small-4 large-2 columns company-wrap">';
			    echo '<a
			        href="#"
			        data-company="'.$company.'"
					data-brief="'.htmlspecialchars($brief).'"
			        class="wow slide-in company-trigger lazy" style="background-image:url('.$image.')"
			        >';
			    echo '</a>';
		    echo '</div>';
		}
	echo '</div>';
	?>
</div>




<?php $values = simple_fields_fieldgroup('values'); ?>
<div id="our-values">
	<div class="row">
		<div class="columns">
			<h3 class="text-center"><?php echo $values['value_intro']; ?></h3>
		</div>
	</div>
	<div class="row vertical-pad">
		<?php for($i = 1; $i <= 4; $i++) { ?>
			<div class="columns small-12 medium-6 large-3">
				<div class="text-center value wow slide-in">
					<h3><?php echo $values['value_'.$i.'_title']; ?></h3>
					<p><?php echo $values['value_'.$i.'_content']; ?></p>
				</div>
			</div>
		<?php } ?>
	</div>
</div>




<?php $leadership_static = simple_fields_fieldgroup('leadership_static'); ?>
<div id="leadership">
	<div class="row">
		<div class="columns">
			<h3 id="leadership-title"><?php echo $leadership_static['intro']; ?></h3>
		</div>
	</div>
	<?php
	$args = array(
		'post_type' => 'leadership',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$leadership_query = new WP_Query( $args );
	$leadership = $leadership_query->posts;
	wp_reset_postdata();
	echo '<div id="bios" class="row" data-equalizer>';
		for ($i = 0; $i < count($leadership); $i++) {
		    $post_id = $leadership[$i]->ID;
		    $name = get_the_title($post_id);
		    $person = simple_fields_fieldgroup('person',$post_id);
			$title = (!empty($person['title']) ? $person['title'] : '');
			$bio = (!empty($person['bio']) ? $person['bio'] : '');
			$twitter = (!empty($person['twitter']) ? $person['twitter'] : '');
			$linkedin = (!empty($person['linkedin']) ? $person['linkedin'] : '');
			$image = (!empty($person['image']) ? wp_get_attachment_image_src($person['image'],'medium')[0] : '');
			$graduation_image = (!empty($person['graduation_image']) ? wp_get_attachment_image_src($person['graduation_image'],'medium')[0] : '');
		    echo '<div class="medium-6 small-12 large-4 columns">';
			    echo '<a
			        href="#"
			        data-person="'.$i.'"
					data-name="'.$name.'"
			        data-title="'.$title.'"
			        data-bio="'.htmlspecialchars($bio).'"
			        data-twitter="'.htmlspecialchars($twitter).'"
			        data-linkedin="'.htmlspecialchars($linkedin).'"
			        data-image="'.htmlspecialchars($image).'"
			        class="wow slide-in bio-link"
			        data-equalizer-watch
					>';
					echo '<div class="bio-image-wrap">';
					if ($image) {
						echo '<div class="bio-image original-image lazy" data-original="'.$image.'"></div>';
					}
					if ($graduation_image) {
						echo '<div class="bio-image graduation-image lazy" data-original="'.$graduation_image.'"></div>';
					}
					echo '</div>';
					if ($name) {
						echo '<h4>'.$name.'</h4>';
					}
					if ($title) {
						echo '<p>'.$title.'</p>';
					}
			    echo '</a>';
		    echo '</div>';
		}
		echo '<div class="medium-6 small-12 large-4 columns">';
			echo '<a
				href="'.$leadership_static['work_link'].'"
				class="wow slide-in bio-link"
				>';
				echo '<div class="work-circle"><span>'.$leadership_static['work_text'].'</span></div>';
				echo '<h4>Your Name</h4>';
				echo '<p>Your Title</p>';
			echo '</a>';
		echo '</div>';
	echo '</div>';
	?>
</div>

<?php
get_template_part('partials/map','offices');
get_footer();
?>
