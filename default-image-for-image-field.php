<?php 
  
  // add default image setting to ACF image fields
  // lets you select a default image
  // this is simply taking advantage of a field setting that already exists
  
	add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
	function add_default_value_to_image_field($field) {
		acf_render_field_setting( $field, array(
			'label'			=> 'Default Image',
			'instructions'		=> 'Appears when creating a new post',
			'type'			=> 'image',
			'name'			=> 'default_value',
		));
	}

	// Display default on front end if not replaced
	add_filter('acf/load_value/type=image', 'reset_default_image', 10, 3);
	function reset_default_image($value, $post_id, $field) {
  		if (!$value) {
    		$value = $field['default_value'];
  		}
  		return $value;
	}
  
?>
