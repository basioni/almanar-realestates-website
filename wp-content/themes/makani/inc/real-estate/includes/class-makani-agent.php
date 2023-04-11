<?php
class makani_Agent {
    private $agent_id;
   
    private $meta_keys = array(
        'job_title'     => 'makani_job_title',
        'mobile'        => 'makani_mobile_number',
        'office'        => 'makani_office_number',
        'fax'           => 'makani_fax_number',
        'email'         => 'makani_agent_email',
        'office_address'=> 'makani_office_address',
        'facebook'      => 'makani_facebook_url',
        'twitter'       => 'makani_twitter_url',
        'google'        => 'makani_google_plus_url',
        'linkedin'      => 'makani_linked_in_url',
        'pinterest'     => 'makani_pinterest_url',
        'instagram'     => 'makani_instagram_url',
    );

    private $meta_data;
    public function __construct( $agent_id = null ) {

        if ( !$agent_id ) {
            $agent_id = get_the_ID();
        } else {
            $agent_id = intval( $agent_id );
        }

        if ( $agent_id > 0 ) {
            $this->agent_id = $agent_id;
            $this->meta_data = get_post_custom( $agent_id );
        }
    }

    public function get_property_meta( $meta_key ) {
        if ( isset( $this->meta_data[ $meta_key ] ) ) {
            return $this->meta_data[ $meta_key ][0];
        } else {
            return false;
        }
    }

    public function get_post_ID(){
        return $this->agent_id;
    }

    public function get_mobile(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['mobile'] );
    }

    public function get_office_phone(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['office'] );
    }

    public function get_fax(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['fax'] );
    }

    public function get_email(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return is_email( $this->get_property_meta( $this->meta_keys['email'] ) );
    }

    public function get_facebook(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['facebook'] );
    }

    public function get_twitter(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['twitter'] );
    }

    public function get_google(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['google'] );
    }

    public function get_linkedin(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['linkedin'] );
    }

    public function get_pinterest(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['pinterest'] );
    }

    public function get_instagram(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['instagram'] );
    }

    public function get_job_title(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['job_title'] );
    }

    public function get_office_address(){
        if ( ! $this->agent_id ) {
            return false;
        }
        return $this->get_property_meta( $this->meta_keys['office_address'] );
    }

}