<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Core_Corporate
 */

if( ! function_exists( 'core_corporate_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function core_corporate_primary_navigation_fallback() {
		
		echo '<ul>';
			echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' .esc_html__( 'Home', 'core-corporate' ). '</a></li>';
			wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
			) );
		echo '</ul>';

	}

endif;

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class core_corporate_Dropdown_Taxonomies_Control
 */
class core_corporate_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Render the control's content.
     *
     * @since 1.0.0
     */
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => 'core-corporate-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => __( '&mdash; Select &mdash;', 'core-corporate' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
                'hide_empty'        => 0,                   

            )
        ); 
        
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

        );
    }

}

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'core_corporate_Image_Radio_Control' ) ) {
    /**
    * Customize sidebar layout control.
    */
    class core_corporate_Image_Radio_Control extends WP_Customize_Control {

        public function render_content() {

            if (empty($this->choices))
                return;

            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <ul class="controls" id='core-corporate-img-container'>
                <?php
                foreach ($this->choices as $value => $label) :
                    $class = ($this->value() == $value) ? 'core-corporate-radio-img-selected core-corporate-radio-img-img' : 'core-corporate-radio-img-img';
                    ?>
                    <li style="display: inline;">
                        <label>
                            <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                                                          $this->link();
                                                          checked($this->value(), $value);
                                                          ?> />
                            <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                        </label>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
            <?php
        }

    }
}

if( ! class_exists( 'core_corporate_multiple_Dropdown_Taxonomies_Control' ) ) :
/**
 * Customize Control for Taxonomy Select.
 *
 * @since 1.0.0
 */
class core_corporate_multiple_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Type of control.
     *
     * @var string
     */
    public $type = 'dropdown-taxonomies';

    /**
     * Taxonomy to list.
     *
     * @var string
     */
    public $taxonomy = '';

    /**
     * Check if multiple.
     *
     * @var bool
     */
    public $multiple = false;

    /**
     * Constructor.
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      Control ID.
     * @param array                $args    Optional. Arguments to override class property defaults.
     */
    public function __construct( $manager, $id, $args = array() ) {

        $taxonomy = 'category';
        if ( isset( $args['taxonomy'] ) ) {
            $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
            if ( true === $taxonomy_exist ) {
                $taxonomy = esc_attr( $args['taxonomy'] );
            }
        }
        $args['taxonomy'] = $taxonomy;
        $this->taxonomy = esc_attr( $taxonomy );

        if ( isset( $args['multiple'] ) ) {
            $this->multiple = ( true === $args['multiple'] ) ? true : false;
        }

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render content.
     */
    public function render_content() {

        $tax_args = array(
            'hierarchical' => 0,
            'taxonomy'     => $this->taxonomy,
        );
        $all_taxonomies = get_categories( $tax_args );
        $multiple_text = ( true === $this->multiple ) ? 'multiple' : '';
        $value = $this->value();
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
            <?php endif; ?>
            <select <?php $this->link(); ?> <?php echo esc_attr( $multiple_text ); ?>>
                <?php
                printf( '<option value="%s" %s>%s</option>', '', selected( $value, '', false ), __( '&mdash; All &mdash;', 'core-corporate' ) );
                ?>
                <?php if ( ! empty( $all_taxonomies ) ) : ?>
                    <?php foreach ( $all_taxonomies as $key => $tax ) : ?>
                        <?php
                        printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $value, $tax->term_id, false ), esc_html( $tax->name ) );
                        ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </label>
        <?php
    }
}

endif;

