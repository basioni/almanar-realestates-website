<?php
/*
* Property custom post
*/
class makani_Property_Post_Type {
/*-----------------------------------------------*
// Register Property Post Type
/*-----------------------------------------------*/
    public function register_property_post_type() {
        $labels = array(
            'name'                => _x( 'property', 'Post Type General Name', 'makani-real-estate' ),
            'singular_name'       => _x( 'العقارات', 'Post Type Singular Name', 'makani-real-estate' ),
            'menu_name'           => __( 'العقارات', 'makani-real-estate' ),
            'name_admin_bar'      => __( 'العقار', 'makani-real-estate' ),
            'parent_item_colon'   => __( 'Parent العقار:', 'makani-real-estate' ),
            'all_items'           => __( 'كل العقارات', 'makani-real-estate' ),
            'add_new_item'        => __( 'أضف عقار جديد', 'makani-real-estate' ),
            'add_new'             => __( 'أضف جديد', 'makani-real-estate' ),
            'new_item'            => __( 'عقار جديد', 'makani-real-estate' ),
            'edit_item'           => __( 'تعديل عقار', 'makani-real-estate' ),
            'update_item'         => __( 'تعديل عقار', 'makani-real-estate' ),
            'view_item'           => __( 'عرض العقار', 'makani-real-estate' ),
            'search_items'        => __( 'البحث عن العقار', 'makani-real-estate' ),
            'not_found'           => __( 'لا يوجد', 'makani-real-estate' ),
            'not_found_in_trash'  => __( 'لا يوجد فى سلة المهملات', 'makani-real-estate' ),
        );
        $rewrite = array(
            'slug'                => __( 'العقارات', 'makani-real-estate' ),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => true,
        );
        $args = array(
            'label'               => __( 'العقارات', 'makani-real-estate' ),
            'description'         => __( 'شركة عقارات', 'makani-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes', 'comments' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-building',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );

        register_post_type( 'property', $args );
    }
/*-----------------------------------------------*
// Property Type Taxonomy
/*-----------------------------------------------*/
    public function register_property_type_taxonomy() {
        $labels = array(
            'name'                       => _x( 'نوع العقار', 'Taxonomy General Name', 'makani-real-estate' ),
            'singular_name'              => _x( 'نوع العقار', 'Taxonomy Singular Name', 'makani-real-estate' ),
            'menu_name'                  => __( 'نوع العقار', 'makani-real-estate' ),
            'all_items'                  => __( 'كل انواع العقارات', 'makani-real-estate' ),
            'parent_item'                => __( 'Parent Property Type', 'makani-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Type:', 'makani-real-estate' ),
            'new_item_name'              => __( 'نوع جدبد العقار', 'makani-real-estate' ),
            'add_new_item'               => __( 'نوع جدبد العقار', 'makani-real-estate' ),
            'edit_item'                  => __( 'تعديل نوع العقار', 'makani-real-estate' ),
            'update_item'                => __( 'تعديل نوع العقار', 'makani-real-estate' ),
            'view_item'                  => __( 'عرض نوع العقار', 'makani-real-estate' ),
            'separate_items_with_commas' => __( 'قم بالفصل بين انواع العقار بفاصلة', 'makani-real-estate' ),
            'add_or_remove_items'        => __( 'أضف او احذف نوع العقار', 'makani-real-estate' ),
            'choose_from_most_used'      => __( 'قم باختار الاكثر استخداما', 'makani-real-estate' ),
            'popular_items'              => __( 'انوع العقار الاكثر استخدما', 'makani-real-estate' ),
            'search_items'               => __( 'البحث نوع العقار', 'makani-real-estate' ),
            'not_found'                  => __( 'لا يوجد', 'makani-real-estate' ),
        );
        $rewrite = array(
            'slug'                       => __( 'نوع العقار', 'makani-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'property-type', array( 'property' ), $args );
    }
/*-----------------------------------------------*
// Property Status Taxonomy
/*-----------------------------------------------*/
    public function register_property_status_taxonomy() {
        $labels = array(
            'name'                       => _x( 'حالة العقار', 'Taxonomy General Name', 'makani-real-estate' ),
            'singular_name'              => _x( 'حالة العقار', 'Taxonomy Singular Name', 'makani-real-estate' ),
            'menu_name'                  => __( 'حالة العقارات', 'makani-real-estate' ),
            'all_items'                  => __( 'كل حالات العقار', 'makani-real-estate' ),
            'parent_item'                => __( 'Parent Property Status', 'makani-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Status:', 'makani-real-estate' ),
            'new_item_name'              => __( 'جديد حالة العقار', 'makani-real-estate' ),
            'add_new_item'               => __( 'جديد حالة العقار', 'makani-real-estate' ),
            'edit_item'                  => __( 'تعديل حالة العقار', 'makani-real-estate' ),
            'update_item'                => __( 'تعديل حالة العقار', 'makani-real-estate' ),
            'view_item'                  => __( 'عرض حالة العقار', 'makani-real-estate' ),
            'separate_items_with_commas' => __( 'قم بالفصل بين حالة العقار بفاصلة', 'makani-real-estate' ),
            'add_or_remove_items'        => __( 'أضف او احذف حالة العقار', 'makani-real-estate' ),
			'add_or_remove_items'        => __( 'أضف او احذف حالة العقار', 'makani-real-estate' ),
            'choose_from_most_used'      => __( 'قم باختار الاكثر استخداما', 'makani-real-estate' ),
            'popular_items'              => __( 'انوع العقار الاكثر استخدما', 'makani-real-estate' ),
            'search_items'               => __( 'البحث حالة العقار', 'makani-real-estate' ),
            'not_found'                  => __( 'لا يوجد', 'makani-real-estate' ),
        );
        $rewrite = array(
            'slug'                       => __( 'حالة العقار', 'makani-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'property-status', array( 'property' ), $args );
    }
/*-----------------------------------------------*
// Property City Taxonomy
/*-----------------------------------------------*/
    public function register_property_city_taxonomy() {
        $labels = array(
            'name'                       => _x( 'المدينة', 'Taxonomy General Name', 'makani-real-estate' ),
            'singular_name'              => _x( 'المدينة', 'Taxonomy Singular Name', 'makani-real-estate' ),
            'menu_name'                  => __( 'المدينة', 'makani-real-estate' ),
            'all_items'                  => __( 'كل المدن للعقارت', 'makani-real-estate' ),
            'parent_item'                => __( 'Parent Property City', 'makani-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property City:', 'makani-real-estate' ),
            'new_item_name'              => __( 'مدينة جديدة', 'makani-real-estate' ),
            'add_new_item'               => __( 'مدينة جدية', 'makani-real-estate' ),
            'edit_item'                  => __( 'تعديل المدينة', 'makani-real-estate' ),
            'update_item'                => __( 'تعديل المدينة', 'makani-real-estate' ),
            'view_item'                  => __( 'عرض المدينة', 'makani-real-estate' ),
            'separate_items_with_commas' => __( 'قم بالفصل بين حالة العقار بفاصلة', 'makani-real-estate' ),
            'add_or_remove_items'        => __( 'أضف او احذف المدينة', 'makani-real-estate' ),
			'add_or_remove_items'        => __( 'أضف او احذف المدينة', 'makani-real-estate' ),
            'choose_from_most_used'      => __( 'قم باختار الاكثر استخداما', 'makani-real-estate' ),
            'popular_items'              => __( 'انوع المدينة الاكثر استخدما', 'makani-real-estate' ),
            'search_items'               => __( 'البحث المدينة العقار', 'makani-real-estate' ),
            'not_found'                  => __( 'لا يوجد', 'makani-real-estate' ),
        );
        $rewrite = array(
            'slug'                       => __( 'المدينة', 'makani-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'property-city', array( 'property' ), $args );
    }
/*-----------------------------------------------*
// Property Features Taxonomy
/*-----------------------------------------------*/
    public function register_property_feature_taxonomy() {
        $labels = array(
            'name'                       => _x( 'مميزات العقار', 'Taxonomy General Name', 'makani-real-estate' ),
            'singular_name'              => _x( 'مميزات العقار', 'Taxonomy Singular Name', 'makani-real-estate' ),
            'menu_name'                  => __( 'مميزات العقار', 'makani-real-estate' ),
            'all_items'                  => __( 'كل مميزات العقارات', 'makani-real-estate' ),
            'parent_item'                => __( 'Parent Property Feature', 'makani-real-estate' ),
            'parent_item_colon'          => __( 'Parent Property Feature:', 'makani-real-estate' ),
            'new_item_name'              => __( 'مميزات جديدة', 'makani-real-estate' ),
            'add_new_item'               => __( 'اضف مميزات جديدة', 'makani-real-estate' ),
            'edit_item'                  => __( 'تعديل المميزات', 'makani-real-estate' ),
            'update_item'                => __( 'تعديل المميزات', 'makani-real-estate' ),
            'view_item'                  => __( 'عرض المميزات', 'makani-real-estate' ),
            'separate_items_with_commas' => __( 'قم بالفصل بين حالة العقار بفاصلة', 'makani-real-estate' ),
            'add_or_remove_items'        => __( 'أضف او احذف المميزات', 'makani-real-estate' ),
			'add_or_remove_items'        => __( 'أضف او احذف المميزات', 'makani-real-estate' ),
            'choose_from_most_used'      => __( 'قم باختار الاكثر استخداما', 'makani-real-estate' ),
            'popular_items'              => __( 'انوع المميزات الاكثر استخدما', 'makani-real-estate' ),
            'search_items'               => __( 'البحث المميزات العقار', 'makani-real-estate' ),
            'not_found'                  => __( 'لا يوجد', 'makani-real-estate' ),
        );
        $rewrite = array(
            'slug'                       => __( 'مميزات العقار', 'makani-real-estate' ),
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => false,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( 'property-feature', array( 'property' ), $args );
    }
/*-----------------------------------------------*
// register_custom_column
/*-----------------------------------------------*/	
    public function register_custom_column_titles ( $defaults ) {
       
        $last_columns = array();
        if ( count( $defaults ) > 2 ) {
            $last_columns = array_splice( $defaults, 2, 1 );
        }
        $defaults = array_merge( $defaults, $last_columns );
        return $defaults;
    }
/*-----------------------------------------------*
// Register meta boxes related to property post type
/*-----------------------------------------------*/
    public function register_meta_boxes ( $meta_boxes ){
        $prefix = 'makani_';
        // Agents
        $agents_array = array( -1 => __( 'None', 'makani-real-estate' ) );
        $agents_posts = get_posts( array (
            'post_type' => 'agent',
            'posts_per_page' => -1,
            'suppress_filters' => 0,
            ) );
        if ( ! empty ( $agents_posts ) ) {
            foreach ( $agents_posts as $agent_post ) {
                $agents_array[ $agent_post->ID ] = $agent_post->post_title;
            }
        }
        // Property Details Meta Box
        $default_desc = __( 'Consult theme documentation for required image size.', 'makani-real-estate' );
        $gallery_images_desc = apply_filters( 'makani_gallery_description', $default_desc );
        $video_image_desc = apply_filters( 'makani_video_description', $default_desc );
        $slider_image_desc = apply_filters( 'makani_slider_description', $default_desc );

        $meta_boxes[] = array(
            'id' => 'property-meta-box',
            'title' => __('تفاصيل العقار', 'makani-real-estate'),
            'pages' => array('property'),
            'fields' => array(
                
				array(
                    'name' => __('? عرض العقار فى شرائح العرض ', 'makani-real-estate'),
                    'id' => "{$prefix}silder_property",
                    'type' => 'checkbox',
                    'std' => 1,
                    'options' => array( '1' => __('Yes') ),
					'default'  => '1'// 1 = on | 0 = off
                ),
				 array(
                    'name' => __('?عقار مميز ', 'makani-real-estate'),
                    'id' => "{$prefix}featured",
                    'type' => 'checkbox',
                    'multi'    => false,
					'std' => '1',
                    'options' => array( '1' => __('Yes')),
					'default'   => '1' ,
                ),
				array(
                    'type' => 'divider',
                    'columns' => 12,
                ),
				
				
				
                array(
                    'id' => "{$prefix}property_price",
                    'name' => __('السعر', 'makani-real-estate'),
                    'desc' => __('ادخال ارقام فقط', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "",
                ),
                array(
                    'id' => "{$prefix}property_price_postfix",
                    'name' => __('العملة', 'makani-real-estate'),
                    'desc' => __('أضف العملة المستخدمة مثل : $', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => 'EG',
                ),
				array(
                    'type' => 'divider',
                    'columns' => 12,
                ),
				
				
				
                array(
                    'id' => "{$prefix}property_size",
                    'name' => __('المساحة', 'makani-real-estate'),
                    'desc' => __('ادخال ارقام فقط', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "",
                ),
                array(
                    'id' => "{$prefix}property_size_postfix",
                    'name' => __('وحدة قياس المساحة', 'makani-real-estate'),
                    'desc' => __('مثل: Sq Ft', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "متر",
                ),
				array(
                    'type' => 'divider',
                    'columns' => 12,
                ),
				
				
				
                array(
                    'id' => "{$prefix}property_bedrooms",
                    'name' => __('عدد حجرات النوم', 'makani-real-estate'),
                    'desc' => __('Example Value: 4', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "",
                ),
                array(
                    'id' => "{$prefix}property_bathrooms",
                    'name' => __('عدد دورات المياة', 'makani-real-estate'),
                    'desc' => __('Example Value: 2', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "",
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                ),
				
                array(
                    'id' => "{$prefix}property_address",
                    'name' => __('العنوان بالتفصيل', 'makani-real-estate'),
                    'desc' => __('', 'makani-real-estate'),
                    'type' => 'text',
                    'std' => "",
                ),
				
                array(
                    'id' => "{$prefix}property_location",
                    'name' => __('Property Location at Google Map*', 'makani-real-estate'),
                    'desc' => __('Drag the google map marker to point your property location. You can also use the address field above to search for your property.', 'makani-real-estate'),
                    'type' => 'map',
                    'std' => '26.011812,-80.14524499999999,15',   // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$prefix}property_address",
                    'columns' => 12,
                ),
				array(
                    'type' => 'divider',
                    'columns' => 12,
                ),
				
				
				
                array(
                    'name' => __('معرض الصور للعقار', 'makani-real-estate'),
                    'id' => "{$prefix}property_images",
                    'type' => 'image_advanced',
	    			'width'       => 240,
                    'height'      => 180,
                    'max_file_uploads' => 48,
                ),
                array(
                    'id' => "{$prefix}video_url",
                    'name' => __('رابط الفيديو', 'makani-real-estate'),
                    'desc' => __('YouTube رابط الفيديو', 'makani-real-estate'),
                    'type' => 'text',
                    'columns' => 12,
                ),
			    array(
                    'id' => "{$prefix}attachments",
                    'name' => __('ملفات مرفقة', 'makani-real-estate'),
                    'desc' => __('PDF يمكنك اضافة ملفات للعقار', 'makani-real-estate'),
                    'type' => 'file_advanced',
                    'mime_type' => '',
                ),
			    array(
                    'type' => 'divider',
                    'columns' => 12,
                ),



                array(
                    'name' => __('What to display in agent information box ?', 'makani-real-estate'),
                    'id' => "{$prefix}agent_display_option",
                    'type' => 'radio',
                    'std' => 'none',
                    'options' => array(
                        'my_profile_info' => __('Author information.', 'makani-real-estate'),
                        'agent_info' => __('Agent Information. ( Select the agent below )', 'makani-real-estate'),
                        'none' => __('None. ( Hide information box )', 'makani-real-estate'),
                    ),
                ),
                array(
                    'name' => __('Agent', 'makani-real-estate'),
                    'id' => "{$prefix}agents",
                    'type' => 'select',
                    'options' => $agents_array,
                ),
			  
            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'property_meta_boxes', $meta_boxes );

        return $meta_boxes;
    }



    /*
     * Property custom ID search support for properties index page on admin side
     ============================================================================= */

    /**
     * Check if current page is properties index page on admin side
     * @return bool
     */
    public function is_properties_index_page() {
        global $pagenow;
        return ( is_admin() && $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'property' && isset($_GET['s']) );
    }


    /**
     * Joins post meta table with posts table for search purpose
     * @param $join
     * @return string
     */
    public function join_post_meta_table( $join ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
        }
        return $join;
    }


    /**
     * Add property custom id in search
     *
     * @param $where
     * @return mixed
     */
    public function add_property_id_in_search( $where ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $where = preg_replace(
                "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_key = 'makani_property_id') AND (".$wpdb->postmeta.".meta_value LIKE $1)",
                $where );
        }
        return $where;
    }


    /**
     * Add group by properties support
     * @param $group_by
     * @return string
     */
    function group_by_properties( $group_by ) {
        global $wpdb;
        if ( $this->is_properties_index_page() ) {
            $group_by = "$wpdb->posts.ID";
        }
        return $group_by;
    }


}