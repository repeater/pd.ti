<?php
/**
 * Adds a new field group
 *ra
 * Usage:
 * simple_fields_register_field_group( string unique_field_group_slug, array field_group_options );
 *
 * Field_group_options:
 *
 * 	array (
 * 		'name' => 'Name of field group',
 * 		'description' => "A short description of the field group",
 * 		'repeatable' => TRUE or FALSE if the field group should be repeatable,
 * 		'fields' => array of fields,
 * 		'deleted' => TRUE or FALSE,
 * 		"gui_view" => "list", // "list" or "table". Table view is a bit more compact.
 * 		"fields" => array(
 * 			"name" => "The name of your field",
 * 			"slug" => "A unique slug for your field",
 * 			"description" => "An optional description for your field",
 * 			"type" => "text", // the type of field. text, textarea, dropdown, file, etc.
 * 			"deleted" => false, // if the field is deleted or not
 * 			"options" => array(
 * 				"enable_extended_return_values" => true
 * 				// options depending on the field type.
 * 				// see below for examples for each field type
 * 			)
 * 		)
 *	),
 *
 *
 * @param string $slug the slug of this field group. must be unique.
 * @param array $new_field_group settings/options for the new group
 * @return array the new field group as an array
 */

simple_fields_register_field_group('redirect',
	array (
		'name' => 'Redirect',
		'description' => 'Redirect this page to another before the headers are sent. This is a 301 redirect. The Redirect Template must be selected for this page.',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'page_redirect',
				'name' => 'Redirect To Internal Page',
				'description' => 'Select a page to redirect to. Leave blank if not an internal page.',
				'type' => 'post',
				'options' => array(
					'enable_extended_return_values' => true,
					'enabled_post_types' => array('page')
				)
			),
            array(
                'slug' => 'custom_page_redirection',
                'name' => 'Redirect To Custom URL',
                'description' => 'If the URL is custom/external, enter it hear and leave the above unselected',
                'type' => 'text'
            )
		)
	)
);


simple_fields_register_field_group('cta_override',
	array (
		'name' => 'CTA Override',
		'description' => 'This will override the default CTA in the footer if at least the title is filled in.',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'cta_title',
				'name' => 'CTA Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_text_1',
				'name' => 'CTA Text 1',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_url_1',
				'name' => 'CTA URL 1',
				'description' => 'option - must be present if corresponding text is',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_icon_1',
				'name' => 'CTA Icon 1',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			),
			array(
				'slug' => 'cta_text_2',
				'name' => 'CTA Text 2',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_url_2',
				'name' => 'CTA URL 2',
				'description' => 'option - must be present if corresponding text is',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_icon_2',
				'name' => 'CTA Icon 2',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			),
			array(
				'slug' => 'cta_background_color',
				'name' => 'CTA Background Color',
				'description' => 'optional - default is blue',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					"values" => array(
						array(
							"num" => 0,
							"value" => "Blue"
						),
						array(
							"num" => 1,
							"value" => "Pink"
						),
						array(
							"num" => 2,
							"value" => "Green"
						),
						array(
							"num" => 3,
							"value" => "Orange"
						),
					)
				)
			)
		)
	)
);


simple_fields_register_field_group('hero',
	array (
		'name' => 'Hero',
		'description' => 'Leave title blank to not show the hero section.',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Background Image',
				'description' => 'optional - will be gradient background without',
				'type' => 'file'
			),
			array(
				'slug' => 'video',
				'name' => 'Video',
				'description' => 'link to mp4 file',
				'type' => 'text'
			),
			array(
				'slug' => 'link_1_text',
				'name' => 'Link 1 Text',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'link_1_url',
				'name' => 'Link 1 URL',
				'description' => 'option - must be present if corresponding text is',
				'type' => 'text'
			),
			array(
				'slug' => 'link_1_icon',
				'name' => 'Link 1 Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			),
			array(
				'slug' => 'link_2_text',
				'name' => 'Link 2 Text',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'link_2_url',
				'name' => 'Link 2 URL',
				'description' => 'option - must be present if corresponding text is',
				'type' => 'text'
			),
			array(
				'slug' => 'link_2_icon',
				'name' => 'Link 2 Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('reading_time',
	array (
		'name' => 'Reading Time',
		'description' => 'User will see this before reading the article. Helps engage the user.',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'reading_time',
				'name' => 'Reading Time',
				'description' => 'example: 5 mins',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('product_item',
	array (
		'name' => 'Product Item',
		'description' => '',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'content_left',
				'name' => 'Content Left',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 1)
			),
			array(
				'slug' => 'content_right',
				'name' => 'Content Right',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 1)
			)
		)
	)
);

