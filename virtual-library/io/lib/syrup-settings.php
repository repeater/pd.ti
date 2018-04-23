<?php
add_action( 'admin_menu', 'syrup_add_admin_menu' );
add_action( 'admin_init', 'syrup_settings_init' );


function syrup_add_admin_menu(  ) {

	add_options_page( 'Syrup Theme Options', 'Syrup Theme Options', 'manage_options', 'syrup', 'syrup_options_page' );

}


function syrup_settings_init(  ) {

	register_setting( 'pluginPage', 'syrup_settings' );


    // Social
	add_settings_section(
		'syrup_pluginPage_social',
		__( 'Social Media Links', 'syrup' ),
		'syrup_social_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'syrup_settings_twitter',
		__( 'Twitter', 'syrup' ),
		'syrup_settings_twitter_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

	add_settings_field(
		'syrup_settings_facebook',
		__( 'Facebook', 'syrup' ),
		'syrup_settings_facebook_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

    add_settings_field(
		'syrup_settings_linkedin',
		__( 'LinkedIn', 'syrup' ),
		'syrup_settings_linkedin_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

	add_settings_field(
		'syrup_settings_googleplus',
		__( 'Google Plus', 'syrup' ),
		'syrup_settings_googleplus_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

    add_settings_field(
		'syrup_settings_instagram',
		__( 'Instagram', 'syrup' ),
		'syrup_settings_instagram_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

    add_settings_field(
		'syrup_settings_pinterest',
		__( 'Pinterest', 'syrup' ),
		'syrup_settings_pinterest_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

	add_settings_field(
		'syrup_settings_vimeo',
		__( 'Vimeo', 'syrup' ),
		'syrup_settings_vimeo_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

	add_settings_field(
		'syrup_settings_youtube',
		__( 'Youtube', 'syrup' ),
		'syrup_settings_youtube_render',
		'pluginPage',
		'syrup_pluginPage_social'
	);

    // Footer
	add_settings_section(
		'syrup_pluginPage_footer',
		__( 'Footer', 'syrup' ),
		'syrup_footer_section_callback',
		'pluginPage'
	);

    add_settings_field(
		'syrup_settings_phonedisplay',
		__( 'Phone Display', 'syrup' ),
		'syrup_settings_phonedisplay_render',
		'pluginPage',
		'syrup_pluginPage_footer'
	);

    add_settings_field(
		'syrup_settings_phonelink',
		__( 'Phone Link', 'syrup' ),
		'syrup_settings_phonelink_render',
		'pluginPage',
		'syrup_pluginPage_footer'
	);

    add_settings_field(
		'syrup_settings_footeremail',
		__( 'Footer Email Address', 'syrup' ),
		'syrup_settings_footeremail_render',
		'pluginPage',
		'syrup_pluginPage_footer'
	);

    // Default CTA
	add_settings_section(
		'syrup_pluginPage_cta',
		__( 'Default CTA', 'syrup' ),
		'syrup_cta_section_callback',
		'pluginPage'
	);

    add_settings_field(
		'syrup_settings_cta_title',
		__( 'Title', 'syrup' ),
		'syrup_settings_cta_title_render',
		'pluginPage',
		'syrup_pluginPage_cta'
	);

    add_settings_field(
		'syrup_settings_cta_link_text_1',
		__( 'Link 1 Text', 'syrup' ),
		'syrup_settings_cta_link_text_1_render',
		'pluginPage',
		'syrup_pluginPage_cta'
	);

    add_settings_field(
		'syrup_settings_cta_link_url_1',
		__( 'Link 1 URL', 'syrup' ),
		'syrup_settings_cta_link_url_1_render',
		'pluginPage',
		'syrup_pluginPage_cta'
	);

    add_settings_field(
		'syrup_settings_cta_link_text_2',
		__( 'Link 2 Text', 'syrup' ),
		'syrup_settings_cta_link_text_2_render',
		'pluginPage',
		'syrup_pluginPage_cta'
	);

    add_settings_field(
		'syrup_settings_cta_link_url_2',
		__( 'Link 2 URL', 'syrup' ),
		'syrup_settings_cta_link_url_2_render',
		'pluginPage',
		'syrup_pluginPage_cta'
	);

	// Default CTA
	add_settings_section(
		'syrup_pluginPage_scripts',
		__( 'Site Scripts', 'syrup' ),
		'syrup_cta_scripts_callback',
		'pluginPage'
	);

    add_settings_field(
		'syrup_settings_scripts',
		__( 'Scripts', 'syrup' ),
		'syrup_settings_scripts_render',
		'pluginPage',
		'syrup_pluginPage_scripts'
	);
}

// Social
function syrup_settings_twitter_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_twitter']) ? $options['syrup_settings_twitter'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_twitter]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}


function syrup_settings_facebook_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_facebook']) ? $options['syrup_settings_facebook'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_facebook]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_linkedin_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_linkedin']) ? $options['syrup_settings_linkedin'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_linkedin]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_googleplus_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_googleplus']) ? $options['syrup_settings_googleplus'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_googleplus]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_instagram_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_instagram']) ? $options['syrup_settings_instagram'] : '');
    ?>
	<input type='text' name='syrup_settings[syrup_settings_instagram]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_pinterest_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_pinterest']) ? $options['syrup_settings_pinterest'] : '');
    ?>
	<input type='text' name='syrup_settings[syrup_settings_pinterest]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_vimeo_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_vimeo']) ? $options['syrup_settings_vimeo'] : '');
    ?>
	<input type='text' name='syrup_settings[syrup_settings_vimeo]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

