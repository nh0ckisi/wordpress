<?php
/**
 * Extend custom classes for customizer
 *
 * @package VMag
 */

if ( class_exists( 'WP_Customize_Control' ) ) { 

	/**
	 * Multiple checkbox customize control class.
	 */
	class Vmag_Customize_Checkbox_Multiple extends WP_Customize_Control {
	    
	    public $type = 'checkbox-multiple';

	    public function render_content() {

	        if ( empty( $this->choices ) )
	            return; ?>

	        <?php if ( !empty( $this->label ) ) : ?>
	            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <?php endif; ?>

	        <?php if ( !empty( $this->description ) ) : ?>
	            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
	        <?php endif; ?>

	        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

	        <ul>
	            <?php foreach ( $this->choices as $value => $label ) : ?>

	                <li>
	                    <label>
	                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
	                        <?php echo esc_html( $label ); ?>
	                    </label>
	                </li>

	            <?php endforeach; ?>
	        </ul>

	        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
	    <?php }
	}

	/**
     * Cutomize control for switch option
     */    
    class Vmag_Customize_Switch_Control extends WP_Customize_Control {
		public $type = 'switch';    
		public function render_content() {
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
		        <div class="switch_options">
		        	<?php 
		        		$show_choices = $this->choices;
		        		foreach ( $show_choices as $key => $value ) {
		        			echo '<span class="switch_part '.$key.'" data-switch="'.$key.'">'. $value.'</span>';
		        		}
		        	?>
                  	<input type="hidden" id="enable_switch_option" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                </div>
            </label>
	<?php
		}
	}

	/**
     * Image control by radio button 
     */
    class Vmag_Image_Radio_Control extends WP_Customize_Control {

 		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<ul class="controls" id ="vmag-img-container">
			<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ( $this->value() == $value ) ? 'vmag-radio-img-selected vmag-radio-img-img' : 'vmag-radio-img-img';
			?>
					<li class="inc-radio-image">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
							<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_attr( $class ); ?>' />
						</label>
					</li>
			<?php
				endforeach;
			?>
			</ul>
			<?php
		}
	}

	/**
     * Customize for textarea, extend the WP customizer
     */
    class Vmag_Textarea_Custom_Control extends WP_Customize_Control{
    	/**
    	 * Render the control's content.
    	 * 
    	 */
    	public $type = 'vmag_textarea';
      	public function render_content() {
    ?>
    		<label>
    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
          		<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
    				<?php echo esc_textarea( $this->value() ); ?>
    			</textarea>
    		</label>
    <?php
    	}
    }

    /**
     * Theme info
     */
    class Vmag_Info_Custom_Control extends WP_Customize_Control {
        public function render_content(){

            $important_links = array(
                'demo' => array(
                   'link' => esc_url( 'http://accesspressthemes.com/theme-demos/?theme=vmag' ),
                   'text' => __( 'View Demo', 'vmag' ),
                ),
                'documentation' => array(
                   'link' => esc_url( 'http://doc.accesspressthemes.com/vmag/' ),
                   'text' => __( 'Documentation', 'vmag' ),
                ),
                'theme-info' => array(
                   'link' => esc_url( 'https://accesspressthemes.com/wordpress-themes/vmag/' ),
                   'text' => __( 'Theme Info', 'vmag' ),
                ),
                'support' => array(
                   'link' => esc_url( 'https://accesspressthemes.com/support/forum/themes/free-themes/vmag/' ),
                   'text' => __( 'Support', 'vmag' ),
                ),
                'rating' => array(
                   'link' => esc_url( 'https://wordpress.org/support/theme/vmag/reviews/?filter=5' ),
                   'text' => __( 'Rate This Theme', 'vmag' ),
                ),
                'resources' => array(
                   'link' => esc_url( 'http://wpall.club/' ),
                   'text' => __( 'More WordPress Resources', 'vmag' ),
                ),
            );
            foreach ( $important_links as $important_link ) {
                echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_html( $important_link['text'] ) . ' </a></p>';
            }
        }
    }


} //endif class_exists