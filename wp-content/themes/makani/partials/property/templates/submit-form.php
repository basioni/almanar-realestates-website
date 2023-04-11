<?php

global $makani_options;
?>
<form id="submit-property-form" class="submit-form" enctype="multipart/form-data" method="post">

    <div class="row">

        <div class="col-md-6">

            <div class="form-option">
                <label for="title"><?php _e('Property Title', 'makani'); ?></label>
                <input id="title" name="title" type="text" class="required" title="<?php _e('* Please provide property title!', 'makani'); ?>" autofocus required/>
            </div>

            <div class="form-option">
                <label for="description"><?php _e('Property Description', 'makani'); ?></label>
                <textarea name="description" id="description" cols="30" rows="5"></textarea>
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-option">
                <label for="address"><?php _e('Address', 'makani'); ?></label>
                <input type="text" class="required" name="address" id="address" value="<?php echo esc_attr( $makani_options[ 'makani_submit_address' ] ); ?>" title="<?php _e('* Please provide a property address!', 'makani'); ?>" required/>
                <div class="map-wrapper">
                    <button class="btn-default goto-address-button" type="button" value="address"><?php _e('Find Address', 'makani'); ?></button>
                    <div class="map-canvas"></div>
                    <input type="hidden" name="location" class="map-coordinate" value="<?php echo esc_attr( $makani_options[ 'makani_submit_location_coordinates' ] ); ?>"/>
                </div>
            </div>

        </div>

    </div>
    <!-- .row -->

    <div class="row">

        <div class="col-md-4">
            <div class="form-option">
                <label for="type"><?php _e('Type', 'makani'); ?></label>
                <select name="type" id="type" class="search-select">
                    <option selected="selected" value="-1"><?php _e('None', 'makani'); ?></option>
                    <?php
                    // Property type terms
                    $type_terms = get_terms( 'property-type', array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false,
                            'parent' => 0,
                        )
                    );

                    makani_hierarchical_id_options( 'property-type', $type_terms, -1 );
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="city"><?php _e('Location', 'makani'); ?></label>
                <select name="city" id="city" class="search-select">
                    <option selected="selected" value="-1"><?php _e('None', 'makani'); ?></option>
                    <?php
                    // Property location terms
                    $location_terms = get_terms( 'property-city', array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false,
                            'parent' => 0,
                        )
                    );

                    makani_hierarchical_id_options( 'property-city', $location_terms, -1 );
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="status"><?php _e('Status', 'makani'); ?></label>
                <select name="status" id="status" class="search-select">
                    <option selected="selected" value="-1"><?php _e('None', 'makani'); ?></option>
                    <?php
                    // Property status terms
                    $status_terms = get_terms( 'property-status', array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false,
                            'parent' => 0,
                        )
                    );

                    makani_hierarchical_id_options( 'property-status', $status_terms, -1 );
                    ?>
                </select>
            </div>
        </div>

    </div>
    <!-- .row -->

    <div class="row">

        <div class="col-md-4">
            <div class="form-option">
                <label for="bedrooms"><?php _e('Bedrooms', 'makani'); ?></label>
                <input id="bedrooms" name="bedrooms" type="text" title="<?php _e('* Only numbers allowed!', 'makani'); ?>"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="bathrooms"><?php _e('Bathrooms', 'makani'); ?></label>
                <input id="bathrooms" name="bathrooms" type="text" title="<?php _e('* Only numbers allowed!', 'makani'); ?>"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="garages"><?php _e('Garages', 'makani'); ?></label>
                <input id="garages" name="garages" type="text" title="<?php _e('* Only numbers allowed!', 'makani'); ?>"/>
            </div>
        </div>

    </div>
    <!-- .row -->

    <div class="row">

        <div class="col-md-4">
            <div class="form-option">
                <label for="price"><?php _e('Sale OR Rent Price', 'makani'); ?></label>
                <input id="price" name="price" type="text" title="<?php _e('* Only numbers allowed!', 'makani'); ?>"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="price-postfix"><?php _e('Price Postfix Text', 'makani'); ?></label>
                <input id="price-postfix" name="price-postfix" type="text"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="size"><?php _e( 'Area', 'makani' ); ?></label>
                <input id="size" name="size" type="text" title="<?php _e('* Only numbers allowed!', 'makani'); ?>"/>
            </div>
        </div>

    </div>
    <!-- .row -->

    <div class="row">

        <div class="col-md-4">
            <div class="form-option">
                <label for="area-postfix"><?php _e('Area Postfix Text', 'makani'); ?></label>
                <input id="area-postfix" name="area-postfix" type="text" value="<?php _e('SqFt', 'makani'); ?>"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="property-id"><?php _e('Property ID', 'makani'); ?></label>
                <input id="property-id" name="property-id" type="text" title="<?php _e('Property ID', 'makani'); ?>"/>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-option">
                <label for="video-url"><?php _e('Virtual Tour Video URL', 'makani'); ?></label>
                <input id="video-url" name="video-url" type="text" />
            </div>
        </div>

    </div>
    <!-- .row -->


    <div class="row container-row">

        <div class="col-lg-6">
            <div class="form-option">
                <div id="gallery-thumbs-container" class="clearfix"></div>
                <div id="drag-and-drop">
                    <div class="drag-drop-msg text-center">
                        <i class="fa fa-cloud-upload"></i>&nbsp;&nbsp;<?php _e('Drag and drop images here', 'makani'); ?>
                        <br/>
                        <span class="drag-or"><?php _e('OR', 'makani'); ?></span>
                        <br/>
                        <a id="select-images" class="drag-btn btn-default btn-orange" href="javascript:;"><?php _e('Select Images', 'makani'); ?></a>
                    </div>
                </div>

                <ul class="field-description list-unstyled">
                    <li><span>*</span><?php _e('An image should have minimum width of 850px and minimum height of 600px.', 'makani'); ?></li>
                    <li><span>*</span><?php _e('You can mark an image as featured by clicking the star icon, Otherwise first image will be considered featured image.', 'makani'); ?></li>
                </ul>
                <div id="plupload-container"></div>
                <div id="errors-log"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-option">
                <label class="fancy-title"><?php _e('What to display in agent information box ?', 'makani'); ?></label>
                <ul class="agent-options list-unstyled">

                    <li>
                        <span class="radio-field">
                            <input id="agent_option_none" type="radio" name="agent_display_option" value="none" checked/>
                            <label for="agent_option_none"><?php _e('None', 'makani'); ?></label>
                        </span>
                        <small><?php _e('( No information will be displayed )', 'makani'); ?></small>
                    </li>

                    <li>
                        <span class="radio-field">
                            <input id="agent_option_profile" type="radio" name="agent_display_option" value="my_profile_info"/>
                            <label for="agent_option_profile"><?php _e('My Profile Information', 'makani'); ?></label>
                        </span>
                        <?php
                        if ( !empty( $makani_options[ 'makani_edit_profile_page' ] ) ) {
                            $edit_profile_url = get_permalink( $makani_options[ 'makani_edit_profile_page' ] );
                            if ( !empty( $edit_profile_url ) ) {
                                ?>
                                <small>
                                    <a href="<?php echo esc_url( $edit_profile_url ); ?>" target="_blank"><?php _e('( Edit Profile Information )', 'makani'); ?></a>
                                </small>
                                <?php
                            }
                        }
                        ?>
                    </li>

                    <li>
                        <span class="radio-field">
                            <input id="agent_option_agent" type="radio" name="agent_display_option" value="agent_info"/>
                            <label for="agent_option_agent"><?php _e( 'Display Agent Information', 'makani' ); ?></label>
                        </span>
                        <select name="agent_id" id="agent-selectbox">
                            <?php makani_generate_cpt_options( 'agent' ); ?>
                        </select>
                    </li>

                </ul>
            </div>

            <div class="form-option checkbox-option clearfix">
                <input id="featured" name="featured" type="checkbox"/>
                <label for="featured"><?php _e('Mark this property as featured property', 'makani'); ?></label>
            </div>
        </div>

    </div>
    <!-- .row -->


    <div class="row container-row">

        <div class="col-lg-6">
            <div class="form-option">
                <label class="fancy-title"><?php _e('Features', 'makani'); ?></label>
                <ul class="features-checkboxes-wrapper list-unstyled clearfix">
                    <?php
                    // Property features
                    $features_terms = get_terms( 'property-feature', array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false,
                        )
                    );

                    if ( ! empty( $features_terms ) && ! is_wp_error( $features_terms ) ) {
                        foreach ( $features_terms as $feature ) {
                            echo '<li><span class="option-set">';
                            echo '<input type="checkbox" name="features[]" id="feature-'.$feature->term_id.'" value="'.$feature->term_id.'" />';
                            echo '<label for="feature-'.$feature->term_id.'">'.$feature->name.'</label>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="form-option">

                <div class="makani-details-wrapper">

                    <label><?php _e( 'Additional Details', 'makani' ); ?></label>

                    <div class="makani-detail labels clearfix">
                        <div class="makani-detail-control">&nbsp;</div>
                        <div class="makani-detail-title"><label><?php _e( 'Title','makani' ) ?></label></div>
                        <div class="makani-detail-value"><label><?php _e( 'Value','makani' ); ?></label></div>
                        <div class="makani-detail-control">&nbsp;</div>
                    </div>

                    <!-- additional details container -->
                    <div id="makani-additional-details-container">
                        <div class="makani-detail inputs clearfix">
                            <div class="makani-detail-control">
                                <i class="sort-detail fa fa-bars"></i>
                            </div>
                            <div class="makani-detail-title">
                                <input type="text" name="detail-titles[]" value="" />
                            </div>
                            <div class="makani-detail-value">
                                <input type="text" name="detail-values[]" value="" />
                            </div>
                            <div class="makani-detail-control">
                                <a class="remove-detail" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div><!-- end of additional details container -->

                    <div class="makani-detail clearfix">
                        <div class="makani-detail-control">&nbsp;</div>
                        <div class="makani-detail-control">
                            <a class="add-detail" href="#"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- .row -->

    <div class="row container-row">

        <div class="col-xs-12">

            <?php
            $submit_notice_email = is_email( $makani_options[ 'makani_submit_notice_email' ] );
            $message_for_reviewer = $makani_options[ 'makani_submit_message_to_reviewer' ];
            if ( !empty( $submit_notice_email ) && $message_for_reviewer ) {
                ?>
                <div class="form-option">
                    <label for="message_to_reviewer"><?php _e('Message to the Reviewer','makani'); ?></label>
                    <textarea name="message_to_reviewer" id="message_to_reviewer" cols="30" rows="3"></textarea>
                </div>
                <?php
            }
            ?>

            <div class="form-option">
                <?php wp_nonce_field( 'submit_property', 'property_nonce' ); ?>
                <input type="hidden" name="action" value="add_property"/>
                <input type="submit" value="<?php _e('Submit Property', 'makani'); ?>" class="btn-small btn-orange"/>
            </div>

            <div id="message-container"></div>

        </div>
    </div>
    <!-- .row -->

</form>

