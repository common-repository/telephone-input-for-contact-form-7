<?php 
add_action('wpcf7_admin_init','tifcf7_telephone_select_tag_generator');
function tifcf7_telephone_select_tag_generator($post){
    if (!class_exists('WPCF7_TagGenerator')) {
        return;
    }
    $tag_generator = WPCF7_TagGenerator::get_instance();
    $tag_generator->add( 'telephone_input', __( 'telephone_input', 'telephone-input-field-with-contact-form-7' ) , 'tifcf7_tag_generator_telephone' );
}


function tifcf7_tag_generator_telephone($contact_form, $args = '' ){
	$args = wp_parse_args( $args, array() );
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'telephone_input';
	$description = __( "Generate a form-tag for a Input Telephone.", 'telephone-input-field-with-contact-form-7' );
	?>
	<div class="control-box">
		<fieldset>
			<legend><?php echo esc_attr($description); ?></legend>
			<table class="form-table">
				<tr>
					<th>
						<label for="<?php echo esc_attr( $args['content'] . '-filed_type' ); ?>"><?php echo esc_html( __( 'Field type', 'telephone-input-field-with-contact-form-7' ) ); ?></label>
					</th>
					<td>
						<input type="checkbox" name="required" class=" required_files" required>
						<label><?php echo esc_html( __( 'Required Field', 'telephone-input-field-with-contact-form-7' ) ); ?></label>
					</td>
				</tr>
				<tr>
					<th><?php echo esc_html( __( 'Name', 'telephone-input-field-with-contact-form-7' ) ); ?></th>
					<td>
						<input type="text" name="name">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id Attribute', 'telephone-input-field-with-contact-form-7' ) ); ?></label></th>
					<td><input type="text" name="id" class="telephone_id oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class Attribute', 'telephone-input-field-with-contact-form-7' ) ); ?></label></th>
					<td><input type="text" name="class" class="telephone_value oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
				</tr>
				<tr>
			      	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-enable_dropdown' ); ?>"><?php echo esc_html( __( 'Enable dropdown', 'telephone-input-field-with-contact-form-7' ) ); ?></label>
			        </th>
			      	<td>
			          <label><input type="checkbox" name="enable_dropdown" class="option" checked /> <?php echo esc_html( __( 'Enable dropdown', 'telephone-input-field-with-contact-form-7' ) ); ?>
			        </td>
		    	</tr>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-only_countries' ); ?>"><?php echo esc_html( __( 'Only Countries Attribute', 'telephone-input-field-with-contact-form-7' ) ); ?></label></th>
					<td><input type="text" name="only_countries" class="country_only_countries oneline option" id="<?php echo esc_attr( $args['content'] . '-only_countries' ); ?>" disabled/>
						<label class="tiffcf7_comman_link"><?php echo esc_html( __('This Option Available in ','telephone-input-field-with-contact-form-7') );?><a href="https://www.topsmodule.com/product/telephone-input-for-contact-form-7/" target="_blank"><?php echo esc_html( __( 'Pro Version', 'telephone-input-field-with-contact-form-7' ) ); ?></a></label>
                        <p class="description">
                            <?php echo esc_html( __( 'display only these countries. ', 'telephone-input-field-with-contact-form-7' ) ); ?><br/><?php echo esc_html( __( '(e.g. us-ca)', 'telephone-input-field-with-contact-form-7' ) ); ?>
                        </p>
                    </td>
				</tr>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-preferred_countries' ); ?>"><?php echo esc_html( __( 'Preferred Countries Attribute', 'telephone-input-field-with-contact-form-7' ) ); ?></label></th>
					<td><input type="text" name="preferred_countries" class="country_preferred_countries oneline option" id="<?php echo esc_attr( $args['content'] . '-preferred_countries' ); ?>" disabled/>
						<label class="tiffcf7_comman_link"><?php echo __('This Option Available in ','telephone-input-field-with-contact-form-7');?> <a href="https://www.topsmodule.com/product/telephone-input-for-contact-form-7/" target="_blank"><?php echo esc_html( __( 'Pro Version', 'telephone-input-field-with-contact-form-7' ) ); ?></a></label>
                        <p class="description">
                        	<?php echo esc_html( __( 'The countries at the top of the list. ', 'telephone-input-field-with-contact-form-7' ) ); ?>
                            <br/><?php echo esc_html( __( '(e.g. us-gb)', 'telephone-input-field-with-contact-form-7' ) ); ?>
                        </p>
                    </td>
				</tr>
				<tr>
					<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-exclude_countries' ); ?>"><?php echo esc_html( __( 'Exclude Countries Attribute', 'telephone-input-field-with-contact-form-7' ) ); ?></label></th>
					<td><input type="text" name="exclude_countries" class="exclude_countries oneline option" id="<?php echo esc_attr( $args['content'] . '-exclude_countries' ); ?>" />
						<label class="tiffcf7_comman_link"><?php echo __('This Option Available in ','telephone-input-field-with-contact-form-7');?> <a href="https://www.topsmodule.com/product/telephone-input-for-contact-form-7/" target="_blank"><?php echo esc_html( __( 'Pro Version', 'telephone-input-field-with-contact-form-7' ) ); ?></a></label>
                        <p class="description">
                           <?php echo esc_html( __( 'To hide these countries. ', 'telephone-input-field-with-contact-form-7' ) ); ?><br/><?php echo esc_html( __( '(e.g.us-ca)', 'telephone-input-field-with-contact-form-7' ) ); ?>
                        </p>
                    </td>
				</tr>

			</table>
		</fieldset>
	</div>
	<div class="insert-box"> 
		<input type="text" name="<?php echo esc_attr($type); ?>" class="tag code" readonly="readonly" onfocus="this.select()" />
		<div class="submitbox">
			<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'telephone-input-field-with-contact-form-7' ) ); ?>" />
		</div>
		<br class="clear" />
		<p class="description mail-tag">
			<label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'telephone-input-field-with-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
				<input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" />
			</label>
		</p>
	</div>
	<?php
	}
?>