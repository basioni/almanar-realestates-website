<?php
$makani_real_estate = makani_Real_Estate::get_instance();
$makani_real_estate->run();

class makani_Real_Estate {
	protected $loader;
	protected $plugin_name;
	protected $version;
    protected $plugin_options;
    private static $instance = null;
    public static function get_instance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
	private function __construct() {
		$this->plugin_name = 'makani-real-estate';
		$this->version = '1.0.0';
        $this->plugin_options = get_option( 'makani_price_format_option' );
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
	}
	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-makani-real-estate-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-makani-real-estate-i18n.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-makani-property.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-makani-agent.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-makani-property-post-type.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-makani-agent-post-type.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-makani-partner-post-type.php';
		$this->loader = new makani_Real_Estate_Loader();
	}

	private function set_locale() {
		$plugin_i18n = new makani_Real_Estate_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	
	private function define_admin_hooks() {
		
        // Property Post Type
        $property_post_type = new makani_Property_Post_Type();
        $this->loader->add_action( 'init', $property_post_type, 'register_property_post_type' );
        $this->loader->add_action( 'init', $property_post_type, 'register_property_type_taxonomy' );
        $this->loader->add_action( 'init', $property_post_type, 'register_property_status_taxonomy' );
        $this->loader->add_action( 'init', $property_post_type, 'register_property_city_taxonomy' );
        $this->loader->add_action( 'init', $property_post_type, 'register_property_feature_taxonomy' );
        $this->loader->add_filter( 'rwmb_meta_boxes', $property_post_type, 'register_meta_boxes' );
        $this->loader->add_filter( 'posts_join', $property_post_type, 'join_post_meta_table' );
        $this->loader->add_filter( 'posts_where', $property_post_type, 'add_property_id_in_search' );
        $this->loader->add_filter( 'posts_groupby', $property_post_type, 'group_by_properties' );
        // Agent Post Type
        $agent_post_type = new makani_Agent_Post_Type();
        $this->loader->add_action( 'init', $agent_post_type, 'register_agent_post_type' );
        $this->loader->add_filter( 'rwmb_meta_boxes', $agent_post_type, 'register_meta_boxes' );
        // Partner Post Type
        $partner_post_type = new makani_Partner_Post_Type();
        $this->loader->add_action( 'init', $partner_post_type, 'register_partner_post_type' );
        $this->loader->add_filter( 'rwmb_meta_boxes', $partner_post_type, 'register_meta_boxes' );
        if ( is_admin() ) {
            global $pagenow;
            // property custom columns
            if ( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && esc_attr( $_GET['post_type'] ) == 'property' ) {
                $this->loader->add_filter( 'manage_edit-property_columns', $property_post_type, 'register_custom_column_titles' );
                $this->loader->add_action( 'manage_pages_custom_column', $property_post_type, 'display_custom_column' );
            }
            // agent custom columns
            if ( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && esc_attr( $_GET['post_type'] ) == 'agent' ) {
                $this->loader->add_filter( 'manage_edit-agent_columns', $agent_post_type, 'register_custom_column_titles' );
                $this->loader->add_action( 'manage_posts_custom_column', $agent_post_type, 'display_custom_column' );
            }
            
        }

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

    public static function log( $message ) {
        if( WP_DEBUG === true ){
            if( is_array( $message ) || is_object( $message ) ){
                error_log( print_r( $message, true ) );
            } else {
                error_log( $message );
            }
        }
    }

    public function get_currency_sign() {
        $this->refresh();
        if( isset( $this->plugin_options[ 'currency_sign' ] ) ) {
            return $this->plugin_options[ 'currency_sign' ];
        }
        return '$';
    }

    public function get_currency_position() {
        if( isset( $this->plugin_options[ 'currency_position' ] ) ) {
            return $this->plugin_options[ 'currency_position' ];
        }
        return 'before';
    }

    public function get_thousand_separator() {
        if( isset( $this->plugin_options[ 'thousand_separator' ] ) ) {
            return $this->plugin_options[ 'thousand_separator' ];
        }
        return ',';
    }

    public function get_decimal_separator() {
        if( isset( $this->plugin_options[ 'decimal_separator' ] ) ) {
            return $this->plugin_options[ 'decimal_separator' ];
        }
        return '.';
    }

    public function get_number_of_decimals() {
        if( isset( $this->plugin_options[ 'number_of_decimals' ] ) ) {
            return intval( $this->plugin_options[ 'number_of_decimals' ] );
        }
        return 2;
    }

    public function get_empty_price_text() {
        $this->refresh();
        if( isset( $this->plugin_options[ 'empty_price_text' ] ) ) {
            return $this->plugin_options[ 'empty_price_text' ];
        }
        return null;
    }

    private function refresh(){
        if ( function_exists( 'icl_object_id' ) ) {
            // re-read only for wpml
            $this->plugin_options = get_option( 'makani_price_format_option' );
        }
    }

}
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */

$makani_real_estate = makani_Real_Estate::get_instance();
$makani_real_estate->run();
