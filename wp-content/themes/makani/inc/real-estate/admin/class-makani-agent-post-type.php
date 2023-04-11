<?php
class makani_Agent_Post_Type {
    public function register_agent_post_type() {

        $labels = array(
            'name'                => _x( 'وكيل', 'Post Type General Name', 'makani-real-estate' ),
            'singular_name'       => _x( 'وكيل', 'Post Type Singular Name', 'makani-real-estate' ),
            'menu_name'           => __( 'الوكلاء', 'makani-real-estate' ),
            'name_admin_bar'      => __( 'الوكيل', 'makani-real-estate' ),
            'parent_item_colon'   => __( 'الوكيل:', 'makani-real-estate' ),
            'all_items'           => __( 'كل الوكلاء', 'makani-real-estate' ),
            'add_new_item'        => __( 'أضف وكيل جديد', 'makani-real-estate' ),
            'add_new'             => __( 'أضف جديد', 'makani-real-estate' ),
            'new_item'            => __( 'وكيل جديد', 'makani-real-estate' ),
            'edit_item'           => __( 'تعديل وكيل', 'makani-real-estate' ),
            'update_item'         => __( 'تعديل وكيل', 'makani-real-estate' ),
            'view_item'           => __( 'معاينة', 'makani-real-estate' ),
            'search_items'        => __( 'البحث', 'makani-real-estate' ),
            'not_found'           => __( 'لا يوجد', 'makani-real-estate' ),
            'not_found_in_trash'  => __( 'لا يوجد فى سلة المهملات', 'makani-real-estate' ),
        );

        $rewrite = array(
            'slug'                => __( 'agent', 'makani-real-estate'),
            'with_front'          => true,
            'pages'               => true,
            'feeds'               => false,
        );

        $args = array(
            'label'               => __( 'agent', 'makani-real-estate' ),
            'description'         => __( 'Real Estate Agent', 'makani-real-estate' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-businessman',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );

        register_post_type( 'agent', $args );

    }

    public function register_custom_column_titles ( $defaults ) {
        $new_columns = array(
            "thumb"     => __( 'Photo', 'makani-real-estate' ),
            "email"     => __( 'Email', 'makani-real-estate' ),
            "mobile"    => __( 'Mobile', 'makani-real-estate'),
        );
        $last_columns = array();
        if ( count( $defaults ) > 2 ) {
            $last_columns = array_splice( $defaults, 2, 1 );
        }
        $defaults = array_merge( $defaults, $new_columns );
        $defaults = array_merge( $defaults, $last_columns );
        return $defaults;
    }

    
    public function display_custom_column ( $column_name ) {
        global $post;

        switch ( $column_name ) {
            case 'thumb':
                if ( has_post_thumbnail ( $post->ID ) ) {
                    ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <?php the_post_thumbnail( array( 130, 130 ) );?>
                    </a>
                    <?php
                } else {
                    _e ( 'No Image', 'makani-real-estate' );
                }
                break;
            case 'email':
                $agent_email = is_email( get_post_meta ( $post->ID, 'makani_agent_email', true ) );
                if ( $agent_email ) {
                    echo $agent_email;
                } else {
                    _e ( 'NA', 'makani-real-estate' );
                }
                break;

            case 'mobile':
                $mobile_number = get_post_meta ( $post->ID, 'makani_mobile_number', true );
                if ( !empty( $mobile_number ) ) {
                    echo $mobile_number;
                } else {
                    _e ( 'NA', 'makani-real-estate' );
                }
                break;

            default:
                break;
        }
    }

    public function register_meta_boxes ( $meta_boxes ){
        $prefix = 'makani_';
        // Agent Meta Box
        $meta_boxes[] = array(
            'id'        => 'agent-meta-box',
            'title'     => __('Contact Details', 'makani-real-estate'),
            'pages'     => array( 'agent' ),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields'    => array(
                array(
                    'name'  => __( 'Job Title', 'makani-real-estate' ),
                    'id'    => "makani_job_title",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __( 'Email Address', 'makani-real-estate' ),
                    'id'    => "{$prefix}agent_email",
                    'desc'  => __( "Agent related messages from contact form on property details page, will be sent on this email address.", "makani-real-estate" ),
                    'type'  => 'email',
                ),
                array(
                    'name'  => __( 'Mobile Number', 'makani-real-estate' ),
                    'id'    => "{$prefix}mobile_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Office Number', 'makani-real-estate'),
                    'id'    => "{$prefix}office_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Fax Number', 'makani-real-estate'),
                    'id'    => "{$prefix}fax_number",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __( 'Office Address', 'makani-real-estate' ),
                    'id'    => "makani_office_address",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Facebook URL', 'makani-real-estate'),
                    'id'    => "{$prefix}facebook_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Twitter URL', 'makani-real-estate'),
                    'id'    => "{$prefix}twitter_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Google Plus URL', 'makani-real-estate'),
                    'id'    => "{$prefix}google_plus_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('LinkedIn URL', 'makani-real-estate'),
                    'id'    => "{$prefix}linked_in_url",
                    'type'  => 'text',
                ),
                array(
                    'name'  => __('Pinterest URL', 'makani-real-estate'),
                    'id'    => "makani_pinterest_url",
                    'type'  => 'url',
                ),
                array(
                    'name'  => __('Instagram URL', 'makani-real-estate'),
                    'id'    => "makani_instagram_url",
                    'type'  => 'url',
                )

            )
        );

        $meta_boxes = apply_filters( 'agent_meta_boxes', $meta_boxes );
        return $meta_boxes;
    }
}