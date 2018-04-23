<?php
/**
 * Template Name: Implementation
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$implementation_static = simple_fields_fieldgroup('implementation_static');
$implementation_testimonial = simple_fields_fieldgroup('implementation_testimonial');
?>
<h1 class="hide"><?php the_title(); ?></h1>
<?php if (!empty($implementation_static)) { ?>
	<div class="row vertical-pad align-center">
		<div class="columns small-12 medium-10 large-8 wow slide-in">
			<?php echo $implementation_static['top_content']; ?>
		</div>
	</div>
<?php } ?>
<div id="implementation-points">
	<div class="tab-nav block-tab-nav row" data-equalizer>
		<?php
		for ($i = 1; $i <= 4; $i++) {
			$tab = simple_fields_fieldgroup('tab_implementation_'.$i.'_static');
			$tab_images = simple_fields_fieldgroup('tab_images_implementation_'.$i);
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
				if (!empty($tab['cta_text']) && !empty($tab['cta_url'])) {
					$content .= '<div class="text-center">';
						$content .= '<a href='.$tab['cta_url'].' class="button">';
							$content .= '<span class="inline-button-icon icon-'.$tab['cta_icon']['selected_value'].'"></span>'.$tab['cta_text'];
						$content .= '</a>';
					$content .= '</div>';
				}
			$content .='</div>';
            echo '<div class="columns large-3 medium-6 small-12 wow slide-in"><a href="#" data-tab="'.$i.'" data-content="'.htmlspecialchars($content).'" data-small="1" data-medium="2" data-large="4" data-equalizer-watch><h3>'.$tab['section_heading'].'</h3></a></div>';
		}
		?>
	</div>
</div>
<div class="row vertical-pad-top align-center">
	<div class="columns small-12 medium-10 large-8 wow slide-in text-center">
		<h3><?php echo $implementation_static['bottom_title']; ?></h3>
		<?php echo $implementation_static['bottom_text']; ?>
	</div>
</div>
<div id="implementation-tabs">
	<div class="tab-nav row align-center number-nav" data-equalizer>
		<?php
		for ($i = 1; $i <= 5; $i++) {
			$tab = simple_fields_fieldgroup('tab_implementation_bottom_'.$i.'_static');
			$content = '<div class="row align-center">';
				$content .='<div class="columns small-12 medium-7 large-8 wow slide-in">';
					if (!empty($tab['tab_left'])) {
						$content .= $tab['tab_left'];
					}
					if (!empty($tab['tab_right'])) {
						$content .= $tab['tab_right'];
					}
					if (!empty($tab['tab_bottom'])) {
						$content .= $tab['tab_bottom'];
					}
				$content .='</div>';
			$content .='</div>';
            echo '<div class="columns small-2"><a href="#" data-tab="'.$i.'" data-content="'.htmlspecialchars($content).'" data-small="5" data-medium="5" data-large="5" data-equalizer-watch><span>'.$i.'</span><br>'.$tab['section_heading'].'</a></div>';
		}
		?>
	</div>
</div>
<?php
if (!empty($implementation_testimonial)) { ?>
	<div id="implementation-testimonials">
		<div id="implementation-testimonials-slider">
			<?php
			for ($i = 0; $i < count($implementation_testimonial); $i++) {
				?>
				<div class="testimonial">
					<div class="row">
						<div class="columns">
							<div class="row align-center">
								<div class="columns small-10">
									<div class="row">
										<div class="columns small-12 medium-6">
											<div class="wow slide-in">
												<h5 class="text-left large-text-right"><?php echo $implementation_testimonial[$i]['author']; ?> | <?php echo $implementation_testimonial[$i]['position']; ?></h5>
												<h6 class="text-left large-text-right"><?php echo $implementation_testimonial[$i]['location']; ?></h6>
												<div class="testimonial-image-wrapper">
													<?php echo $implementation_testimonial[$i]['image']['image']['full']; ?>
												</div>
											</div>
										</div>
										<div class="columns small-12 medium-6">
											<div class="wow slide-in">
												<p class="testimonial-body"><?php echo $implementation_testimonial[$i]['testimonial']; ?></p>
											</div>
										</div>
									</div>
									<?php
									if (!empty($implementation_testimonial[$i]['vimeo_id']) || !empty($implementation_testimonial[$i]['youtube_id']) || !empty($implementation_testimonial[$i]['file_url'])) {
										?>
										<div class="row testimonial-bottom-actions align-center">
											<?php if (!empty($implementation_testimonial[$i]['vimeo_id']) || !empty($implementation_testimonial[$i]['youtube_id'])) {
												?>
												<div class="columns small-12 medium-6">
													<div class="wow slide-in <?php echo (empty($implementation_testimonial[$i]['file_url']) ? 'text-center' : 'text-right') ?>">
														<?php
														$vimeo_video = get_vimeo_html($implementation_testimonial[$i]['vimeo_id'], 1);
														if (!empty($vimeo_video)) {
															$video_ob = get_vimeo_html($implementation_testimonial[$i]['vimeo_id'], 1);
														} else {
															$video_ob = get_youtube_html($implementation_testimonial[$i]['youtube_id'], 1);
														}
														?>
														<a class="implementation-video-trigger" data-video="<?php echo htmlspecialchars($video_ob['iframe']); ?>" href="#">Watch Video Interview <span class="icon-play-button-line"></span></a>
													</div>
												</div>
												<?php
											}
											if (!empty($implementation_testimonial[$i]['file_url'])) {
												?>
												<div class="columns small-12 medium-6">
													<div class="wow slide-in <?php echo ((empty($implementation_testimonial[$i]['vimeo_id']) && empty($implementation_testimonial[$i]['youtube_id'])) ? 'text-center' : '') ?>">
														<a href="<?php echo $implementation_testimonial[$i]['file_url']; ?>" target="_blank">Download Case Study <span class="icon-arrow-down"></span></a>
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