simple_fields_register_field_group('product_scroller',
	array (
		'name' => 'Product Scroller',
		'description' => '',
		'repeatable' => 1,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			),
			array(
				'slug' => 'youtube',
				'name' => 'YouTube Embed Code',
				'description' => 'optional. will override the above image',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 0)
			)
		)
	)
);

simple_fields_register_field_group('product_sub_nav_items',
	array (
		'name' => 'Product Sub Nav Items',
		'description' => '',
		'repeatable' => 1,
		"gui_view" => "list", // list | table
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'short_description',
				'name' => 'Short Description',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'product_url',
				'name' => 'Product URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('product_sub_nav_cta',
	array (
		'name' => 'Product Sub Nav CTA',
		'description' => '',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
            array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'cta_text',
				'name' => 'CTA Text',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'cta_url',
				'name' => 'CTA URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('event_sub_nav_cta',
	array (
		'name' => 'Event Sub Nav CTA',
		'description' => '',
		'repeatable' => 0,
		"gui_view" => "list", // list | table
		'fields' => array(
            array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'cta_text',
				'name' => 'CTA Text',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'cta_url',
				'name' => 'CTA URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

function register_tab($name) {
	simple_fields_register_field_group('tab_'.$name,
		array (
			'name' => 'Tab',
			'description' => '',
			'repeatable' => 0,
			'gui_view' => 'list',
			'fields' => array(
				array(
					'slug' => 'section_heading',
					'name' => 'Section Heading',
					'description' => '',
					'type' => 'text'
				),
				array(
					'slug' => 'tab_left',
					'name' => 'Tab Left',
					'type' => 'textarea',
					'type_textarea_options' => array(
						'size_height' => 'large',
						'use_html_editor' => 1
					)
				),
				array(
					'slug' => 'tab_right',
					'name' => 'Tab Right',
					'type' => 'textarea',
					'type_textarea_options' => array(
						'size_height' => 'large',
						'use_html_editor' => 1
					)
				),
				array(
					'slug' => 'tab_bottom',
					'name' => 'Tab Bottom',
					'type' => 'textarea',
					'type_textarea_options' => array(
						'size_height' => 'large',
						'use_html_editor' => 1
					)
				),
				array(
					'slug' => 'cta_text',
					'name' => 'CTA Text',
					'description' => '',
					'type' => 'text'
				),
				array(
					'slug' => 'cta_url',
					'name' => 'CTA URL',
					'description' => '',
					'type' => 'text'
				),
				array(
					'slug' => 'cta_icon',
					'name' => 'CTA Icon',
					'description' => '',
					'type' => 'dropdown',
					'options' => array(
						"enable_multiple" => false,
						'enable_extended_return_values' => true,
						"values" => array(
							array(
								"num" => 0,
								"value" => "none"
							),
							array(
								"num" => 1,
								"value" => "checkmark"
							),
							array(
								"num" => 2,
								"value" => "doc"
							),
							array(
								"num" => 3,
								"value" => "info"
							),
							array(
								"num" => 4,
								"value" => "lock"
							),
							array(
								"num" => 5,
								"value" => "mail"
							),
							array(
								"num" => 6,
								"value" => "network"
							),
							array(
								"num" => 7,
								"value" => "play"
							),
							array(
								"num" => 8,
								"value" => "question"
							),
							array(
								"num" => 9,
								"value" => "cart"
							),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
						)
					)
				)
			)
		)
	);
}
register_tab('platform_1_static');
register_tab('platform_2_static');
register_tab('platform_3_static');
register_tab('platform_4_static');

function register_tab_images($name) {
	simple_fields_register_field_group('tab_images_'.$name,
		array (
			'name' => 'Tab Images',
			'description' => '',
			'repeatable' => 1,
			'gui_view' => 'list',
			'fields' => array(
				array(
					'slug' => 'image',
					'name' => 'Image',
					'description' => '',
					'type' => 'file'
				),
				array(
					'slug' => 'alt_text',
					'name' => 'Alt Text',
					'description' => '',
					'type' => 'text'
				)
			)
		)
	);
}
register_tab_images('platform_1');
register_tab_images('platform_2');
register_tab_images('platform_3');
register_tab_images('platform_4');

simple_fields_register_field_group('platforms',
	array (
		'name' => 'Platforms',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'background_image',
				'name' => 'Background Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			)
		)
	)
);

simple_fields_register_field_group('person',
	array (
		'name' => 'Person',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Job Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bio',
				'name' => 'Bio',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'twitter',
				'name' => 'Twitter URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'linkedin',
				'name' => 'LinkedIn',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			),
			array(
				'slug' => 'graduation_image',
				'name' => 'Graduation Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('company',
	array (
		'name' => 'Company',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'company',
				'name' => 'Company',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'brief',
				'name' => 'Brief',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);


simple_fields_register_field_group('history',
	array (
		'name' => 'History',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);


simple_fields_register_field_group('story',
	array (
		'name' => 'Story',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'story',
				'name' => 'Story',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			)
		)
	)
);

simple_fields_register_field_group('contact',
	array (
		'name' => 'Contact',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'top_line',
				'name' => 'Top Line',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bottom_line',
				'name' => 'Bottom Line',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('leadership_static',
	array (
		'name' => 'Leadership Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'intro',
				'name' => 'Intro Line',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'work_link',
				'name' => 'Work Link',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'work_text',
				'name' => 'Work Text',
				'description' => '',
				'type' => 'text'
			),
		)
	)
);

simple_fields_register_field_group('offices_map',
	array (
		'name' => 'Offices Map',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'offices_map_image',
				'name' => 'Office Map',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('offices',
	array (
		'name' => 'Offices',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'city',
				'name' => 'City',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'address',
				'name' => 'Address',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'latitude',
				'name' => 'Latitude',
				'description' => 'Use http://www.latlong.net/',
				'type' => 'text'
			),
			array(
				'slug' => 'longitude',
				'name' => 'Longitude',
				'description' => 'Use http://www.latlong.net/',
				'type' => 'text'
			),
		)
	)
);


simple_fields_register_field_group('values',
	array (
		'name' => 'Values',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'value_intro',
				'name' => 'Intro',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'value_1_title',
				'name' => 'Value 1 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'value_1_content',
				'name' => 'Value 1 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'value_2_title',
				'name' => 'Value 2 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'value_2_content',
				'name' => 'Value 2 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'value_3_title',
				'name' => 'Value 3 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'value_3_content',
				'name' => 'Value 3 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'value_4_title',
				'name' => 'Value 4 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'value_4_content',
				'name' => 'Value 4 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
		)
	)
);


simple_fields_register_field_group('home_bullets',
	array (
		'name' => 'Home Bullets',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'content',
				'name' => 'Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			)
		)
	)
);

simple_fields_register_field_group('learn_more',
	array (
		'name' => 'Learn More',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'big_number',
				'name' => 'Big Percentage Number',
				'description' => 'whole number between 1-99',
				'type' => 'text'
			),
			array(
				'slug' => 'percentage_text',
				'name' => 'Percentage Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'big_text',
				'name' => 'Big Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'learn_more_content',
				'name' => 'Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'learn_more_button_post',
				'name' => 'Learn More Page',
				'description' => '',
				'type' => 'post',
				'options' => array(
					'enable_extended_return_values' => true,
					'enabled_post_types' => array('post','page','resources')
				)
			),
			array(
				'slug' => 'learn_more_button_text',
				'name' => 'Learn More Button Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'learn_more_button_icon',
				'name' => 'Learn More Button Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('stats_static',
	array (
		'name' => 'Stats Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'lead',
				'name' => 'Lead Text',
				'description' => 'whole number between 1-99',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'stats_map',
				'name' => 'Stats Map',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('stats',
	array (
		'name' => 'Stats',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'number',
				'name' => 'Number',
				'description' => 'whole number no punctuation',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);


simple_fields_register_field_group('districts',
	array (
		'name' => 'Districts',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'location',
				'name' => 'Location',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'latitude',
				'name' => 'Latitude',
				'description' => 'Use http://www.latlong.net/',
				'type' => 'text'
			),
			array(
				'slug' => 'longitude',
				'name' => 'Longitude',
				'description' => 'Use http://www.latlong.net/',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('district_headline',
	array (
		'name' => 'District Headline',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'headline',
				'name' => 'Headline',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('district_images',
	array (
		'name' => 'District Images',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('awards_headline',
	array (
		'name' => 'Awards Headline',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'headline',
				'name' => 'Headline',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('awards_images',
	array (
		'name' => 'Awards Images',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('home_quote_static',
	array (
		'name' => 'Home Quote Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'background_image',
				'name' => 'Background Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			)
		)
	)
);

simple_fields_register_field_group('home_quote',
	array (
		'name' => 'Home Quote',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'quote',
				'name' => 'Quote',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => 'transparent back, white logo, png',
				'type' => 'file'
			),
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'title_1',
				'name' => 'Title 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'title_2',
				'name' => 'Title 2',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);


simple_fields_register_field_group('features_static',
	array (
		'name' => 'Features Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'headline',
				'name' => 'Healine',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'lead_1',
				'name' => 'Lead 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'lead_2',
				'name' => 'Lead 2',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_text',
				'name' => 'CTA Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_url',
				'name' => 'CTA URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_icon',
				'name' => 'CTA Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('features',
	array (
		'name' => 'Features Static',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'feature',
				'name' => 'Feature',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('solutions_static',
	array (
		'name' => 'Solutions Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'intro_big',
				'name' => 'Intro Big',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'intro_small',
				'name' => 'Intro Small',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'intro_all',
				'name' => 'Intro All',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'above_tab_title',
				'name' => 'Above Tabs Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'above_tab_content',
				'name' => 'Above Tabs Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'below_tab_title',
				'name' => 'Below Tabs Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'below_tab_content',
				'name' => 'Below Tabs Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'bottom_image',
				'name' => 'Bottom Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'bottom_image_url',
				'name' => 'Bottom Image URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('solutions_testimonial',
	array (
		'name' => 'Solutions Testimonial',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'testimonial',
				'name' => 'Testimonial',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'author',
				'name' => 'Author/Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'position',
				'name' => 'Title/Position',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'location',
				'name' => 'Company/Location',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'file_url',
				'name' => 'File URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('implementation_static',
	array (
		'name' => 'Implementation Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'top_content',
				'name' => 'Top Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'large',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'bottom_title',
				'name' => 'Bottom Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bottom_text',
				'name' => 'Bottom Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'large',
					'use_html_editor' => 1
				)
			)
		)
	)
);

register_tab('implementation_1_static');
register_tab('implementation_2_static');
register_tab('implementation_3_static');
register_tab('implementation_4_static');
register_tab_images('implementation_1');
register_tab_images('implementation_2');
register_tab_images('implementation_3');
register_tab_images('implementation_4');
register_tab('implementation_bottom_1_static');
register_tab('implementation_bottom_2_static');
register_tab('implementation_bottom_3_static');
register_tab('implementation_bottom_4_static');
register_tab('implementation_bottom_5_static');

simple_fields_register_field_group('implementation_testimonial',
	array (
		'name' => 'Implementation Testimonial',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'testimonial',
				'name' => 'Testimonial',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'author',
				'name' => 'Author/Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'position',
				'name' => 'Title/Position',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'location',
				'name' => 'Company/Location',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'file_url',
				'name' => 'File URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);


simple_fields_register_field_group('approach_static',
	array (
		'name' => 'Approach Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'goal_title',
				'name' => 'Goal Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'approach_title',
				'name' => 'Approach Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'approach_text',
				'name' => 'Approach Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'large',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'learn_more_title',
				'name' => 'Approach Text',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('approach_bullets',
	array (
		'name' => 'Approach Bullets',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'bullet_title',
				'name' => 'Bullet Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bullet_text',
				'name' => 'Bullet Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bullet_url',
				'name' => 'Bullet URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

register_tab('approach_1_static');
register_tab('approach_2_static');
register_tab('approach_3_static');
register_tab('approach_4_static');
register_tab_images('approach_1');
register_tab_images('approach_2');
register_tab_images('approach_3');
register_tab_images('approach_4');

simple_fields_register_field_group('learn_more_bullets',
	array (
		'name' => 'Learn More Bullets',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'bullet_title',
				'name' => 'Bullet Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bullet_text',
				'name' => 'Bullet Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'large',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'bullet_url',
				'name' => 'Bullet URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);


simple_fields_register_field_group('news_articles',
	array (
		'name' => 'News Articles',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'part_title',
				'name' => 'Part Title',
				'description' => 'optional.',
				'type' => 'text'
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => 'required',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('news_cta',
	array (
		'name' => 'News CTA',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'news_contact_title',
				'name' => 'News Contact Title',
				'description' => 'optional.',
				'type' => 'text'
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => 'required',
				'type' => 'text'
			),
			array(
				'slug' => 'button_text',
				'name' => 'Button Text',
				'description' => 'required',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('partners',
	array (
		'name' => 'Partners',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'name',
				'name' => 'Partner Name',
				'description' => 'required',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'description' => 'optional',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'logo',
				'name' => 'Logo',
				'description' => 'optional',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			)
		)
	)
);



simple_fields_register_field_group('investment_static',
	array (
		'name' => 'Investment Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title_1',
				'name' => 'Title 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_1',
				'name' => 'Text 1',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'title_2',
				'name' => 'Title 2',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_2',
				'name' => 'Text 2',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_1_title',
				'name' => 'Product 1 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_1_content',
				'name' => 'Product 1 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_1_url',
				'name' => 'Product 1 Learn More URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_2_title',
				'name' => 'Product 2 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_2_content',
				'name' => 'Product 2 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_2_url',
				'name' => 'Product 2 Learn More URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_3_title',
				'name' => 'Product 3 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_3_content',
				'name' => 'Product 3 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_3_url',
				'name' => 'Product 3 Learn More URL',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'product_4_title',
				'name' => 'Product 4 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_4_content',
				'name' => 'Product 4 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_4_url',
				'name' => 'Product 4 Learn More URL',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'product_5_title',
				'name' => 'Product 5 Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'product_5_content',
				'name' => 'Product 5 Content',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'product_5_url',
				'name' => 'Product 5 Learn More URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'title_3',
				'name' => 'Title 3',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_3',
				'name' => 'Text 3',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			)
		)
	)
);

// careers
simple_fields_register_field_group('careers_static',
	array (
		'name' => 'Careers Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title_1',
				'name' => 'Title 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_1',
				'name' => 'Text 1',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
            array(
				'slug' => 'jobs_heading',
				'name' => 'Jobs Heading',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'values_heading',
				'name' => 'Values Heading',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'benefits_heading',
				'name' => 'Benefits Heading',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'testimonials_heading',
				'name' => 'Testimonials Heading',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('jobs',
	array (
		'name' => 'Jobs',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
            array(
				'slug' => 'job_title_short',
				'name' => 'Job Title Short',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'job_title',
				'name' => 'Job Title',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'location',
				'name' => 'Location',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'industry',
				'name' => 'Industry',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'employment_type',
				'name' => 'Employment type',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'experience',
				'name' => 'Experience',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'job_function',
				'name' => 'Job function',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'job_description',
				'name' => 'Job description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'large',
					'use_html_editor' => 1
				)
			),
            array(
				'slug' => 'job_url',
				'name' => 'Job URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_icon',
				'name' => 'CTA Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('careers_values',
	array (
		'name' => 'Careers Values',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'heading',
				'name' => 'Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			)
		)
	)
);

simple_fields_register_field_group('careers_benefits',
	array (
		'name' => 'Careers Benefits',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'heading',
				'name' => 'Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'background_image',
				'name' => 'Background image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			)
		)
	)
);

simple_fields_register_field_group('careers_testimonials',
	array (
		'name' => 'Careers Testimonials',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'testimonial',
				'name' => 'Testimonial',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
            array(
				'slug' => 'job',
				'name' => 'Job',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'location',
				'name' => 'Location',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

// integration
simple_fields_register_field_group('integration_post_hero',
	array (
		'name' => 'Integration Post-Hero',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			)
		)
	)
);

simple_fields_register_field_group('integration_data',
	array (
		'name' => 'Integration Data',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'logo',
				'name' => 'Logo',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'url',
				'name' => 'URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('integration_pre_footer',
	array (
		'name' => 'Integration Pre-footer',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'text_2',
				'name' => 'Text 2',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'background_image',
				'name' => 'background image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			)
		)
	)
);

// products
simple_fields_register_field_group('products_static',
	array (
		'name' => 'Products Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title_1',
				'name' => 'Title 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_1',
				'name' => 'Text 1',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'student_title',
				'name' => 'Student title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'educator_title',
				'name' => 'Educator title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'operations_title',
				'name' => 'Operations title',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('product_descriptions',
	array (
		'name' => 'Product Descriptions',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'student_products_text',
				'name' => 'Student Products Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'educator_products_text',
				'name' => 'Educator Products Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'operations_products_text',
				'name' => 'Operations Products Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 1
				)
			)
		)
	)
);

simple_fields_register_field_group('student_products',
	array (
		'name' => 'Student Products',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'short_description',
				'name' => 'Short description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'button_url',
				'name' => 'Button URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('educator_products',
	array (
		'name' => 'Educator Products',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'short_description',
				'name' => 'Short description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'button_url',
				'name' => 'Button URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('operations_products',
	array (
		'name' => 'Operations Products',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'short_description',
				'name' => 'Short description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'button_url',
				'name' => 'Button URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

// product
simple_fields_register_field_group('product_static',
	array (
		'name' => 'Product Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'hero_product_image',
				'name' => 'Hero Product Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'title_1',
				'name' => 'Title 1',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text_1',
				'name' => 'Text 1',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'additional_feature_background_image',
				'name' => 'Additional feature background image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'additional_features_heading',
				'name' => 'Additional Features Heading',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('product_benefits',
	array (
		'name' => 'Product Benefits',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'description',
				'name' => 'Description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'icon',
				'name' => 'Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('product_benefits_static',
	array (
		'name' => 'Product Benefits Static',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'type',
				'name' => 'Type',
				'type' => 'radiobuttons',
				'options' => array(
					"values" => array(
						array(
							"num" => 0,
							"value" => "Link"
						),
						array(
							"num" => 1,
							"value" => "File"
						),
						array(
							"num" => 2,
							"value" => "Video"
						),
					 )
				)
			),
			array(
				'slug' => 'cta_title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_url',
				'name' => 'URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'file_url',
				'name' => 'File URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '(only one video ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '(only one video ID should be used)',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('product_features',
	array (
		'name' => 'Product Features',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'heading',
				'name' => 'Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'feature_media_group_id',
				'name' => 'Feature media Group Id',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'button_1_text',
				'name' => 'Button 1 Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'button_1_url',
				'name' => 'Button 1 URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'button_1_icon',
				'name' => 'Button 1 Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			),
			array(
				'slug' => 'button_2_text',
				'name' => 'Button 2 Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'button_2_url',
				'name' => 'Button 2 URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'button_2_icon',
				'name' => 'Button 2 Icon',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					'enable_extended_return_values' => true,
					"values" => array(
						array(
							"num" => 0,
							"value" => "none"
						),
						array(
							"num" => 1,
							"value" => "checkmark"
						),
						array(
							"num" => 2,
							"value" => "doc"
						),
						array(
							"num" => 3,
							"value" => "info"
						),
						array(
							"num" => 4,
							"value" => "lock"
						),
						array(
							"num" => 5,
							"value" => "mail"
						),
						array(
							"num" => 6,
							"value" => "network"
						),
						array(
							"num" => 7,
							"value" => "play"
						),
						array(
							"num" => 8,
							"value" => "question"
						),
						array(
							"num" => 9,
							"value" => "cart"
						),
						array(
							"num" => 10,
							"value" => "plug2"
						),
						array(
							"num" => 11,
							"value" => "mixer"
						),
						array(
							"num" => 12,
							"value" => "contact-card"
						),
						array(
							"num" => 13,
							"value" => "phone"
						)
					)
				)
			)
		)
	)
);

simple_fields_register_field_group('product_feature_media',
	array (
		'name' => 'Product Feature media',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'group_id',
				'name' => 'Group Id',
				'description' => 'needs to match ID in Product Features',
				'type' => 'text'
			),
			array(
				'slug' => 'feature_image',
				'name' => 'Feature Image',
				'description' => '',
				'repeatable' => 1,
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'embedded_video',
				'name' => 'Embedded Video',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			)
		)
	)
);

simple_fields_register_field_group('product_additional_features',
	array (
		'name' => 'Product Additional Features',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'heading',
				'name' => 'Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'short_description',
				'name' => 'Short description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 1
				)
			)
		)
	)
);

simple_fields_register_field_group('product_testimonial',
	array (
		'name' => 'Product Testimonial',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'testimonial',
				'name' => 'Testimonial',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'author',
				'name' => 'Author/Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'position',
				'name' => 'Title/Position',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'location',
				'name' => 'Company/Location',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '(only one ID should be used)',
				'type' => 'text'
			),
			array(
				'slug' => 'file_url',
				'name' => 'File URL',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

// expo
simple_fields_register_field_group('expo_static',
	array (
		'name' => 'Expo Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'intro_heading',
				'name' => 'Intro Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'intro_description',
				'name' => 'Intro Description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'intro_image',
				'name' => 'Intro Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'why_heading',
				'name' => 'Why Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'speaker_heading',
				'name' => 'Speaker Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'schedule_heading',
				'name' => 'Schedule Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'schedule_image',
				'name' => 'Schedule Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true,
				)
			),
			array(
				'slug' => 'testimonials_heading',
				'name' => 'Testimonials Heading',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('expo_whys',
	array (
		'name' => 'Expo Whys',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'heading',
				'name' => 'Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'text',
				'name' => 'Text',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			)
		)
	)
);

simple_fields_register_field_group('speakers',
	array (
		'name' => 'Speakers',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'title',
				'name' => 'Job Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bio',
				'name' => 'Bio',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'twitter',
				'name' => 'Twitter URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'linkedin',
				'name' => 'LinkedIn',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file'
			)
		)
	)
);

simple_fields_register_field_group('expo_sessions_list',
	array (
		'name' => 'Expo Sessions List',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'start_time',
				'name' => 'Start Time',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'end_time',
				'name' => 'End Time',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'session_type',
				'name' => 'Session Type',
				'type' => 'radiobuttons',
				'options' => array(
					'enable_extended_return_values' => true,
					'values' => array(
						array(
							'num' => 0,
							'value' => 'Main Session'
						),
						array(
							'num' => 1,
							'value' => 'Breakout Session'
						),
						array(
							'num' => 2,
							'value' => 'Break',
							'checked' => true
						)
					 )
				)
			),
		)
	)
);

simple_fields_register_field_group('expo_session_agendas',
	array (
		'name' => 'Expo Session Agendas',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'session_title',
				'name' => 'Session Title',
				'description' => 'This needs to match an inputted session title from the session\'s list to display correctly.',
				'type' => 'text'
			),
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'speaker',
				'name' => 'Speaker',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_text',
				'name' => 'CTA Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'cta_link',
				'name' => 'CTA Link',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('expo_testimonials',
	array (
		'name' => 'Expo Testimonials',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'testimonial',
				'name' => 'Testimonial',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
            array(
				'slug' => 'job',
				'name' => 'Job',
				'description' => '',
				'type' => 'text'
			),
            array(
				'slug' => 'location',
				'name' => 'Location',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_statics',
	array (
		'name' => 'Media Statics',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'documents_heading',
				'name' => 'Documents Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'logos_heading',
				'name' => 'Logos Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'photos_heading',
				'name' => 'Photos Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'videos_heading',
				'name' => 'Videos Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'faq_heading',
				'name' => 'FAQ Heading',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_documents',
	array (
		'name' => 'Media Documents',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'document_file',
				'name' => 'Document File',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'document_name',
				'name' => 'Document Name',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_logos',
	array (
		'name' => 'Media Logos',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'color',
				'name' => 'Color',
				'description' => '(must include full color logo or black logo)',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'black',
				'name' => 'Black',
				'description' => '(must include full color logo or black logo)',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'white',
				'name' => 'White',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			)
		)
	)
);

simple_fields_register_field_group('media_photo_categories',
	array (
		'name' => 'Media Photo Categories',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'id',
				'name' => 'ID',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_photos',
	array (
		'name' => 'Media Photos',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'file',
				'name' => 'File',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'category_id',
				'name' => 'Category ID',
				'description' => '(must match an ID in media photo categories)',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_video_categories',
	array (
		'name' => 'Media Video Categories',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'id',
				'name' => 'ID',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_videos',
	array (
		'name' => 'Media Videos',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'thumbnail',
				'name' => 'Thumnail',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'small',
					'use_html_editor' => 0
				)
			),
			array(
				'slug' => 'category_id',
				'name' => 'Category ID',
				'description' => '(must match an ID in media video categories)',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('media_faq',
	array (
		'name' => 'Media FAQ',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'question',
				'name' => 'Question',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'answer',
				'name' => 'Answer',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			)
		)
	)
);

simple_fields_register_field_group('press_leaders',
	array (
		'name' => 'Press Leaders',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'name',
				'name' => 'Name',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'title',
				'name' => 'Job Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'bio',
				'name' => 'Bio',
				'type' => 'textarea',
				'type_textarea_options' => array(
					'size_height' => 'medium',
					'use_html_editor' => 1
				)
			),
			array(
				'slug' => 'full_bio',
				'name' => 'Full Bio',
				'description' => 'optional',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'twitter',
				'name' => 'Twitter URL',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'linkedin',
				'name' => 'LinkedIn',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'email',
				'name' => 'Email',
				'description' => 'optional',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('press_static',
	array (
		'name' => 'Press Static',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'contact_heading',
				'name' => 'Contact Heading',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'contact_information',
				'name' => 'Contact Information',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 1)
			),
			array(
				'slug' => 'linkedin',
				'name' => 'Linkedin',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'twitter',
				'name' => 'Twitter',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'facebook',
				'name' => 'Facebook',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'instagram',
				'name' => 'Instagram',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'pinterest',
				'name' => 'Pinterest',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'email_cta_text',
				'name' => 'Email CTA Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'email_cta_address',
				'name' => 'Email CTA Address',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('timeline_events',
	array (
		'name' => 'Timeline Events',
		'description' => '',
		'repeatable' => 1,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'title',
				'name' => 'Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'date',
				'name' => 'Date',
				'description' => '',
				'type' => 'date'
			),
			array(
				'slug' => 'time',
				'name' => 'Time',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'location',
				'name' => 'Location',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'description',
				'name' => 'Description',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 1)
			),
			array(
				'slug' => 'learn_more_url',
				'name' => 'Learn More URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'register_url',
				'name' => 'Register URL',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'type',
				'name' => 'Type',
				'description' => '',
				'type' => 'dropdown',
				'options' => array(
					'enable_multiple' => false,
					'enable_extended_return_values' => true,
					'values' => array(
						array(
							"num" => 0,
							"value" => "Event"
						),
						array(
							"num" => 1,
							"value" => "Webinar"
						),
						array(
							"num" => 2,
							"value" => "Training"
						),
						array(
							"num" => 3,
							"value" => "User conference"
						),
					)
				)
			),
			array(
				'slug' => 'image',
				'name' => 'Image',
				'description' => '',
				'type' => 'file',
				'options' => array(
					'enable_extended_return_values' => true
	 			)
			),
			array(
				'slug' => 'vimeo_id',
				'name' => 'Vimeo ID',
				'description' => 'optional',
				'type' => 'text'
			),
			array(
				'slug' => 'youtube_id',
				'name' => 'Youtube ID',
				'description' => 'optional',
				'type' => 'text'
			)
		)
	)
);

simple_fields_register_field_group('registration',
	array (
		'name' => 'Registration',
		'description' => '',
		'repeatable' => 0,
		'gui_view' => 'list',
		'fields' => array(
			array(
				'slug' => 'subheading',
				'name' => 'Subheading',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('size_height' => 'small', 'use_html_editor' => 1)
			),
			array(
				'slug' => 'form_title',
				'name' => 'Form Title',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'form_disclaimer',
				'name' => 'Form Disclaimer',
				'description' => '',
				'type' => 'textarea',
				'type_textarea_options' => array('size_height' => 'small', 'use_html_editor' => 1)
			),
			array(
				'slug' => 'signup_button_text',
				'name' => 'Signup Button Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'signin_button_text',
				'name' => 'Signin Button Text',
				'description' => '',
				'type' => 'text'
			),
			array(
				'slug' => 'support_text',
				'name' => 'Support Text',
				'description' => '',
				'type' => 'text'
			)
		)
	)
);
