<?php
/**
 * Template Name: Approach
 *
 * @package WordPress
 * @subpackage syrup
 */
// echo '<pre>';
// print_r($goals);
// echo '</pre>';
get_header();
$approach_static = simple_fields_fieldgroup('approach_static');
?>
<div id="goals">
	<div class="row align-center">
		<div class="columns large-10 medium-12 small-12 wow slide-in">
			<h2 class="text-center"><?php echo $approach_static['goal_title']; ?></h2>
			<div class="row align-center">
				<?php
				$approach_icons = array(
					'graduate',
					'badge',
					'clock'
				);
				$goals = simple_fields_fieldgroup('approach_bullets');
				for ($i = 0; $i < count($goals); $i++) {
					$goal_title = (!empty($goals[$i]['bullet_title']) ? $goals[$i]['bullet_title'] : '');
					$goal_text = (!empty($goals[$i]['bullet_text']) ? $goals[$i]['bullet_text'] : '');
					$goal_url = (!empty($goals[$i]['bullet_url']) ? $goals[$i]['bullet_url'] : '');
					echo '<div class="columns medium-4 small-12 text-center">';
						echo '<a href="'.$goal_url.'" class="goal">';
							echo '<span class="icon-'.$approach_icons[$i].'"></span>';
							echo '<h3>'.$goal_title.'</h3>';
							echo '<p>'.$goal_text.'</p>';
						echo '</a>';
					echo '</div>';
				} ?>
			</div>
			<?php
			$story = simple_fields_value('story');
			if (!empty($story)) {
				echo $story;
			}
			?>
		</div>
	</div>
</div>

<div id="approach" class="vertical-pad">
	<div class="row align-center">
		<div class="columns medium-10 small-12 text-center wow slide-in">
			<h2><?php echo $approach_static['approach_title']; ?></h2>
			<?php echo $approach_static['approach_text']; ?>
		</div>
	</div>
	<div class="tab-nav row number-nav" data-equalizer>
		<?php
		$tab_approach_icons = array(
			'',
			'recycle',
			'download',
			'graph',
			'direction'
		);
		for ($i = 1; $i <= 4; $i++) {
			$tab = simple_fields_fieldgroup('tab_approach_'.$i.'_static');
			$tab_images = simple_fields_fieldgroup('tab_images_approach_'.$i);
			$content = '<div class="row align-middle">';
				$content .='<div class="columns small-12 medium-5 large-4 text-center wow slide-in">';
				$content .= '<span class="tab-approach-icon icon-'.$tab_approach_icons[$i].'"></span>';
				$content .='</div>';
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
					// generate logos
					if ($i == 1) {
						$content .= '<div class="row align-middle">';
							$content .= '<div class="column">';
								$content .= '<a class="tab-logo" href="/product/classroom">';
									$content .= file_get_contents(get_template_directory() .'/partials/classroom-logo-white.php');
								$content .= '</a>';
							$content .= '</div>';
							$content .= '<div class="column">';
								$content .= '<a class="tab-logo" href="/product/assessment">';
									$content .= file_get_contents(get_template_directory() .'/partials/assessment-logo-white.php');
								$content .= '</a>';
							$content .= '</div>';
							$content .= '<div class="column">';
								$content .= '<a class="tab-logo" href="/product/pals">';
									$content .= file_get_contents(get_template_directory() .'/partials/pals-logo-white.php');
								$content .= '</a>';
							$content .= '</div>';
							$content .= '<div class="column">';
								$content .= '<a class="tab-logo" href="/product/pupilpath">';
									$content .= file_get_contents(get_template_directory() .'/partials/pupil-path-logo-white.php');
								$content .= '</a>';
							$content .= '</div>';
						$content .= '</div>';
					} elseif ($i == 3) {
						$content .= '<div class="row align-middle">';
							$content .= '<div class="column tab-logo-column">';
								$content .= '<a class="tab-logo" href="/product/insights">';
									$content .= file_get_contents(get_template_directory() .'/partials/insights-logo-white.php');
								$content .= '</a>';
							$content .= '</div>';
						$content .= '</div>';
					}
				$content .='</div>';
			$content .='</div>';
			echo '<div class="columns small-3"><a href="#" data-tab="'.$i.'" data-content="'.htmlspecialchars($content).'" data-small="4" data-medium="4" data-large="4" data-equalizer-watch><span>'.$i.'</span><br>'.$tab['section_heading'].'</a></div>';
		}
		?>
	</div>
</div>
<?php get_template_part('partials/features'); ?>
<div class="row align-center vertical-pad">
	<div class="columns large-8 medium-10 small-12 text-center wow slide-in">
		<h2><?php echo $approach_static['learn_more_title']; ?></h2>
	</div>
</div>
<div id="learn-more-bullets">
	<div class="row align-center" data-equalizer>
		<?php
		$more_bullets = simple_fields_fieldgroup('learn_more_bullets');
		for ($i = 0; $i < count($more_bullets); $i++) {
			$more_title = (!empty($more_bullets[$i]['bullet_title']) ? $more_bullets[$i]['bullet_title'] : '');
			$more_text = (!empty($more_bullets[$i]['bullet_text']) ? $more_bullets[$i]['bullet_text'] : '');
			$more_url = (!empty($more_bullets[$i]['bullet_url']) ? $more_bullets[$i]['bullet_url'] : '');
			echo '<div class="columns large-3 medium-6 small-12 wow slide-in">';
			echo '<div class="learn-more">';
				echo '<div class="learn-more-in" data-equalizer-watch>';
					echo '<h3>'.$more_title.'</h3>';
					echo $more_text;
				echo '</div>';
				echo '<div class="more-link"><a href="'.$more_url.'" class="button expand">Learn More</a></div>';
			echo '</div>';
			echo '</div>';
		} ?>
	</div>
</div>

<?php
get_footer();
?>
