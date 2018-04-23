<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<?php $home_bullets = simple_fields_fieldgroup('home_bullets'); ?>
<div id="home-bullets">
	<div class="row align-center">
		<?php
		for($i = 0; $i < count($home_bullets); $i++) {
			if ($i == 0) {
				$span_class = 'icon-plug';
			} else if ($i == 1) {
				$span_class = 'icon-magnet';
			} else if ($i == 2) {
				$span_class = 'icon-barchart';
			} else if ($i == 3) {
				$span_class = 'icon-clipboard';
			}
			?>
			<div class="columns small-12 large-3 medium-6 text-center home-bullet wow slide-in">
				<span class="<?php echo $span_class; ?>"></span>
				<h4><?php echo $home_bullets[$i]['title']; ?></h4>
				<p><?php echo $home_bullets[$i]['content']; ?></p>
			</div>
		<?php } ?>
	</div>
</div>
<div id="learn-more" class="yellow-orange-diagonal">
	<?php $learn_more = simple_fields_fieldgroup('learn_more'); ?>
	<div class="row align-center">
		<div class="columns large-10 wow slide-in">
			<h2 class="text-center"><?php if (!empty($learn_more['big_text'])) { echo $learn_more['big_text']; } ?></h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="columns large-8 medium-10 small-12 wow slide-in">
			<div id="learn-more-content" class="text-center">
				<p class="lead"><?php if (!empty($learn_more['learn_more_content'])) { echo $learn_more['learn_more_content']; } ?></p>
				<?php
				if (!empty($learn_more['learn_more_button_text'])) {
					$lm_url = $learn_more['learn_more_button_post']['permalink'];
					$lm_text = $learn_more['learn_more_button_text'];
					echo '<a href="'.$lm_url.'" class="button white-stroke"><span class="inline-button-icon icon-'.$learn_more['learn_more_button_icon']['selected_value'].'"></span>'.$lm_text.'</a>';
				} ?>
			</div>
		</div>
	</div>
</div>

<?php
$stats = simple_fields_fieldgroup('stats');
$stat_static = simple_fields_fieldgroup('stats_static');
?>
<div id="stats">
	<div class="row align-center">
		<div class="large-10 columns wow slide-in">
			<h3 class="text-center"><?php echo $stat_static['lead']; ?></h3>
		</div>
	</div>
	<div class="row collapse expanded align-left align-middle">
		<div class="columns medium-6 small-12">
			<?php //get_template_part('partials/map','districts'); ?>
			<?php
			$stat_map = $stat_static['stats_map'];
			if (!empty($stat_map)) {
				$stat_map_ob = wp_get_attachment_image_src($stat_map,'large');
				echo '<img class="lazy stat-image" data-original="'.$stat_map_ob[0].'" alt="Stat Map">';
			}
			?>
		</div>
		<div class="columns medium-6 small-12 wow slide-in">
			<div class="columns" id="home-stats">
				<?php
				foreach($stats as $stat) {
					echo '<div class="home-stat">';
						echo '<h2><span class="wow number-grow" data-number="'.$stat['number'].'">0</span></h2>';
						echo '<p>'.$stat['text'].'</p>';
					echo '</div>';
				} ?>
			</div>
		</div>
	</div>
</div>

<?php
$district_headline = simple_fields_fieldgroup('district_headline');
$district_images = simple_fields_fieldgroup('district_images');
?>
<div id="districts">
	<div class="row align-center">
		<div class="columns large-10 wow slide-in">
			<h3 class="text-center"><?php echo $district_headline; ?></h3>
		</div>
	</div>
	<div id="district-images" class="wow slide-in">
		<?php foreach ($district_images as $di) {
			$image_src = (!empty($di['image']) ? wp_get_attachment_image_src($di['image'],'medium')[0] : '');
			echo '<div class="district-image">';
			if (!empty($di['url'])) { echo '<a href="'.$di['url'].'" target="_blank">'; }
				echo '<div class="district" style="background-image: url('.$image_src.');"></div>';
			if (!empty($di['url'])) { echo '</a>'; }
			echo '</div>';
		} ?>
	</div>
</div>

<?php
$home_quote_static = simple_fields_fieldgroup('home_quote_static');
?>
<div id="home-quote" class="text-center lazy" style="background-image:url('<?php echo $home_quote_static['image_src']['large'][0]; ?>');">
	<div id="home-quote-slider">
		<?php
		$home_quote = simple_fields_fieldgroup('home_quote');
		for ($i = 0; $i < count($home_quote); $i++) {
			$vimeo_video = get_vimeo_html($home_quote[$i]['vimeo_id'], 1);
			$youtube_video = get_youtube_html($home_quote[$i]['youtube_id'], 1);
			if (!empty($vimeo_video)) {
				$video_ob = $vimeo_video;
			} elseif (!empty($youtube_video)) {
				$video_ob = $youtube_video;
			} else {
				$video_ob = null;
			}
			?>
			<div class="home-quote-container">
				<div class="row">
					<div class="columns">
						<div class="row align-center align-middle wow slide-in">
							<div class="columns small-12 medium-10 large-9">
								<?php
								if (!empty($video_ob['iframe'])) {
									?>
									<a class="home-video-trigger" data-video="<?php echo htmlspecialchars($video_ob['iframe']); ?>" href="#">
										<span class="icon-play"></span>
									</a>
									<?php
								} else {
									?>
									<a class="home-video-trigger invisible" href="#">
										<span class="icon-play"></span>
									</a>
									<?php
								}
								if (!empty($home_quote[$i]['quote'])) {
									echo '<blockquote>'.$home_quote[$i]['quote'].'</blockquote>';
								}
								if (!empty($home_quote[$i]['image'])) {
									$img_src = wp_get_attachment_image_src($home_quote[$i]['image'],'medium')[0];
									if (!empty($home_quote[$i]['name'])) { $home_quote_alt = $home_quote[$i]['name']; } else { $home_quote_alt = ''; }
									echo '<img src="'.$img_src.'" alt="'.$home_quote_alt.'">';
								}
								if (!empty($home_quote[$i]['name'])) {
									echo '<p>';
										echo '<strong>'.$home_quote[$i]['name'].'</strong>';
										if (!empty($home_quote[$i]['title_1'])) {
											echo '<span><strong> | </strong>'.$home_quote[$i]['title_1'].'</span>';
										}
										echo '<br>';
										if (!empty($home_quote[$i]['title_2'])) {
											echo '<span>'.$home_quote[$i]['title_2'].'</span>';
										}
									echo '</p>';
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>



<?php
get_template_part('partials/features');
?>


<?php
$award_headline = simple_fields_fieldgroup('awards_headline');
$award_images = simple_fields_fieldgroup('awards_images');
?>
<div id="awards">
	<div class="row align-center">
		<div class="columns large-10 wow slide-in">
			<h3 class="text-center"><?php echo $award_headline; ?></h3>
		</div>
	</div>
	<div id="awards-images" class="wow slide-in">
		<?php foreach ($award_images as $ai) {
			$image_src = (!empty($ai['image']) ? wp_get_attachment_image_src($ai['image'],'medium')[0] : '');
			echo '<div class="award-image">';
			if (!empty($ai['url'])) {
				echo '<a href="'.$ai['url'].'" target="_blank" class="award" style="background-image: url('.$image_src.');"></a>';
			} else {
				echo '<div class="award" style="background-image: url('.$image_src.');"></div>';
			}
			echo '</div>';
		} ?>
	</div>
</div>

<?php
get_footer();
?>
