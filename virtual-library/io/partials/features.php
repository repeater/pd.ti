<?php
$features = simple_fields_fieldgroup('features');
$features_static = simple_fields_fieldgroup('features_static');
?>
<div id="features">
	<div class="row align-center">
		<div class="columns large-10">
			<h2 class="text-center wow slide-in"><?php echo $features_static['headline']; ?></h2>
			<p class="text-center lead wow slide-in"><?php echo $features_static['lead_1']; ?></p>
			<ul class="row wow slide-in">
				<?php
				foreach ($features as $feature) {
					echo '<li class="columns small-12 medium-6 large-4">';
						echo $feature;
					echo '</li>';
				}
				?>
			</ul>
			<?php
			if (!empty($features_static['lead_2'])) {
				?>
				<h3 class="text-center wow slide-in"><?php echo $features_static['lead_2']; ?></h3>
				<?php
			}
			?>
			<?php
			if (!empty($features_static['cta_text']) && !empty($features_static['cta_url'])) {
				?>
				<div class="text-center">
					<a href="<?php echo $features_static['cta_url']; ?>" class="button wow slide-in">
						<span class="inline-button-icon icon-<?php echo $features_static['cta_icon']['selected_value']; ?>"></span> <?php echo $features_static['cta_text']; ?>
					</a>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
