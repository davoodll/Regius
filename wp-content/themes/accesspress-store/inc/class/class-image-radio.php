<?php
function load_custom1_wp_admin_style() {
        wp_enqueue_style('accesspress-admin-style1', get_template_directory_uri() . '/inc/css/admin-layout-image.css');
}
add_action( 'admin_enqueue_scripts', 'load_custom1_wp_admin_style' );

if(class_exists( 'WP_Customize_control')):
class WP_Customize_Radioimage_Control extends WP_Customize_Control {
	public $type = 'radioimage';
	//public function enqueue() {
//		wp_enqueue_script( 'jquery-ui-button' );
//	}
    public function render_content() {
		$name = '_customize-radio-' . $this->id;
		?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<div id="input_<?php echo $this->id; ?>" class="image">
			<?php foreach ( $this->choices as $value => $label ) : ?>
				<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
					<label for="<?php echo $this->id . $value; ?>">
						<img src="<?php echo esc_html( $label ); ?>"/>
					</label>
				</input>
			<?php endforeach; ?>
		</div>
		<script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
		<?php 
	}
}
endif;