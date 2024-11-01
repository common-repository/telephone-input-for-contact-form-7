<?php 
add_action( 'wpcf7_init' , 'tifcf7_add_form_tag_telephone' , 10, 0 );
function tifcf7_add_form_tag_telephone() {
	wpcf7_add_form_tag( array( 'telephone_input', 'telephone_input*' ), 'tifcf7_telephone_tag_handler',array('name-attr' => true) );
}

function tifcf7_telephone_tag_handler($tag){
	if ( empty( $tag->name ) ) {
		return '';
	}

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	if ( $validation_error ) {
		$class .= ' wpcf7-not-valid';
	}

	$atts = array();

	$class = $atts['class'] = $tag->get_class_option( $class );
	$id = $atts['id'] = $tag->get_id_option();
	$enable_dropdown = $tag->has_option( 'enable_dropdown' );

	if ( $tag->has_option( 'readonly' ) ) {
		$atts['readonly'] = 'readonly';
	}

	if ( $tag->is_required() ) {
		$atts['aria-required'] = 'true';
	}

	if ( $validation_error ) {
		$atts['aria-invalid'] = 'true';
		$atts['aria-describedby'] = wpcf7_get_validation_error_reference(
			$tag->name
		);
	} else {
		$atts['aria-invalid'] = 'false';
	}

	$atts['name'] = $tag->name;
	$atts['type'] = 'hidden';

	$atts = wpcf7_format_atts( $atts );

	$html ='<div class="dswcf7_country_sel">
		<span class="wpcf7-form-control-wrap" data-name="'.$tag->name.'">
			<input id="'.$id.'" type="text" name="'.$tag->name.'"  class="'.$class.' telephone_input_class" enable_dropdown="'.$enable_dropdown.'">
		</span>
    </div>';

	return $html;
}

add_filter( 'wpcf7_validate_telephone_input' , 'srffcf7_telephone_input_validation_filter' , 10, 2 );
add_filter( 'wpcf7_validate_telephone_input*' , 'srffcf7_telephone_input_validation_filter' , 10, 2 );	

function srffcf7_telephone_input_validation_filter( $result, $tag ) {
    $dscf7data_image = sanitize_text_field($_POST[$tag->name]);
    $value = isset( $_POST[$tag->name] ) ? sanitize_text_field(trim( strtr( (string) $dscf7data_image, "\n", " " ) )) : '';

    if ( 'telephone_input' == $tag->basetype ) {
        if ( $tag->is_required() and '' === $value ) {
            $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
        }else if(!preg_match( '/^[+]?[0-9() -]*$/', $value )){
        	$result->invalidate( $tag, wpcf7_get_message( 'invalid_tel' ) );
        }
    }

    return $result;
}