<?php
global $makani_options;

// Search Fields
$search_fields = $makani_options['makani_search_fields']['enabled'];
$search_page = "";
if( isset( $makani_options['makani_search_page'] ) ){
    $search_page = $makani_options['makani_search_page'];
}

// A redux fix
if( isset( $search_fields[ 'placebo' ] ) ) {
    unset( $search_fields[ 'placebo' ] );
}

global $number_search_fields;
$number_search_fields = count( $search_fields );

// increment the number of search fields as min max has two fields
if( isset( $search_fields[ 'min-max-price' ] ) ) {
    $number_search_fields++;
}

// increment the number of search fields as min max has two fields
if( isset( $search_fields[ 'min-max-area' ] ) ) {
    $number_search_fields++;
}

if ( ( 0 < $number_search_fields ) && ( !empty( $search_page ) ) ) {
    ?>
    <form class="advance-search-form" action="<?php echo get_permalink( $search_page ); ?>" method="get">
        <div class="inline-fields clearfix">
        <?php
        global $field_counter;
        $field_counter = 0;
        foreach ( $search_fields as $key => $val  ) {

            switch( $key ) {

                case 'keyword':
                    get_template_part( 'partials/search/fields/keyword' );
                    $field_counter++;
                    break;

                case 'location':
                    get_template_part( 'partials/search/fields/locations' );

                    // code to display hidden field separator at right place
                    $number_of_location_boxes = makani_get_locations_number();
                    if ( $number_of_location_boxes > 1 && $field_counter < 3 ) {
                        $field_counter += $number_of_location_boxes;
                        if ( $field_counter > 3 ) {
                            get_template_part( 'partials/search/hidden-fields-separator' );
                        }
                    } else {
                        $field_counter++;
                    }
                    break;

                case 'status':
                    get_template_part( 'partials/search/fields/property-status' );
                    $field_counter++;
                    break;

                case 'type':
                    get_template_part( 'partials/search/fields/property-type' );
                    $field_counter++;
                    break;

                case 'min-beds':
                    get_template_part( 'partials/search/fields/beds' );
                    $field_counter++;
                    break;

                case 'min-baths':
                    get_template_part( 'partials/search/fields/baths' );
                    $field_counter++;
                    break;

                case 'min-max-price':
                    get_template_part( 'partials/search/fields/min-price' );
                    $field_counter++;

                    if ( $field_counter == 3 ) {
                        get_template_part( 'partials/search/hidden-fields-separator' );
                    }

                    get_template_part( 'partials/search/fields/max-price' );
                    $field_counter++;
                    break;

                case 'min-max-area':
                    get_template_part( 'partials/search/fields/min-area' );
                    $field_counter++;

                    if ( $field_counter == 3 ) {
                        get_template_part( 'partials/search/hidden-fields-separator' );
                    }

                    get_template_part( 'partials/search/fields/max-area' );
                    $field_counter++;
                    break;

                case 'property-id':
                    get_template_part( 'partials/search/fields/property-id' );
                    $field_counter++;
                    break;

            }

            if ( ( $field_counter == 3 ) || ( $field_counter < 3 && $field_counter == $number_search_fields ) ) {
                get_template_part( 'partials/search/hidden-fields-separator' );
            }
        }

        if ( $field_counter > 3  ) {
            ?>
            </div>
            <!-- .hidden-fields -->
            <?php
        }

        // generated sort by field
        if ( isset( $_GET['sortby'] ) ) {
            echo '<input type="hidden" name="sortby" value="' . $_GET['sortby'] . '" />';
        }
    ?>
    </form><!-- .advance-search-form -->
    <?php
}