function syrup_settings_youtube_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_youtube']) ? $options['syrup_settings_youtube'] : '');
    ?>
	<input type='text' name='syrup_settings[syrup_settings_youtube]' value='<?php echo $option_value; ?>' placeholder='full url'>
	<?php

}

// Footer
function syrup_settings_phonedisplay_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_phonedisplay']) ? $options['syrup_settings_phonedisplay'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_phonedisplay]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_phonelink_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_phonelink']) ? $options['syrup_settings_phonelink'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_phonelink]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_footeremail_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_footeremail']) ? $options['syrup_settings_footeremail'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_footeremail]' value='<?php echo $option_value; ?>'>
	<?php

}

// Default CTA
function syrup_settings_cta_title_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_cta_title']) ? $options['syrup_settings_cta_title'] : '');
	?>
    <textarea columns="40" rows="6" name='syrup_settings[syrup_settings_cta_title]'><?php echo $option_value; ?></textarea>
	<?php

}

function syrup_settings_cta_link_text_1_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_cta_link_text_1']) ? $options['syrup_settings_cta_link_text_1'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_cta_link_text_1]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_cta_link_url_1_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_cta_link_url_1']) ? $options['syrup_settings_cta_link_url_1'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_cta_link_url_1]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_cta_link_text_2_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_cta_link_text_2']) ? $options['syrup_settings_cta_link_text_2'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_cta_link_text_2]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_cta_link_url_2_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_cta_link_url_2']) ? $options['syrup_settings_cta_link_url_2'] : '');
	?>
	<input type='text' name='syrup_settings[syrup_settings_cta_link_url_2]' value='<?php echo $option_value; ?>'>
	<?php

}

function syrup_settings_scripts_render(  ) {

	$options = get_option( 'syrup_settings' );
    $option_value = (!empty($options['syrup_settings_scripts']) ? $options['syrup_settings_scripts'] : '');
	?>
	<textarea style="width:600px;max-width:100%;" rows="20" name='syrup_settings[syrup_settings_scripts]'><?php echo $option_value; ?></textarea>
	<?php

}

/*

function syrup_checkbox_field_5_render(  ) {

	$options = get_option( 'syrup_settings' );
	?>
	<input type='checkbox' name='syrup_settings[syrup_checkbox_field_5]' <?php checked( $options['syrup_checkbox_field_5'], 1 ); ?> value='1'>
	<?php

}


function syrup_radio_field_6_render(  ) {

	$options = get_option( 'syrup_settings' );
	?>
	<input type='radio' name='syrup_settings[syrup_radio_field_6]' <?php checked( $options['syrup_radio_field_6'], 1 ); ?> value='1'>
	<?php

}


function syrup_textarea_field_7_render(  ) {

	$options = get_option( 'syrup_settings' );
	?>
	<textarea cols='40' rows='5' name='syrup_settings[syrup_textarea_field_7]'>
		<?php echo $options['syrup_textarea_field_7']; ?>
 	</textarea>
	<?php

}


function syrup_select_field_8_render(  ) {

	$options = get_option( 'syrup_settings' );
	?>
	<select name='syrup_settings[syrup_select_field_8]'>
		<option value='1' <?php selected( $options['syrup_select_field_8'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['syrup_select_field_8'], 2 ); ?>>Option 2</option>
	</select>

<?php

}

*/

function syrup_social_section_callback(  ) {

	echo __( 'Each of these is optional.', 'syrup' );

}

function syrup_footer_section_callback(  ) {

	echo __( '', 'syrup' );

}

function syrup_cta_section_callback(  ) {

	echo __( 'The title, first link text and url are required.', 'syrup' );

}

function syrup_cta_scripts_callback(  ) {

	echo __( 'These are loaded in wp_footer', 'syrup' );

}

function syrup_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Syrup Theme Options</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>
