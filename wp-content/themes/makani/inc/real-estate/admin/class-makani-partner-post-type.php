<?php
class makani_Partner_Post_Type {
    public function register_partner_post_type() {

        $labels = array(
            'name'                => _x( 'شركائنا', 'Post Type General Name', 'makani-real-estate' ),
            'singular_name'       => _x( 'شركائنا', 'Post Type Singular Name', 'makani-real-estate' ),
            'menu_name'           => __( 'شركائنا', 'makani-real-estate' ),
            'name_admin_bar'      => __( 'شركائنا', 'makani-real-estate' ),
            'parent_item_colon'   => __( 'شركائنا:', 'makani-real-estate' ),
            'all_items'           => __( 'كل الشركاء', 'makani-real-estate' ),
            'add_new_item'        => __( 'اضف جديد', 'makani-real-estate' ),
            'add_new'             => __( 'اضف جديد', 'makani-real-estate' ),
            'new_item'            => __( 'اضف جديد', 'makani-real-estate' ),
            'edit_item'           => __( 'تعديل الشركاء', 'makani-real-estate' ),
            'update_item'         => __( 'تعديل الشركاء', 'makani-real-estate' ),
            'view_item'           => __( 'معاينة', 'makani-real-estate' ),
            'search_items'        => __( 'البحث فى الشركاء', 'makani-real-estate' ),
            'not_found'           => __( 'لا يوجد ', 'makani-real-estate' ),
            'not_found_in_trash'  => __( 'لا يوجد فى سلة المهملات', 'makani-real-estate' ),
        );

        $args = array(
            'label'               => __( 'شركائنا', 'makani-real-estate' ),
            'description'         => __( 'شركائنا', 'makani-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', ),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-groups',
            'show_in_admin_bar'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'rewrite'             => false,
            'capability_type'     => 'post',
        );

        register_post_type( 'partners', $args );

    }

    public function register_custom_column_titles ( $defaults ) {

        $new_columns = array(
            "thumb"     => __( 'Logo', 'makani-real-estate' ),
        );
        $last_columns = array();

        if ( count( $defaults ) > 2 ) {
            $last_columns = array_splice( $defaults, 2, 1 );
        }

        $defaults = array_merge( $defaults, $new_columns );
        $defaults = array_merge( $defaults, $last_columns );

        return $defaults;
    }
   
    /**
     * Register meta boxes related to partner post type
    */
    public function register_meta_boxes ( $meta_boxes ){

        $prefix = 'makani_';

        $meta_boxes[] = array(
            'id' => 'partners-meta-box',
            'title' => __('رابط موقع الشركاء  ', 'makani-real-estate'),
            'pages' => array( 'partners' ),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => __('Website URL', 'makani-real-estate'),
                    'id' => "{$prefix}partner_url",
                    'desc' => __('Provide website URL', 'makani-real-estate'),
                    'type' => 'text',
                )
            )
        );

        // apply a filter before returning meta boxes
        $meta_boxes = apply_filters( 'partner_meta_boxes', $meta_boxes );

        return $meta_boxes;
    }

}