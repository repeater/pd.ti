<?php

// define post type connectors
simple_fields_register_post_connector('redirect',
	array (
		'name' => 'Redirect Page',
		'field_groups' => array(
			array(
				'slug' => 'redirect',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// define post type connectors
simple_fields_register_post_connector('redirect_with_hero',
	array (
		'name' => 'Redirect With Hero Page',
		'field_groups' => array(
			array(
				'slug' => 'redirect',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);


simple_fields_register_post_connector('footer_cta',
	array (
		'name' => 'CTA Override Only',
		'field_groups' => array(
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page','post','resources'),
		'hide_editor' => false // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('default_page',
	array (
		'name' => 'Default Page',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => false // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('default_post',
	array (
		'name' => 'Default Post',
		'field_groups' => array(
			array(
				'slug' => 'reading_time',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('post','resources'),
		'hide_editor' => false // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('product',
	array (
		'name' => 'Product',
		'field_groups' => array(
			array(
				'slug' => 'product_item',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_scroller',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('products'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('person',
	array (
		'name' => 'Person',
		'field_groups' => array(
			array(
				'slug' => 'person',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('leadership'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('integration',
	array (
		'name' => 'Integration',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'integration_data',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('integrations'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('data_aggregation',
	array (
		'name' => 'Data Aggregation',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'integration_post_hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'integration_pre_footer',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('about',
	array (
		'name' => 'About',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'story',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'history',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'company',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'values',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'leadership_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'offices_map',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'offices',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);


simple_fields_register_post_connector('contact',
	array (
		'name' => 'Contact',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'contact',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);


simple_fields_register_post_connector('home',
	array (
		'name' => 'Home',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'home_bullets',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'learn_more',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'stats_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'stats',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'districts',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'district_headline',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'district_images',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'home_quote_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'home_quote',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'awards_headline',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'awards_images',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'features_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'features',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => false // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('solutions',
	array (
		'name' => 'Solutions',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'solutions_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'solutions_testimonial',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'platforms',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_platform_1_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_platform_1',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_platform_2_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_platform_2',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_platform_3_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_platform_3',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_platform_4_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_platform_4',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('implementation',
	array (
		'name' => 'Implementation',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'implementation_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_1_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_implementation_1',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_2_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_implementation_2',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_3_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_implementation_3',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_4_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_implementation_4',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_bottom_1_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_bottom_2_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_bottom_3_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_bottom_4_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_implementation_bottom_5_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'implementation_testimonial',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('approach',
	array (
		'name' => 'Approach',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'approach_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'approach_bullets',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_approach_1_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_approach_1',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_approach_2_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_approach_2',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_approach_3_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_approach_3',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_approach_4_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'tab_images_approach_4',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'features_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'features',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'learn_more_bullets',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);


simple_fields_register_post_connector('article_collection',
	array (
		'name' => 'Article Collection',
		'field_groups' => array(
			array(
				'slug' => 'news_articles',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('news'),
		'hide_editor' => false // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('in_the_news',
	array (
		'name' => 'In The News',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'news_cta',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'press_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'press_leaders',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);


simple_fields_register_post_connector('partners',
	array (
		'name' => 'Partners',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'partners',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('investment',
	array (
		'name' => 'Investment',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'investment_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

simple_fields_register_post_connector('careers',
	array (
		'name' => 'Careers',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'careers_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'jobs',
				'context' => 'normal',
				'priority' => 'high'
			),
            array(
				'slug' => 'careers_values',
				'context' => 'normal',
				'priority' => 'high'
			),
            array(
				'slug' => 'careers_benefits',
				'context' => 'normal',
				'priority' => 'high'
			),
            array(
				'slug' => 'careers_testimonials',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// products
simple_fields_register_post_connector('products_overview',
	array (
		'name' => 'Products Overview',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'products_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_descriptions',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'student_products',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'educator_products',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'operations_products',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_sub_nav_items',
				'context' => 'normal',
				'priority' => 'high'
			),
            array(
				'slug' => 'product_sub_nav_cta',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// product
simple_fields_register_post_connector('product_overview',
	array (
		'name' => 'Product Overview',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_benefits',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_benefits_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_features',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_feature_media',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_additional_features',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'product_testimonial',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// expo
simple_fields_register_post_connector('expo',
	array (
		'name' => 'Expo',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'expo_static',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'expo_whys',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'speakers',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'expo_sessions_list',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'expo_session_agendas',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'expo_testimonials',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// media resources
simple_fields_register_post_connector('media_resources',
	array (
		'name' => 'Media Resources',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_statics',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_documents',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_logos',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_photo_categories',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_photos',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_video_categories',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_videos',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'media_faq',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// timeline events
simple_fields_register_post_connector('timeline',
	array (
		'name' => 'Timeline',
		'field_groups' => array(
			array(
				'slug' => 'hero',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'timeline_events',
				'context' => 'normal',
				'priority' => 'high'
			),
            array(
				'slug' => 'event_sub_nav_cta',
				'context' => 'normal',
				'priority' => 'high'
			),
			array(
				'slug' => 'cta_override',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// registration
simple_fields_register_post_connector('registration',
	array (
		'name' => 'Registration',
		'field_groups' => array(
			array(
				'slug' => 'registration',
				'context' => 'normal',
				'priority' => 'high'
			)
		),
		'post_types' => array('page'),
		'hide_editor' => true // true or false, hides the standard wp editor if true
	)
);

// define any post type defaults
simple_fields_register_post_type_default('default_post', 'post');
simple_fields_register_post_type_default('default_post', 'resources');
simple_fields_register_post_type_default('product', 'products');
simple_fields_register_post_type_default('person', 'leadership');
simple_fields_register_post_type_default('article_collection', 'news');
simple_fields_register_post_type_default('integration', 'integrations');
