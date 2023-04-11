<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    global $opt_name;
    $opt_name = "makani_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'خيارات القالب ', 'makani' ),
        'page_title'           => __( 'خيارات القالب', 'makani' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
   
    Redux::setArgs( $opt_name, $args );
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
    * ==================================================================================
    * ==================> Header Options  ==============================================
    * ==================================================================================
    */
	global $opt_name;
	Redux::setSection( $opt_name, array(
		'title' => __('هيدر الموقع', 'makani'),
		'id'    => 'header-section',
		'desc'  => __('هذا القسم يحتوى على خيارات الهيدر للموقع', 'makani'),
		'fields'=> array(
	
			array(
				'id'       => 'makani_favicon',
				'type'     => 'media',
				'url'      => false,
				'title'    => __( 'Favicon', 'makani' ),
				'subtitle' => __( 'آيقونة Favicon للموقع', 'makani' ),
			),
			array(
				'id'       => 'makani_logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => __( 'Logo', 'makani' ),
				'subtitle' => __( 'رفع لوجو الموقع', 'makani' ),
			),
		  
			array(
				'id'        => 'makani_page_loader',
				'type'      => 'switch',
				'title'     => __('Page Loader', 'makani'),
				'desc'     => __('يمكن تفعيل او الغاء اليقونه تحميل الموقع', 'makani'),
				'default'   => 1,
				'on'        => __('Enable','makani'),
				'off'       => __('Disable','makani'),
			),
		   
			array(
            'id'       => 'makani_header_user_nav',
            'type'     => 'switch',
            'title'    => __( 'عرض او اخفاء روابط صفحة العضو', 'makani' ),
            'default'  => 1,
            'on'       => __( 'Show', 'makani' ),
            'off'      => __( 'Hide', 'makani' ),
           ),
		   
		   
			array(
				'id'        => 'makani_search_icon',
				'type'      => 'switch',
				'title'     => __('البحث الرئيسيى للموقع  ', 'makani'),
				'desc'     => __('يمكن تفعيل او الغاء البحث فى القايمة الرئيسية', 'makani'),
				'default'   => 1,
				'on'        => __('Enable','makani'),
				'off'       => __('Disable','makani'),
			),
			
				array(
				'id'       => 'makani_banner_image',
				'type'     => 'media',
				'url'      => false,
				'title'    => __('صورة البانر للصفحات الداخلية ', 'makani'),
				'desc'     => __('Banner image should have minimum width of 2000px and minimum height of 320px.', 'makani'),
				'subtitle' => __('رفع صورة كبنر للصفحات الداخلية للموقع', 'makani'),
			),
			
			array(
				'id'       => 'makani_banner_single',
				'type'     => 'media',
				'url'      => false,
				'title'    => __('صورة البانر لصفحة العقارات', 'makani'),
				'desc'     => __('Banner image should have minimum width of 2000px and minimum height of 320px.', 'makani'),
				'subtitle' => __('رفع صورة كبنر لصفحة العقارات', 'makani'),
			),
			
			
		) ) );
    /*
    * ================================================================================
    * ==================>Home options  ==============================================
    *================================================================================
    */		
	global $opt_name;
	Redux::setSection( $opt_name, array(
		'title' => __('الرئيسية', 'makani'),
		'id'    => 'home-section',
		'desc'  => __('هذا الجزء يحتوى خيارات للصفحة الرئيسية', 'makani'),
		'icon' => 'el el-home-alt',
     	'icon_class' => 'icon-large',
		 ) );
	 /*
	 * ==================> Layout Sub Section
	 */
	Redux::setSection( $opt_name, array(
		'title' => __( 'الرئيسية', 'makani'),
		'id'    => 'layout-section',
		'subsection' => true,
		'fields'=> array(
			array(
				'id'      => 'makani_home_sections',
				'type'    => 'sorter',
				'title'   => __('إدارة تخطيط الصفحة الرئيسية', 'makani'),
				'desc'  => __('يمكن التحكم فى ظهور و اخفاء وحدات الصفحة الرئيسية و كذلك ترتيبها', 'makani'),
				'options' => array(
					'enabled'  => array(
						'services'      => __( 'الخدمات', 'makani' ),
						'featured'      => __( 'عقارات متميزة', 'makani' ),
						'how-it-works'  => __( 'خطوات اضافة عقار', 'makani' ),
						'properties'    => __( 'العقارات', 'makani' ),
						'news'          => __( 'الأخبار', 'makani' ),
						'partner'       => __( 'شركائنا', 'makani' ),
						
					),
					'disabled' => array( 
				     	'contact'      => __( 'اطلب عقارك', 'makani' ),
					),
				)
			),
	  ) ) );
	 /*
	 * ==================> slider Section
	 */	
	Redux::setSection( $opt_name, array(
		'title' => __( 'شرائح العرض', 'makani'),
		'id'    => 'slider-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات شرائح العرض', 'makani'),
		'subsection' => true,
		'fields'=> array(
		   
		   array(
				'id'       => 'makani_slider_type',
				'type'     => 'select',
		        'title' => __( 'شرائح العرض', 'makani'),
		        'desc'  => __('يمكن التحكم فى شرائح العرض ', 'makani'),
				'options'  => array(
					'post-slider'     => __( 'من المقالات', 'makani' ),
					'properties-slider' => __( 'من العقارات', 'makani' ),
				),
				'default'  => 'properties-slider',
				'select2'  => array( 'allowClear' => false ),
			),
			
			array(
				'id'       => 'makani_slider_category',
				'type'     => 'select',
				'data'     => 'categories',
				'title'    => __('تصنيف شرائح العرض من المقالات', 'makani'),
			 ),
 
			array(
				'id'       => 'makani_slider_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد الشرائح المعروضة', 'makani' ),
				'options'  => array(
					1  => '1',
					2  => '2',
					3  => '3',
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
				),
				'default'  => 3,
				'select2'  => array( 'allowClear' => false ),
			),
			
		) ) );
		
	 /*
	 * ==================> services Section
	 */	
	Redux::setSection( $opt_name, array(
		'title' => __( 'خدماتنا', 'makani'),
		'id'    => 'services-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء خدماتنا', 'makani'),
		'subsection' => true,
		'fields'=> array(
		   
		   array(
				'id'       => 'makani_services_title',
				'type'     => 'text',
				'title'    => __( 'عنوان جزء خدماتنا', 'makani' ),
				'default'  => __( 'خدماتنا', 'makani' ),
			),
			
		    array(
				'id'           => 'makani_services_subtitle',
				'type'         => 'textarea',
				'title'        => __( 'نص عن الخدمات المقدمة', 'makani' ),
				'validate'     => 'html_custom',
				'default'      => 'هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضها في هذا المكان و حجم و لون الخط.',
				'allowed_html' => array(
					'span'     => array(),
				),
			),
			
			array(
				'id'       => 'makani_services_category',
				'type'     => 'select',
				'data'     => 'categories',
				'title'    => __('تصنيف الخدمات من المقالات', 'makani'),
			 ),
			 
			array(
				'id'       => 'makani_services_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد الخدمات المعروضة', 'makani' ),
				'options'  => array(
					1  => '1',
					2  => '2',
					3  => '3',
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
				),
				'default'  => 3,
				'select2'  => array( 'allowClear' => false ),
			),
			
		) ) );
	
	/*
	 * ==================>featured Section
	 */	
	 Redux::setSection( $opt_name, array(
		'title' => __( 'عقارات متميزة', 'makani'),
		'id'    => 'featured-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء العقارات المميزة', 'makani' ),
		'subsection' => true,
		'fields'=> array(
			
			array(
				'id'       => 'makani_featured_title',
				'type'     => 'text',
				'title'    => __( 'عنوان جزء عقارات مميزة', 'makani' ),
				'default'  => __( 'عقارات متميزة ', 'makani' ),
			),
			
			array(
				'id'       => 'makani_featured_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد العقارات المتميزة المعروضة', 'makani' ),
				'options'  => array(
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
					10  => '10',
					11  => '11',
					12  => '12',
					13  => '13',
					14  => '14',
					15  => '15',
					16  => '16',
					17  => '17',
					18  => '18',
					19  => '19',
					20  => '20',
				),
				'default'  => 6,
				'select2'  => array( 'allowClear' => false ),
			),
	
		) ) );
		
		
	 /*
	 * ==================>properties Section
	 */	
	 Redux::setSection( $opt_name, array(
		'title' => __( 'العقارات ', 'makani'),
		'id'    => 'properties-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء العقارات ', 'makani' ),
		'subsection' => true,
		'fields'=> array(
			
			array(
				'id'       => 'makani_properties_title',
				'type'     => 'text',
				'title'    => __( 'عنوان جزء العقارات ', 'makani' ),
				'default'  => __( 'العقارات ', 'makani' ),
			),
			
			array(
				'id'       => 'makani_properties_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد العقارات المعروضة', 'makani' ),
				'options'  => array(
				    1  => '1',
					2  => '2',
					3  => '3',
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
					10  => '10',
					11  => '11',
					12  => '12',
					13  => '13',
					14  => '14',
					15  => '15',
				),
				'default'  => 10,
				'select2'  => array( 'allowClear' => false ),
			),
		) ) );
			
	/*
	 * ==================>اطلب عقارك
	 */	
	 Redux::setSection( $opt_name, array(
		'title' => __( 'اطلب عقارك ', 'makani'),
		'id'    => 'contactform-index',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء اطلب عقارك ', 'makani' ),
		'subsection' => true,
		'fields'=> array(
			
			array(
				'id'       => 'contact-form-title',
				'type'     => 'text',
				'title'    => __( 'عنوان اطلب عقارك ', 'makani' ),
				'default'  => __( 'اطلب عقارك ', 'makani' ),
			),
			
			array(
					'id'       => 'contact-phone',
					'type'     => 'text',
					'title'    => __( 'رقم الاتصال السريع', 'redux-framework-demo' ),
					'validate' => 'numeric',
					'default'  => '19521'
				),
				
array(
					'id'       => 'contact-form-index',
					'type'     => 'text',
					'title'    => __( 'استمارة المراسلة فى الرئيسية  ', 'redux-framework-demo' ),
					'default'  => '[contact-form-7 id="210" title="استمارة المراسلة 1"]'
				),

		) ) );	
		
	/*
	 * ==================> أخبارنا
	 */	
	 Redux::setSection( $opt_name, array(
		'title' => __( ' أخبارنا ', 'makani'),
		'id'    => 'news-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء أخبارنا', 'makani' ),
		'subsection' => true,
		'fields'=> array(
			
			array(
				'id'       => 'makani_news_title',
				'type'     => 'text',
				'title'    => __( 'عنوان جزء أخبارنا ', 'makani' ),
				'default'  => __( ' أخبارنا ', 'makani' ),
			),
			
			array(
				'id'       => 'makani_news_category',
				'type'     => 'select',
				'data'     => 'categories',
				'title'    => __('تصنيف الاخبار من المقالات', 'makani'),
			 ),
			 
			array(
				'id'       => 'makani_news_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد الاخبار المعروضة', 'makani' ),
				'options'  => array(
					3  => '3',
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
					10  => '10',
					11  => '11',
					12  => '12',
					13  => '13',
					14  => '14',
					15  => '15',
				),
				'default'  => 3,
			),
		) ) );		
	
	
	 /*
	 * ==================> شركائنا
	 */	
	 Redux::setSection( $opt_name, array(
		'title' => __( ' شركائنا ', 'makani'),
		'id'    => 'partner-section',
		'desc'  => __('هذا الجزء يحتوى على العديد من الخيارات لجزء شركائنا', 'makani' ),
		'subsection' => true,
		'fields'=> array(
			
			array(
				'id'       => 'makani_partner_title',
				'type'     => 'text',
				'title'    => __( 'عنوان جزء شركائنا ', 'makani' ),
				'default'  => __( ' شركائنا ', 'makani' ),
			),
			
			array(
				'id'       => 'makani_partner_number',
				'type'     => 'select',
				'title'    => __( 'تحديد عدد الشركاء المعروضة', 'makani' ),
				'options'  => array(
					3  => '3',
					4  => '4',
					5  => '5',
					6  => '6',
					7  => '7',
					8  => '8',
					9  => '9',
					10  => '10',
					11  => '11',
					12  => '12',
					13  => '13',
					14  => '14',
					15  => '15',
				),
				'default'  => 10,
			),
		) ) );		
 	/*
    * ==================================================================================
    * ==================>Search options  ===============================================
    * ==================================================================================
    */
	Redux::setSection( $opt_name, array(
    'title' => __( 'البحث', 'makani' ),
    'id'    => 'search-section',
	'icon'  => 'el el-search',
    'desc'  => __( 'يمكنك من هذا الجزء التحكم فى خيارات البحث عن العقارات', 'makani' ),
    'fields'=> array(

        array(
            'id'      => 'makani_search_fields',
            'type'    => 'sorter',
            'title'   => __('التحكم فى وحدات البحث', 'makani'),
            'options' => array(
                'enabled'  => array(
                    'location'          => __( 'المدينة', 'makani' ),
                    'status'            => __( 'الحالة', 'makani' ),
                ),
                'disabled' => array(
                    'type'              => __( 'الغرض', 'makani' ),
                    'min-beds'          => __( 'عدد الأسرة', 'makani' ),
                    'min-baths'         => __( 'عدد دورات المياة', 'makani' ),
                    'min-max-price'     => __( 'السعر', 'makani' ),
                    'min-max-area'      => __( 'المساحة', 'makani' ),
                ),
            )
        ),
        array(
            'id'       => 'makani_search_features',
            'type'     => 'switch',
            'title'    => __( 'مميزات اضافيه للعقار ', 'makani' ),
            'desc'     => __( 'التحكم فى أظهار و اخفاء المميزات الاضافية للعقار', 'makani' ),
            'default'  => 0,
            'on'       => __( 'أظهار', 'makani' ),
            'off'      => __( 'أخفاء', 'makani' ),
        ),
    
        array(
            'id'           => 'makani_minimum_prices',
            'type'         => 'textarea',
            'title'        => __( 'أقل سعر', 'makani' ),
            'desc'         => __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces or currency signs.', 'makani' ),
            'validate'     => 'no_html',
            'default'      => '500, 1000, 5000, 10000, 50000, 100000, 200000, 300000, 400000, 500000, 600000, 700000, 800000, 900000, 1000000, 1500000, 2000000, 2500000, 5000000',
        ),
        array(
            'id'           => 'makani_maximum_prices',
            'type'         => 'textarea',
            'title'        => __( 'اعلى سعر', 'makani' ),
            'desc'         => __( 'Only provide comma separated numbers. Do not add decimal points, dashes, spaces or currency signs.', 'makani' ),
            'validate'     => 'no_html',
            'default'      => '5000, 10000, 50000, 100000, 200000, 300000, 400000, 500000, 600000, 700000, 800000, 900000, 1000000, 1500000, 2000000, 2500000, 5000000, 10000000',
        ),
		
		
        array(
            'id'       => 'makani_search_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => __( 'صفحة البحث عن العقارات', 'makani' ),
            'subtitle' => __( 'قم باختيار صفحة نتائج ', 'makani' ),
            'desc'     => __( 'Make sure the selected page is using Property Search template.', 'makani' ),
        ),

        array(
            'id'       => 'makani_search_properties_number',
            'type'     => 'select',
            'title'    => __( 'رقم العقارات فى صفحة نتائج البحث', 'makani' ),
            'options'  => array(
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5',
                6 => '6',
                7 => '7',
                8 => '8',
                9 => '9',
                10 => '10',
            ),
            'default'  => 6,
            'select2'  => array( 'allowClear' => false ),
        ),
     

    ) ) );
	
	/*
    *
    * ==================>Styles options  ==============================================
    *
    */
	Redux::setSection( $opt_name, array(
    'title' => __( 'التنسيق', 'makani' ),
	'id'    => 'makani_styles_section',
	'icon' => 'el el-brush',
    'icon_class' => 'icon-large',
    'fields'=> array(
	
	  array(
				'id'        => 'makani_color_switch',
				'type'      => 'switch',
				'title'     => __('color switch', 'makani'),
				'desc'     => __('يمكن تفعيل او الغاء اليقونه تغيير الالوان', 'makani'),
				'default'   => 1,
				'on'        => __('Enable','makani'),
				'off'       => __('Disable','makani'),
			),
			
		array(
            'id'        => 'makani_body-color',
            'type'      => 'color',
            'title'     => __( 'اللون الخلفيه', 'makani' ),
            'desc'      => 'default: #eff0f0',
            'default'   =>  '#eff0f0',
            'validate'  => 'color',
            'transparent' => false,
        ),
		
        array(
            'id'        => 'makani_primary-color',
            'type'      => 'color',
            'title'     => __( 'اللون الأساسى', 'makani' ),
            'desc'      => 'default: #00aee3',
            'default'   => '#00aee3',
            'validate'  => 'color',
            'transparent' => false,
            
        ),
        array(
            'id'        => 'makani_secondary-color',
            'type'      => 'color',
            'mode'      => 'color',
            'title'     => __( 'اللون الثانى', 'makani' ),
            'desc'      => 'default: #00d8b3',
            'default'   => '#00d8b3',
            'transparent' => false,
           
        ),
       
    ) ) );
	/*
    *
    * ==================>Property options  ==============================================
    *
    */
	Redux::setSection( $opt_name, array (
		'title' => __('تفاصيل صفحة العقار', 'makani'),
		'id'    => 'property-detail-section',
		'icon' => 'el el-edit',
        'icon_class' => 'icon-large',
		'fields'=> array (
	
	       array(
				'id'       => 'makani_property_images',
				'type'     => 'switch',
				'title'    => __( 'صور العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			
			array(
				'id'       => 'makani_property_details',
				'type'     => 'switch',
				'title'    => __( 'تفاصيل العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			array(
				'id'       => 'makani_property_features',
				'type'     => 'switch',
				'title'    => __( 'تفاصيل اضافية عن العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			  array(
		    	'id'   => 'divide-single5',
                'type' => 'divide'
            ),
			array(
				'id'       => 'makani_property_video',
				'type'     => 'switch',
				'title'    => __( 'فيديو العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			array(
				'id'       => 'makani_property_map',
				'type'     => 'switch',
				'title'    => __( 'خريطة العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			  array(
		    	'id'   => 'divide-single4',
                'type' => 'divide'
            ),
			array(
				'id'       => 'makani_property_share',
				'type'     => 'switch',
				'title'    => __( 'مشاركة المقال', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			array(
				'id'       => 'makani_property_date',
				'type'     => 'switch',
				'title'    => __( 'تاريخ اضافة العقار', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			  array(
		    	'id'   => 'divide-single3',
                'type' => 'divide'
            ),
			array(
				'id'       => 'makani_property_agent',
				'type'     => 'switch',
				'title'    => __( 'معلومات الوكيل', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
	         array(
		    	'id'   => 'divide-single2',
                'type' => 'divide'
            ),
			array(
				'id'       => 'makani_similar_properties',
				'type'     => 'switch',
				'title'    => __( 'عقارات متشابهة', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			array(
				'id'        => 'makani_similar_properties_title',
				'type'      => 'text',
				'title'     => __( 'عنوان جزء عقارات متشابهة', 'makani' ),
				'default'   => __( 'عقارات متشابهة', 'makani' ),
				'required' => array( 'makani_similar_properties', '=', 1 ),
			),
			array(
				'id'       => 'makani_similar_properties_number',
				'type'     => 'select',
				'title'    => __( 'عدد العقارات المتشابهة', 'makani' ),
				'options'  => array(
					2  => '2',
					4  => '4',
					6  => '6',
				),
				'default'  => 2,
				'select2'  => array( 'allowClear' => false ),
				'required' => array( 'makani_similar_properties', '=', 1 ),
			),
			 array(
		    	'id'   => 'divide-single1',
                'type' => 'divide'
            ),
			
			array(
				'id'       => 'makani_property_comments',
				'type'     => 'switch',
				'title'    => __( 'التعليق', 'makani' ),
				'default'  => 1,
				'on'       => __( 'Show', 'makani' ),
				'off'      => __( 'Hide', 'makani' ),
			),
			
			
		)
	) );
	/*
    *
    * ==================>pages options  ==============================================
    *
    */
	global $opt_name;
	Redux::setSection( $opt_name, array(
    'title' => __( 'الصفحات', 'makani' ),
	'icon' => 'el-icon-link',
    'icon_class' => 'icon-large',
    'id'    => 'Pages-section',
    'desc'  => __( 'هذا الرابط يحتوى على اعدادات صفحات الموقع', 'makani' ),
    'fields'=> array(
         /*
         * archive Page
         */
         array(
            'id'       => 'makani_archive_properties_number',
            'type'     => 'select',
            'title'    => __( 'عدد العقارات فى صفحة الأرشيف', 'makani' ),
            'options'  => array(
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5',
                6 => '6',
                7 => '7',
                8 => '8',
                9 => '9',
                10 => '10',
            ),
            'default'  => 6,
            'select2'  => array( 'allowClear' => false ),
        ),
		array(
		        'id'   => 'divide-pages1',
                'type' => 'divide'
         ),
        /*
         * Profile Page
         */
        array(
            'id'       => 'makani_edit_profile_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => __( 'صفحة تعديل الصفحة الشخصية', 'makani' ),
            'desc'     => __( 'تأكد من اختيار تعديل الملف الشخصى', 'makani' ),
        ),
		array(
			    'id'   => 'divide-pages2',
                'type' => 'divide'
        ),
        /*
         * Favorites Page
         */
        array(
            'id'       => 'makani_favorites_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => __( 'صفحة المفضلة', 'makani' ),
            'desc'     => __( 'تأكد من اختيار لمفضلة', 'makani' ),
        ),
        array(
            'id'       => 'makani_favorites_properties_number',
            'type'     => 'select',
            'title'    => __( 'عدد العقارات فى صفحة المفضلة', 'makani' ),
            'options'  => array(
                3 => '3',
                6 => '6',
                9 => '9',
                12 => '12',
                15 => '15',
            ),
            'default'  => 6,
            'select2'  => array( 'allowClear' => false ),
            'required' => array( 'makani_favorites_page', '>', 0 )
        ),

        array(
				'id'   => 'divide-pages3',
                'type' => 'divide'
         ),
        /*
         * Properties Page
         */
        array(
            'id'       => 'makani_my_properties_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => __( 'صفحة العقار', 'makani' ),
            'desc'     => __( 'تأكد من اختيار صفحة عقارى', 'makani' ),
        ),
        array(
            'id'       => 'makani_my_properties_number',
            'type'     => 'select',
            'title'    => __( 'عدد العقارات فى صفحة عقارى', 'makani' ),
            'options'  => array(
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5',
                6 => '6',
                7 => '7',
                8 => '8',
                9 => '9',
                10 => '10',
            ),
            'default'  => 5,
            'select2'  => array( 'allowClear' => false ),
            'required' => array( 'makani_my_properties_page', '>', 0 )
        ),

         array(
				'id'   => 'divide-pages4',
                'type' => 'divide'
         ),
        /*
         * Submit Property
         */
        array(
            'id'       => 'makani_submit_property_page',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => __( 'صفحة ادخال عقار', 'makani' ),
            'desc'     => __( 'تأكد من اختيار صفحة ادخال عقار', 'makani' ),
        ),
        array(
            'id'       => 'makani_default_submit_status',
            'type'     => 'button_set',
            'title'    => __( 'الحالة الافتراضية لادخال العقار', 'makani' ),
            'options'  => array(
                'pending' => __( 'Pending for Review', 'makani' ),
                'publish' => __( 'Publish', 'makani' ),
            ),
            'default'  => 'pending',
            'required' => array( 'makani_submit_property_page', '>', 0 )
        ),
		 array(
				'id'        => 'makani_add_property_title',
				'type'      => 'text',
				'title'     => __( ' تسجيل الدخول نص', 'makani' ),
		),
		  array(
				'id'        => 'makani_add_property_title2',
				'type'      => 'text',
				'title'     => __( ' أضف تفاصيل العقار نص', 'makani' ),
		),	
		
    ) ) );
	/*
    *
    * ==================> contact  ==============================================
    *
    */
	
	 Redux::setSection( $opt_name, array(
        'title'            => __( 'تواصل معنا', 'redux-framework-demo' ),
        'id'               => 'contact',
        'desc'             => __( '', 'redux-framework-demo' ),
        'customizer_width' => '500px',
        'icon'             => 'el el-envelope' ,
		) );
		
		 Redux::setSection( $opt_name, array(
			'title'      => __( 'روابط التواصل الاجتماعى', 'redux-framework-demo' ),
			'id'         => 'social-contact',
			'subsection' => true,
			'fields'           => array(
			
			 array(
					'id'       => 'facebook-link',
					'type'     => 'text',
					'title'    => __( 'رابط الفيس بوك', 'redux-framework-demo' ),
					'validate' => 'url',
					'default'  => 'https://www.facebook.com/'
				),
				
			 array(
					'id'       => 'twitter-link',
					'type'     => 'text',
					'title'    => __('رابط تويتر', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.twitter.com/'
				),
	
			 array(
					'id'       => 'google-plus-link',
					'type'     => 'text',
					'title'    => __('رابط جوجل بلس', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.google.com/'
				),
				 
			  array(
					'id'       => 'instagram-link',
					'type'     => 'text',
					'title'    => __('رابط انستجرام', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.instagram.com/'
				), 
				
			  array(
					'id'       => 'skype-link',
					'type'     => 'text',
					'title'    => __('رابط سكايبى', 'redux-framework-demo'),
					'subtitle' => __( 'مثل : live:makani', 'makani' ) ,
					'default'  => ''
					
				), 
				
			 array(
					'id'       => 'youtube-link',
					'type'     => 'text',
					'title'    => __('رابط اليوتيوب', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.youtube.com/'
				),
				
			  array(
					'id'       => 'linkedin-link',
					'type'     => 'text',
					'title'    => __('رابط لينكد ان', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.linkedin.com/'
				),	
				
			 array(
					'id'       => 'pinterest-link',
					'type'     => 'text',
					'title'    => __('رابط بينترست ', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://www.pinterest.com/'
				),
				
			array(
					'id'       => 'vimeo-link',
					'type'     => 'text',
					'title'    => __('رابط فيميو ', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://vimeo.com/'
				),
				
			array(
					'id'       => 'dribbble-link',
					'type'     => 'text',
					'title'    => __(' رابط دريبل', 'redux-framework-demo'),
					'validate' => 'url',
					'default'  => 'https://dribbble.com/'
				),
		
			 )
		) );	
			
		Redux::setSection( $opt_name, array(
			'title'      => __( 'بيانات التواصل', 'redux-framework-demo' ),
			'id'         => 'phone-contact',
			'subsection' => true,
			'fields'           => array(
			
			 array(
					'id'       => 'contact-phone1',
					'type'     => 'text',
					'title'    => __( 'رقم الهاتف الأول', 'redux-framework-demo' ),
					'validate' => 'numeric',
					'default'  => '0502239421'
				),
				
			 array(
					'id'       => 'contact-phone2',
					'type'     => 'text',
					'title'    => __('رقم الهاتف الثانى', 'redux-framework-demo'),
					'validate' => 'numeric',
					'default'  => '010005554556'
				),	
				
			 array(
					'id'       => 'contact-whatsapp',
					'type'     => 'text',
					'title'    => __('رقم تواصل على الواتس اب', 'redux-framework-demo'),
					'validate' => 'numeric',
					'default'  => '010005554556'
				),
			  array(
					'id'       => 'contact-mail',
					'type'     => 'text',
					'title'    => __(' contact mail ', 'redux-framework-demo'),
					'validate' => 'email',
					'default'  => 'info@makani.com'
				), 
				
				 array(
					'id'       => 'contact-form-page',
					'type'     => 'text',
					'title'    => __( 'استمارة المراسلة ', 'redux-framework-demo' ),
					'default'  => '[contact-form-7 id="229" title="استمارة الشريط الجانبى"]'
				),
				
				array(
				'id'=>'contact-info',
				'type'    => 'editor',
				'title' => __('معلومات تواصل اضافية', 'redux-framework-demo'),
				'default' => ' ',
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => false, ),
				),
		
			 )
		) );	
			
			
		
		Redux::setSection( $opt_name, array(
			'title'      => __( ' الخريطة ', 'redux-framework-demo' ),
			'id'         => 'contact-address',
			'subsection' => true,
			'fields'     => array(
				
				array(
					'id'       => 'makani_submit_address',
					'type'     => 'text',
					'title'    => __( 'نص العناون على خريطة جوجل', 'makani' ),
					'default'  => ' دمياط الجديدة , مصر ',
				),
				array(
					'id'       => 'makani_submit_location_coordinates',
					'type'     => 'text',
					'title'    => __( 'Latitude - Longitude ارقام تحديد الموقع على الخريطة', 'makani' ),
					'desc'     => sprintf ( 'يمكنك استخدام المواقع التاليه <a href="%1$s" target="_blank">latlong.net</a> or <a href="%2$s" target="_blank">itouchmap.com</a> للحصول على رقمين  Latitude و longitude للخريطة', esc_url( 'http://www.latlong.net/' ), esc_url( 'http://itouchmap.com/latlong.html' ) ),
					'default'  => '31.416047,31.819839',
				),
			   array(
					'id'       => 'makani_zoom_location',
					'type'     => 'select',
					'title'    => __( 'تحديد درجة تكبير و تصغير الخريطة', 'makani' ),
					'options'  => array(
						1 => '1',
						2 => '2',
						3 => '3',
						4 => '4',
						5 => '5',
						6 => '6',
						7 => '7',
						8 => '8',
						9 => '9',
						10 => '10',
						11 => '11',
						12 => '12',
						13 => '13',
						14 => '14',
						15 => '15',
						16 => '16',
						17 => '17',
						18 => '18',
					),
					'default'  => 10,
					'select2'  => array( 'allowClear' => false ),
				),
	  
	  
			
			)
      ) );
	 
    /*
    *
    * ==================> Footer options  ==============================================
    *
    */
	Redux::setSection( $opt_name, array(
		'title' => __( 'الفوتر', 'makani' ),
		'id'    => 'footer-section',
		'icon' => 'el el-adjust',
	    'icon_class' => 'icon-large',
		'desc'  => __( 'هذا القسم يحتوى على خيارات الفوتر للموقع', 'makani' ),
		'fields'=> array(
	
			array(
				'id'       => 'makani_footer_logo',
				'title'    => __( 'لوجو الفوتر', 'makani' ),
				'type'     => 'media',
				'url'      => false,
				'subtitle' => __( 'رفع اللجو الموجود فى فوتر الموقع', 'makani' ),
			),
			
			array(
				'id'=>'makani_footer_about',
				'type' => 'textarea',
				'title' => __('نص عن الشركة ', 'redux-framework-demo'),
				'desc' => __('', 'redux-framework-demo'),
				'default' => ''
			),
			
			array(
				'id'       => 'mail-feedburner',
				'type'     => 'text',
				'title'    => __( ' البريد الالكترونى ', 'redux-framework-demo' ),
				'subtitle' => __( 'البريد الالكترونى الخاص بالنشرة البريدية feedburner', 'makani' ),
				'default'  => ''
			),
			
			array(
				'id'        => 'mail-feedburner_switch',
				'type'      => 'switch',
				'title'     => __('تفعيل النشرة البريدية او الغائها', 'makani'),
				'default'   => 1,
				'on'        => __('Enable','makani'),
				'off'       => __('Disable','makani'),
			),
			
			array(
                'type' => 'divide'
            ),
			
			array(
				'id'       => 'footer_menu_title',
				'type'     => 'text',
				'title'    => __( ' عنوان القائمة الاولى ', 'redux-framework-demo' ),
				'default'  => 'خدماتنا'
			),
			array(
				'id'       => 'footer_menu_title2',
				'type'     => 'text',
				'title'    => __( ' عنوان القائمة الثانية ', 'redux-framework-demo' ),
				'default'  => 'مشروعات متميزة'
			),
				
			array(
                'type' => 'divide'
            ),
			
			array(
				'id'           => 'makani_copyright_html',
				'type'         => 'textarea',
				'title'        => __( 'حقوق الملكية', 'makani' ),
				'desc'         => __( 'Allowed html tags are a, br, em and strong.', 'makani' ),
				'validate'     => 'html_custom',
				'default'      => sprintf( '&copy; Copyright 2015 All rights reserved by '),
				'allowed_html' => array(
					'a'      => array(
						'href'  => array(),
						'title' => array(),
						'target' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array()
				), 
			),
	
		) ) );

    /*
    * ========================================================================================== 
    * ==================> END options  =========================================================
    * ==========================================================================================
    */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

