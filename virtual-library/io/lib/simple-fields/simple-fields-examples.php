<?php

// Big example of simple_fields_register_field_group()

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
simple_fields_register_field_group('test',
	array (
		'name' => 'Test field group',
		'description' => "Test field description",
		'repeatable' => 1,
		"gui_view" => "table", // list | table
		'fields' => array(
			array(
				'slug' => "my_text_field_slug",
				'name' => 'Test text',
				'description' => 'Text description',
				'type' => 'text'
			),
			array(
				'slug' => "my_textarea_field_slug",
				'name' => 'Test textarea',
				'description' => 'Textarea description',
				'type' => 'textarea',
				'type_textarea_options' => array('use_html_editor' => 1)
			),
			array(
				'slug' => "my_checkbox_field_slug",
				'name' => 'Test checkbox',
				'description' => 'Checkbox description',
				'type' => 'checkbox',
				'type_checkbox_options' => array('checked_by_default' => 1)
			),
			array(
				'slug' => "my_radiobutton_field_slug",
				'name' => 'Test radiobutton',
				'description' => 'Radiobutton description',
				'type' => 'radiobuttons',
				'options' => array(
					"values" => array(
						array(
							"num" => 0,
							"value" => "First value in the dropdown",
							"checked" => true, // this will be the default checked radiobutton
						),
						array(
							"num" => 1,
							"value" => "Second value"
						)
					)
				)
			),
			array(
				'slug' => "my_dropdown_field_slug",
				'name' => 'Test dropdown',
				'description' => 'Dropdown description',
				'type' => 'dropdown',
				'options' => array(
					"enable_multiple" => false,
					"values" => array(
						array(
							"num" => 0,
							"value" => "First value in the dropdown"
						),
						array(
							"num" => 1,
							"value" => "Second value"
						)
					)
				)
			),
			array(
				'slug' => "my_file_field_slug",
				'name' => 'Test file',
				'description' => 'File description',
				'type' => 'file'
			),
			array(
				'slug' => "my_post_field_slug",
				'name' => 'Test post',
				'description' => 'Post description',
				'type' => 'post',
				'options' => array(
					"enable_extended_return_values" => true,
					"enabled_post_types" => array("post")
				)
			),
			array(
				'slug' => "my_taxonomy_field_slug",
				'name' => 'Test taxonomy',
				'description' => 'Taxonomy description',
				'type' => 'taxonomy',
				'options' => array(
					"enable_extended_return_values" => true,
					"enabled_taxonomies" => array("category")
				)
			),
			array(
				'slug' => "my_taxonomyterm_field_slug",
				'name' => 'Test taxonomy term',
				'description' => 'Taxonomy term description',
				'type' => 'taxonomyterm',
				'options' => array(
					"enable_extended_return_values" => true,
					"enabled_taxonomy" => "category"
				)
			),
			array(
				'slug' => "my_color_field_slug",
				'name' => 'Test color selector',
				'description' => 'Color selector description',
				'type' => 'color'
			),
			array(
				'slug' => "my_date_field_slug",
				'name' => 'Test date selector',
				'description' => 'Date selector description',
				'type' => 'date',
				'type_date_options' => array('use_time' => 1)
			),
			array(
				'slug' => "my_date2_field_slug",
				'name' => 'Test date selector',
				'description' => 'Date v2 selector description',
				'type' => 'date_v2',
				"options" => array(
					"date_v2" => array(
						"show" => "on_click",
						"show_as" => "datetime",
						"default_date" => "today"
					)
				)
			),			
			array(
				'slug' => "my_user_field_slug",
				'name' => 'Test user selector',
				'description' => 'User selector description',
				'type' => 'user'
			)
		)
	)
);

// function simple_fields_register_post_connector($unique_name = "", $new_post_connector = array()) {
simple_fields_register_post_connector('test_connector',
	array (
		'name' => "A test connector",
		'field_groups' => array(
			array(
				'slug' => 'test',
				'context' => 'normal', // 'normal', 'advanced', or 'side'
				'priority' => 'default' // 'high', 'core', 'default' or 'low'
			)
		),
		// post_types can also be string, if only one post type is to be connected
		'post_types' => array('post', "my_custom_post_type"),
		"hide_editor" => false // true or false, hides the standard wp editor if true
	)
);

/**
 * Sets the default post connector for a post type
 * 
 * @param $post_type_connector = connector id (int) or slug (string) or string __inherit__
 * 
 */
simple_fields_register_post_type_default('test_connector', 'post');