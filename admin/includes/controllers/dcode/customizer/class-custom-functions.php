<?php
defined('ABSPATH') or die();

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
     * Customize controls for repeater field
     *
     * @since 1.0.0
     */
    class beastthemes_companion_Repeater_Controler extends WP_Customize_Control {
        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'repeater';

        public $rdcode_box_label = '';

        public $rdcode_box_add_control = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();

        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            $this->fields                 = $fields;
            $this->rdcode_box_label       = $args['rdcode_box_label'] ;
            $this->rdcode_box_add_control = $args['rdcode_box_add_control'];
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {

            $values      = json_decode( $this->value() );
            $repeater_id = $this->id;
            $field_count = count( $values );
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php if( $this->description ){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <ul class="rdcode-repeater-field-control-wrap">
                <?php $this->rdcode_get_fields(); ?>
            </ul>

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="rdcode-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <input type="hidden" name="<?php echo esc_attr( $repeater_id ).'_count'; ?>" class="field-count" value="<?php echo absint( $field_count ); ?>">
            <input type="hidden" name="field_limit" class="field-limit" value="20">
            <button type="button" class="button rdcode-repeater-add-control-field"><?php echo esc_html( $this->rdcode_box_add_control ); ?></button>
    <?php
        }

        private function rdcode_get_fields(){
            $fields = $this->fields;
            $values = json_decode( $this->value() );

            if( is_array( $values ) ){
            foreach( $values as $value ){
        ?>
            <li class="rdcode-repeater-field-control">
            <h3 class="rdcode-repeater-field-title"><?php echo esc_html( $this->rdcode_box_label ); ?></h3>
            
            <div class="rdcode-repeater-fields">
            <?php
                foreach ( $fields as $key => $field ) {
                $class = isset( $field['class'] ) ? $field['class'] : '';
            ?>
                <div class="rdcode-repeater-field rdcode-repeater-type-<?php echo esc_attr( $field['type'] ).' '. esc_attr( $class ); ?>">

                <?php 
                    $label = isset( $field['label'] ) ? $field['label'] : '';
                    $description = isset( $field['description'] ) ? $field['description'] : '';
                    if ( $field['type'] != 'checkbox' ) { 
                ?>
                        <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                        <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                <?php 
                    } elseif ( $field['type'] == 'checkbox' ) {
                        ?>
                            <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                            <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                        <?php 
                    }

                    $new_value = isset( $value->$key ) ? $value->$key : '';
                    $default   = isset( $field['default'] ) ? $field['default'] : '';

                    if ( empty ( $new_value ) ) {
                        $img_class = 'no-img-url-set';
                    } else {
                        $img_class = '';
                    }

                    switch ( $field['type'] ) {
                        case 'text':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_attr( $new_value ).'"/>';
                            break;

                        case 'textarea':
                            echo '<textarea rows="3" data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'">'.esc_attr( $new_value ).'</textarea>';
                            break;

                        case 'url':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="url" value="'.esc_url( $new_value ).'"/>';
                            break;

                        case 'number':
                            echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="number" value="'.esc_url( $new_value ).'"/>';
                            break;

                        case 'image':
                            echo '<input type="text" data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" name="team_image-'.esc_attr( $key ).'" id="team_image_url-'.esc_attr( $key ).'" class="form-control team_image" value="'.esc_attr( esc_attr( $new_value ) ).'" >';
                            echo '<input type="button" name="upload-btn" class="button-secondary button upload_image_btn upload_team_c" id="upload_team-'.esc_attr( $key ).'" value="Upload">';
                            break;

                        case 'checkbox':
                            if ( $new_value == 'yes' ) { $checked = 'checked'; } else { $checked = ''; }
                            echo '<input type="checkbox" data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" name="custom_checkbox" value="yes" class="customizer-repeater-checkbox" '.$checked.'>';
                            break;

                        case 'social_icon':
                            echo '<div class="rdcode-repeater-selected-icon"><i class="'.esc_attr( $new_value ).'"></i><span><i class="fa fa-angle-down"></i></span></div><ul class="rdcode-repeater-icon-list rdcode-clearfix">';
                            $beastthemes_font_awesome_social_icon_array = beastthemes_font_awesome_social_icon_array();
                            foreach ( $beastthemes_font_awesome_social_icon_array as $beastthemes_font_awesome_icon ) {
                                $icon_class = $new_value == $beastthemes_font_awesome_icon ? 'icon-active' : '';
                                echo '<li class='. esc_attr( $icon_class ) .'><i class="'. esc_attr( $beastthemes_font_awesome_icon ) .'"></i></li>';
                            }
                            echo '</ul><input data-default="'. esc_attr( $default ) .'" type="hidden" value="'. esc_attr( $new_value ) .'" data-name="'.esc_attr( $key ).'"/>';
                            break;

                        default:
                            break;
                    }
                ?>
                </div>
                <?php
                } ?>

                <div class="rdcode-clearfix rdcode-repeater-footer">
                    <div class="alignright">
                    <a class="rdcode-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'beastthemes_companion' ) ?></a> |
                    <a class="rdcode-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'beastthemes_companion' ) ?></a>
                    </div>
                </div>
            </div>
            </li>
            <?php   
            }
            }
        }
    } // end beastthemes_companion_Repeater_Controler

    /**
     * Customize controls for One Pgae Editor
     *
     * @since 1.0.0
     */
    class beastthemes_companion_One_Page_Editor_Controler extends WP_Customize_Control {
        private $include_admin_print_footer = false;
        private $teeny = false;
        public $type   = 'text-editor';
        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            if ( ! empty( $args['include_admin_print_footer'] ) ) {
                $this->include_admin_print_footer = $args['include_admin_print_footer'];
            }
            if ( ! empty( $args['teeny'] ) ) {
                $this->teeny = $args['teeny'];
            }
        }
        /* Render the content on the theme customizer page */
        public function render_content() {
            ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
            <?php
            $settings = array(
                'textarea_name' => $this->id,
                'teeny'         => $this->teeny,
            );
            $control_content = $this->value();
            wp_editor( $control_content, $this->id, $settings );

            if ( $this->include_admin_print_footer === true ) {
                do_action( 'admin_print_footer_scripts' );
            }
        }
    }

    /**
     * Heading control
     */
    class beastthemes_Customizer_Heading extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'rdcode-heading';

        /**
         * An Underscore (JS) template for this control's content (but not its container).
         *
         * Class variables for this control class are available in the `data` JS object;
         * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
         *
         * @see WP_Customize_Control::print_template()
         *
         * @access protected
         */
        protected function content_template() {
            ?>
            <h4 class="rdcode-customizer-heading">{{{ data.label }}}</h4>
            <?php
        }
    }

    /**
     * Switch button customize control.
     *
     * @since 1.0.0
     * @access public
     */
    class beastthemes_Customize_Switch_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $rdcode_type = 'switch';

        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() {
    ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
                <div class="switch_options">
                    <?php 
                        $show_choices = $this->choices;
                        foreach ( $show_choices as $key => $value ) {
                            echo '<span class="switch_part '.esc_attr( $key ).'" data-switch="'.esc_attr( $key ).'">'. esc_html( $value ).'</span>';
                        }
                    ?>
                    <input type="hidden" id="mt_switch_option" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                </div>
            </label>
    <?php
        }
    } // end beastthemes_Customize_Switch_Control

    /**
     * Sortable Pill Checkbox Custom Control
     *
     */
    class beastthemes_companion_Pill_Checkbox_Custom_Control extends WP_Customize_Control {
        /**
         * The type of control being rendered
         */
        public $type = 'pill_checkbox';
        /**
         * Define whether the pills can be sorted using drag 'n drop. Either false or true. Default = false
         */
        private $sortable = false;
        /**
         * The width of the pills. Each pill can be auto width or full width. Default = false
         */
        private $fullwidth = false;
        /**
         * Constructor
         */
        public function __construct( $manager, $id, $args = array(), $options = array() ) {
            parent::__construct( $manager, $id, $args );
            // Check if these pills are sortable
            if ( isset( $this->input_attrs['sortable'] ) && $this->input_attrs['sortable'] ) {
                $this->sortable = true;
            }
            // Check if the pills should be full width
            if ( isset( $this->input_attrs['fullwidth'] ) && $this->input_attrs['fullwidth'] ) {
                $this->fullwidth = true;
            }
        }       /**
         * Enqueue our scripts and styles
         */
        public function enqueue() {
            wp_enqueue_script( 'beastthemes-custom-controls-js', BEASTTHEMES_COMPANION_PLUGIN_URL . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.1', true );
            wp_enqueue_style( 'beastthemes-custom-controls-css', BEASTTHEMES_COMPANION_PLUGIN_URL . 'assets/css/customizer.css', array(), '1.0', 'all' );
        }
        /**
         * Render the control in the customizer
         */
        public function render_content() {
            $reordered_choices = array();
            $saved_choices = explode( ',', esc_attr( $this->value() ) );

            // Order the checkbox choices based on the saved order
            if( $this->sortable ) {
                foreach ( $saved_choices as $key => $value ) {
                    if( isset( $this->choices[$value] ) ) {
                        $reordered_choices[$value] = $this->choices[$value];
                    }
                }
                $reordered_choices = array_merge( $reordered_choices, array_diff_assoc( $this->choices, $reordered_choices ) );
            }
            else {
                $reordered_choices = $this->choices;
            }
        ?>
            <div class="pill_checkbox_control">
                <?php if( !empty( $this->label ) ) { ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php } ?>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
                <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-pill-checkbox" <?php $this->link(); ?> />
                <div class="sortable_pills<?php echo ( $this->sortable ? ' sortable' : '' ) . ( $this->fullwidth ? ' fullwidth_pills' : '' ); ?>">
                <?php foreach ( $reordered_choices as $key => $value ) { ?>
                    <label class="checkbox-label">
                        <input type="checkbox" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( in_array( esc_attr( $key ), $saved_choices, true ), true ); ?> class="sortable-pill-checkbox"/>
                        <span class="sortable-pill-title"><?php echo esc_attr( $value ); ?></span>
                        <?php if( $this->sortable && $this->fullwidth ) { ?>
                            <span class="dashicons dashicons-sort"></span>
                        <?php } ?>
                    </label>
                <?php   } ?>
                </div>
            </div>
        <?php
        }
    }

    /**
     * Sortable multi check boxes custom control.
     * @since 0.1.0
     * @author David Chandra Purnama <david@genbu.me>
     * @copyright Copyright (c) 2015, Genbu Media
     * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
     */
    class beastthemes_companion_Control_Sortable_Checkboxes extends WP_Customize_Control {

        /**
         * Control Type
         */
        public $type = 'beastthemes-multicheck-sortable';

        /**
         * Render Settings
         */
        public function render_content() {

            /* if no choices, bail. */
            if ( empty( $this->choices ) ){
                return;
            } ?>

            <?php if ( !empty( $this->label ) ){ ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php } // add label if needed. ?>

            <?php if ( !empty( $this->description ) ){ ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php } // add desc if needed. ?>

            <?php
            /* Data */
            $values = explode( ',', $this->value() );
            $choices = $this->choices;

            /* If values exist, use it. */
            $options = array();
            if( $values ){

                /* get individual item */
                foreach( $values as $value ){

                    /* separate item with option */
                    $value = explode( ':', $value );

                    /* build the array. remove options not listed on choices. */
                    if ( array_key_exists( $value[0], $choices ) ){
                        $options[$value[0]] = $value[1] ? '1' : '0'; 
                    }
                }
            }
            /* if there's new options (not saved yet), add it in the end. */
            foreach( $choices as $key => $val ){

                /* if not exist, add it in the end. */
                if ( ! array_key_exists( $key, $options ) ){
                    $options[$key] = '0'; // use zero to deactivate as default for new items.
                }
            }
            ?>

            <ul class="beastthemes_companion-share-multicheck-sortable-list">

                <?php foreach ( $options as $key => $value ){ ?>

                    <li>
                        <label>
                            <input name="<?php echo esc_attr( $key ); ?>" class="beastthemes_companion-share-multicheck-sortable-item" type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value ); ?> /> 
                            <?php echo esc_html( $choices[$key] ); ?>
                        </label>
                        <i class="dashicons dashicons-sort beastthemes_companion-share-multicheck-sortable-handle"></i>
                    </li>

                <?php } // end choices. ?>

                    <li class="beastthemes_companion-share-hideme">
                        <input type="hidden" class="beastthemes_companion-share-multicheck-sortable" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                    </li>

            </ul><!-- .beastthemes_companion-share-multicheck-sortable-list -->


        <?php
        }
    }

    /**
     * Multi check boxes custom control.
     * @since 0.1.0
     * @author David Chandra Purnama <david@genbu.me>
     * @copyright Copyright (c) 2015, Genbu Media
     * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
     */
    class beastthemes_companion_Customize_Control_Checkboxes extends WP_Customize_Control {

        /**
         * Control Type
         */
        public $type = 'beastthemes_companion-share-multicheck';

        /**
         * Render Settings
         */
        public function render_content() {

            /* if no choices, bail. */
            if ( empty( $this->choices ) ){
                return;
            } ?>

            <?php if ( !empty( $this->label ) ){ ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php } // add label if needed. ?>

            <?php if ( !empty( $this->description ) ){ ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php } // add desc if needed. ?>

            <?php
            /* Data */
            $values = explode( ',', $this->value() );
            $choices = $this->choices;

            /* If values exist, use it. */
            $options = array();

            /* get individual post type */
            foreach( $choices as $key => $label ){
                $options[$key] = in_array( $key, $values ) ? '1' : '0';
            }
            ?>

            <ul class="beastthemes_companion-share-multicheck-list">

                <?php foreach ( $choices as $key => $label ){ ?>

                    <li>
                        <label>
                            <input name="<?php echo esc_attr( $key ); ?>" class="beastthemes_companion-share-multicheck-item" type="checkbox" value="<?php echo esc_attr( $options[$key] ); ?>" <?php checked( $options[$key] ); ?> /> 
                            <?php echo esc_html( $label ); ?>
                        </label>
                    </li>

                <?php } // end choices. ?>

                <li class="beastthemes_companion-share-hideme">
                    <input type="hidden" class="beastthemes_companion-share-multicheck" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
                </li>

            </ul><!-- .beastthemes_companion-share-multicheck-list -->

        <?php
        }
    }

    /**
     * Text sanitization
     *
     * @param  string   Input to be sanitized ( either a string containing a single string or multiple, separated by commas )
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'beastthemes_companion_text_sanitization' ) ) {
        function beastthemes_companion_text_sanitization( $input ) {
            if ( strpos( $input, ',' ) !== false) {
                $input = explode( ',', $input );
            }
            if( is_array( $input ) ) {
                foreach ( $input as $key => $value ) {
                    $input[$key] = sanitize_text_field( $value );
                }
                $input = implode( ',', $input );
            }
            else {
                $input = sanitize_text_field( $input );
            }
            return $input;
        }
    }

    /**
     * Sanitize Sharing Services
     * @since 0.1.0
     */
    function beastthemes_companion_share_sanitize_services( $input ) {

        /* Var */
        $output = array();

        /* Get valid services */
        $valid_services = beastthemes_companion_share_services();

        /* Make array */
        $services = explode( ',', $input );

        /* Bail. */
        if( ! $services ){
            return null;
        }

        /* Loop and verify */
        foreach( $services as $service ){

            /* Separate service and status */
            $service = explode( ':', $service );

            if( isset( $service[0] ) && isset( $service[1] ) ){
                if( array_key_exists( $service[0], $valid_services ) ){
                    $status = $service[1] ? '1' : '0';
                    $output[] = trim( $service[0] . ':' . $status );
                }
            }

        }

        return trim( esc_attr( implode( ',', $output ) ) );
    }

    /**
     * Sanitize Sharing Services
     * @since 0.1.0
     */
    function beastthemes_companion_share_sanitize_yuno_sections( $input ) {

        /* Var */
        $output = array();

        /* Get valid sections */
        $valid_sections = beastthemes_companion_yuno_sections();

        /* Make array */
        $sections = explode( ',', $input );

        /* Bail. */
        if( ! $sections ){
            return null;
        }

        /* Loop and verify */
        foreach( $sections as $section ){

            /* Separate section and status */
            $section = explode( ':', $section );

            if( isset( $section[0] ) && isset( $section[1] ) ){
                if( array_key_exists( $section[0], $valid_sections ) ){
                    $status = $section[1] ? '1' : '0';
                    $output[] = trim( $section[0] . ':' . $status );
                }
            }
        }

        return trim( esc_attr( implode( ',', $output ) ) );
    }

    function beastthemes_companion_share_sanitize_dcode_sections( $input ) {

        /* Var */
        $output = array();

        /* Get valid sections */
        $valid_sections = beastthemes_companion_dcode_sections();

        /* Make array */
        $sections = explode( ',', $input );

        /* Bail. */
        if( ! $sections ){
            return null;
        }

        /* Loop and verify */
        foreach( $sections as $section ){

            /* Separate section and status */
            $section = explode( ':', $section );

            if( isset( $section[0] ) && isset( $section[1] ) ){
                if( array_key_exists( $section[0], $valid_sections ) ){
                    $status = $section[1] ? '1' : '0';
                    $output[] = trim( $section[0] . ':' . $status );
                }
            }
        }

        return trim( esc_attr( implode( ',', $output ) ) );
    }


    /**
     * Sanitize Post Types
     * @since 0.1.0
     */
    function beastthemes_companion_share_sanitize_post_types( $input ) {

        /* Var */
        $output = array();

        /* Make input as array */
        $post_types = explode( ',', $input );

        /* Bail. */
        if( ! $post_types ){
            return null;
        }

        /* Get valid post types */
        $valid_post_types = beastthemes_companion_share_post_types();

        /* Loop and verify */
        foreach( $post_types as $post_type ){
            if( array_key_exists( $post_type, $valid_post_types ) ){
                $output[] = $post_type;
            }
        }

        /* return it back as string. */
        return trim( esc_attr( implode( ',', $output ) ) );
    }

    /**
     * Sanitize Post Types
     * @since 0.1.0
     */
    function beastthemes_companion_share_sanitize_options( $input ) {

        /* Var */
        $output = array();

        /* Make input as array */
        $options = explode( ',', $input );

        /* Bail. */
        if( ! $options ){
            return null;
        }

        /* Get valid post types */
        $valid_options = array( 'index' );

        /* Loop and verify */
        foreach( $options as $option ){
            if( in_array( $option, $valid_options ) ) {
                $output[] = $option;
            }
        }

        /* return it back as string. */
        return trim( esc_attr( implode( ',', $output ) ) );
    }

    /**
     * Sanitize Twitter Username
     * Strip out anything other than a letter, number, or underscore.
     * This will prevent the inadvertent inclusion of an extra @, as well as normalizing the handle.
     * @since 0.1.0
     */
    function beastthemes_companion_share_sanitize_twitter_username( $input ){
        return trim( preg_replace( '/[^\da-z_]+/i', '', $input ) );
    }

}