<?php
/**
 * Template Name: Solutions
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$solutions_static = simple_fields_fieldgroup('solutions_static');
$solutions_testimonial = simple_fields_fieldgroup('solutions_testimonial');
?>
<h1 class="hide"><?php the_title(); ?></h1>
<div id="solutions-intro" class="vertical-pad">
	<div class="row align-center">
		<div class="columns large-8 medium-10 text-center wow slide-in">
			<?php
			if (!empty($solutions_static['intro_big'])) {
				echo '<h2>'.$solutions_static['intro_big'].'</h2>';
			}
			if (!empty($solutions_static['intro_small'])) {
				echo '<p>'.$solutions_static['intro_small'].'</p>';
			}
			?>
		</div>
	</div>
</div>
<div id="all-in-one">
	<div class="row">
		<div class="columns small-12">
			<div class="row" id="all-in-row" data-equalizer>
			<?php
			$platforms = simple_fields_fieldgroup('platforms');
			for ($i = 0; $i < count($platforms); $i++) {
				echo '<div class="columns small-12 medium-6 large-4 text-center">';
				echo '<div class="tile wow slide-in" style="background-image:url('.$platforms[$i]['background_image']['url'].')" data-equalizer-watch>';
                        echo '<div class="tile-inner">';
                            echo '<h3>'.$platforms[$i]['title'].'</h3>';
                            echo '<p>'.$platforms[$i]['text'].'</p>';
                        echo '</div>';
                        echo '<div class="tile-inner title-only">';
                            echo '<h3>'.$platforms[$i]['title'].'</h3>';
                        echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>
			</div>
		</div>
	</div>
</div>
<div class="vertical-pad">
	<div class="row align-center">
		<div class="columns large-8 medium-10 text-center wow slide-in">
			<?php
			if (!empty($solutions_static['above_tab_title'])) {
				echo '<h2>'.$solutions_static['above_tab_title'].'</h2>';
			}
			if (!empty($solutions_static['above_tab_content'])) {
				echo $solutions_static['above_tab_content'];
			}
			?>
		</div>
	</div>
</div>
<div id="solutions">
	<div class="tab-nav block-tab-nav row" data-equalizer>
		<?php
		for ($i = 1; $i <= 4; $i++) {
			$tab = simple_fields_fieldgroup('tab_platform_'.$i.'_static');
			$tab_images = simple_fields_fieldgroup('tab_images_platform_'.$i);
			$content = '<div class="row align-center wow slide-in">';
				$content .='<div class="columns small-12 medium-9 large-10">';
					if (!empty($tab['tab_right'])) {
						$content .= '<div class="row">';
							$content .= '<div class="columns medium-6 small-12">';
								$content .= $tab['tab_left'];
							$content .= '</div>';
							$content .= '<div class="columns medium-6 small-12">';
								$content .= $tab['tab_right'];
							$content .= '</div>';
						$content .= '</div>';
					} else {
						$content .= $tab['tab_left'];
					}
					if (!empty($tab['tab_bottom'])) {
						$content .= $tab['tab_bottom'];
					}
				$content .='</div>';
				$content .='<div class="columns small-12 medium-3 large-2 text-center">';
				foreach($tab_images as $tab_image) {
					$image_src = wp_get_attachment_image_src($tab_image['image'],'medium')[0];
					$alt_text = $tab_image['alt_text'];
					$content .= '<img src="'.$image_src.'" alt="'.$alt_text.'">';
				}
				$content .='</div>';
			$content .='</div>';
			$icons = array(
				'',
				// 'graduate',
                'security',
				'badge',
				'clock',
				'plus'
			);
			echo '<div class="columns large-3 medium-6 small-12 wow slide-in"><a href="#" data-tab="'.$i.'" data-content="'.htmlspecialchars($content).'" data-small="1" data-medium="2" data-large="4" data-equalizer-watch><h3><span class="icon-'.$icons[$i].'"></span><br>'.$tab['section_heading'].'</h3></a></div>';
		}
		?>
	</div>
</div>
<div class="vertical-pad">
	<div class="row align-center">
		<div class="columns large-8 medium-10 text-center wow slide-in">
			<?php
			if (!empty($solutions_static['below_tab_title'])) {
				echo '<h2>'.$solutions_static['below_tab_title'].'</h2>';
			}
			if (!empty($solutions_static['below_tab_content'])) {
				echo $solutions_static['below_tab_content'];
			}
			?>
		</div>
	</div>
	<div id="soluions-bottom-image" class="wow slidin-in">
		<?php
		$bottom_image = $solutions_static['bottom_image']['image_src']['x_large'][0];
		if (!empty($solutions_static['bottom_image_url'])) { echo '<a href="'.$solutions_static['bottom_image_url'].'">'; }
		echo '<img src="'.$bottom_image.'" class="lazy" alt="Solutions">';
		if (!empty($solutions_static['bottom_image_url'])) { echo '</a>'; }
		?>
	</div>
</div>
<?php
if (!empty($solutions_testimonial)) { ?>
	<div id="solutions-testimonials">
		<div id="solutions-testimonials-slider">
			<?php
			for ($i = 0; $i < count($solutions_testimonial); $i++) {
				?>
				<div class="testimonial">
					<div class="row">
						<div class="columns">
							<div class="row align-center">
								<div class="columns small-10">
									<div class="row">
										<div class="columns small-12 medium-6">
											<div class="wow slide-in">
												<h5 class="text-right"><?php echo $solutions_testimonial[$i]['author']; ?> | <?php echo $solutions_testimonial[$i]['position']; ?></h5>
												<h6 class="text-right"><?php echo $solutions_testimonial[$i]['location']; ?></h6>
												<div class="testimonial-image-wrapper">
													<?php echo $solutions_testimonial[$i]['image']['image']['full']; ?>
												</div>
											</div>
										</div>
										<div class="columns small-12 medium-6">
											<div class="wow slide-in">
												<p class="testimonial-body"><?php echo $solutions_testimonial[$i]['testimonial']; ?></p>
											</div>
										</div>
									</div>
									<?php
									if (!empty($solutions_testimonial[$i]['vimeo_id']) || !empty($solutions_testimonial[$i]['youtube_id']) || !empty($solutions_testimonial[$i]['file_url'])) {
										?>
										<div class="row testimonial-bottom-actions align-center">
											<?php if (!empty($solutions_testimonial[$i]['vimeo_id']) || !empty($solutions_testimonial[$i]['youtube_id'])) {
												?>
												<div class="columns small-12 medium-6">
													<div class="wow slide-in <?php echo (empty($solutions_testimonial[$i]['file_url']) ? 'text-center' : 'text-right') ?>">
														<?php
														$vimeo_video = get_vimeo_html($solutions_testimonial[$i]['vimeo_id'], 1);
														if (!empty($vimeo_video)) {
															$video_ob = get_vimeo_html($solutions_testimonial[$i]['vimeo_id'], 1);
														} else {
															$video_ob = get_youtube_html($solutions_testimonial[$i]['youtube_id'], 1);
														}
														?>
														<a class="solutions-video-trigger" data-video="<?php echo htmlspecialchars($video_ob['iframe']); ?>" href="#">Watch Video Interview <span class="icon-play-button-line"></span></a>
													</div>
												</div>
												<?php
											}
											if (!empty($solutions_testimonial[$i]['file_url'])) {
												?>
												<div class="columns small-12 medium-6">
													<div class="wow slide-in <?php echo ((empty($solutions_testimonial[$i]['vimeo_id']) && empty($solutions_testimonial[$i]['youtube_id'])) ? 'text-center' : '') ?>">
														<a href="<?php echo $solutions_testimonial[$i]['file_url']; ?>" target="_blank">Download Case Study <span class="icon-arrow-down"></span></a>
													</div>
												</div>
												<?php
											}
											?>
										</div>
										<?php
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
}
get_footer();
?>
