<?php
/**
 * Template Name: In The News
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
get_template_part('partials/navigation','news');
?>
<h1 class="hide">News</h1>
<div id="news">
	<?php
	$terms = get_terms('news_type');
	foreach ($terms as $term){
		echo '<div class="row vertical-pad align-center">';
		echo '<div class="columns small-12">';
		echo '<h2 class="text-center news-cat-title" id="term-'.$term->term_id.'">';
		if ($term->name == 'News') {
			echo 'In The News';
			$term_class = 'news';
		} else {
			echo $term->name;
			$term_class = 'press';
		}
		echo '</h2>';
		$args = array(
			'post_type' => 'news',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'news_type',
					'field'    => 'slug',
					'terms'    => $term->slug,
				)
			)
		);
		$news_query = new WP_Query( $args );
		$news = $news_query->posts;
		wp_reset_postdata();
		echo '<div class="news-wrap row align-center">';
			for ($i = 0; $i < count($news); $i++) {
			    $post_id = $news[$i]->ID;
			    $title = get_the_title($post_id);
			    $article = simple_fields_fieldgroup('news_articles',$post_id);
				echo '<div class="wow slide-in columns small-12 '.$term_class.'-post">';
				if (!empty($article['url'])) {
					echo '<a href="'.$article['url'].'" target="_blank" class="news">';
				} else {
					echo '<div class="news">';
				}
					echo '<div class="row align-middle">';
						echo '<div class="columns">';
							echo '<h5>'.$title.'</h5>';
						echo '</div>';
						echo '<div class="columns shrink">';
							echo '<span class="icon icon-chevron-right"></span>';
						echo '</div>';
					echo '</div>';
				if (!empty($article['part_title'])) {
					// echo '<hr>';
					// echo '<p>'.$article['part_title'].'</p>';
				}
				echo '</div>';
				if (!empty($article['url'])) {
					echo '</a>';
				} else {
					echo '</div>';
				}
			}
			echo '<a href="#" class="button primary load-more-button '.$term_class.'-more-button">Load More</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

	$press_static = simple_fields_fieldgroup('press_static');
	?>
	<div id="press-contact">
		<div class="row" data-equalizer>
			<div class="columns small-12 medium-6 large-offset-1 large-7 vertical-pad wow slide-in" data-equalizer-watch>
				<h3><?php echo $press_static['contact_heading']; ?></h3>
				<?php echo $press_static['contact_information']; ?>
				<ul>
					<?php
					if (!empty($press_static['linkedin'])) {
						?>
						<li>
							<a href="<?php echo $press_static['linkedin']; ?>" target="_blank"><span class="icon icon-linkedin"></span></a>
						</li>
						<?php
					}
					if (!empty($press_static['twitter'])) {
						?>
						<li>
							<a href="<?php echo $press_static['twitter']; ?>" target="_blank"><span class="icon icon-twitter"></span></a>
						</li>
						<?php
					}
					if (!empty($press_static['facebook'])) {
						?>
						<li>
							<a href="<?php echo $press_static['facebook']; ?>" target="_blank"><span class="icon icon-facebook"></span></a>
						</li>
						<?php
					}
					if (!empty($press_static['instagram'])) {
						?>
						<li>
							<a href="<?php echo $press_static['instagram']; ?>" target="_blank"><span class="icon icon-instagram"></span></a>
						</li>
						<?php
					}
					if (!empty($press_static['pinterest'])) {
						?>
						<li>
							<a href="<?php echo $press_static['pinterest']; ?>" target="_blank"><span class="icon icon-pinterest"></span></a>
						</li>
						<?php
					}
					?>
				</ul>
				<a href="mailto:<?php echo $press_static['email_cta_address']; ?>" class="button white-stroke"><?php echo $press_static['email_cta_text']; ?></a>
			</div>
			<div class="columns small-12 medium-6 large-4 vertical-pad" id="twitter-feed-container" data-equalizer-watch>
				<div id="twitter-feed">
					<h4>Recent Tweets</h4>
					<?php
					echo do_shortcode('[statictweets skin="default" resource="usertimeline" user="ioeducation" list="" query="" id="" count="2" retweets="on" replies="on" ajax="off" show="username,screenname,avatar,time,actions,media"/]');
					?>
					<a href="https://twitter.com/ioeducation" class="button blue" target="_blank"><span class="inline-button-icon icon-twitter"></span>Follow Us</a>
				</div>
			</div>
		</div>
	</div>

	<?php
	$press_leaders = simple_fields_fieldgroup('press_leaders');
	?>
	<div id="leadership" class="vertical-pad">
		<div class="row">
			<div class="columns wow slide-in">
				<h3 class="text-center"><?php echo $press_static['leaders_heading']; ?></h3>
				<h4 class="text-center"><?php echo $press_static['leaders_subheading']; ?></h4>
			</div>
		</div>
		<?php
		echo '<div id="leaders" class="row" data-equalizer>';
			for ($i = 0; $i < count($press_leaders); $i++) {
				$person = $press_leaders[$i];
				$name = (!empty($person['name']) ? $person['name'] : '');
				$title = (!empty($person['title']) ? $person['title'] : '');
				$bio = (!empty($person['bio']) ? $person['bio'] : '');
				$full_bio = (!empty($person['full_bio']['url']) ? $person['full_bio']['url'] : '');
				$twitter = (!empty($person['twitter']) ? $person['twitter'] : '');
				$linkedin = (!empty($person['linkedin']) ? $person['linkedin'] : '');
				$email = (!empty($person['email']) ? $person['email'] : '');
				$image = (!empty($person['image']) ? wp_get_attachment_image_src($person['image']['id'],'medium')[0] : '');
				echo '<div class="medium-6 small-12 large-4 columns">';
					echo '<a
						href="#"
						data-person="'.$i.'"
						data-name="'.$name.'"
						data-title="'.$title.'"
						data-bio="'.htmlspecialchars($bio).'"
						data-full-bio="'.htmlspecialchars($full_bio).'"
						data-twitter="'.htmlspecialchars($twitter).'"
						data-linkedin="'.htmlspecialchars($linkedin).'"
						data-email="'.htmlspecialchars($email).'"
						data-image="'.htmlspecialchars($image).'"
						class="wow slide-in bio-link"
						data-equalizer-watch
						>';
						echo '<div class="bio-image-wrap">';
						if ($image) {
							echo '<div class="bio-image original-image lazy" data-original="'.$image.'"></div>';
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
		echo '</div>';
		?>
	</div>
</div><!-- #news -->
<?php
get_footer();
?>
