<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SS_Controller extends CI_Controller {
    var $_lang, $linktags, $metas, $includes, $scripts;
    var $login = false;
    var $logoutRedirect = true;

    function __construct() {
        parent::__construct();
        /* Lang */
        $this->_lang = $this->lang->lang();
        /* Init LinkTags Metas Includes Scripts */
        $this->init_vars();
        /* Init Login */
        $this->init_login();
    }

    // function init_login() {
    //     $this->login = $this->session->userdata('login');
    //     if( $this->login ){
    //         // Loads
    //         $this->load->helper('file');
    //         // Get user_id
    //         $this->user_id = $this->login['user_id'];
    //         // UserTypeNormal
    //         switch ($this->login['user_type']) {
    //             // UserNormal
    //             case 'normal':
    //                 // Loads
    //                 $this->load->model('user_model');
    //                 // Get User, User's contact
    //                 $fields = array(
    //                     'accounts.*',
    //                     'clients.*',
    //                     'user_id as contact_id',
    //                     'users.email as contact_email',
    //                     'users.firstname as contact_firstname',
    //                     'users.lastname as contact_lastname',
    //                     'users.phone as contact_phone',
    //                     'users.avatar as contact_avatar',
    //                 );
    //                 $user = $this->user_model->get_user_advisor($fields, array( 'account_id' => $this->user_id ) );
    //                 // User not exist
    //                 if( empty($user) ) {
    //                     $this->logout();
    //                     exit();
    //                 }
    //                 // Init user
    //                 $this->user = $user;
    //                 $this->current_menu = '';
    //                 $this->user_is_active = $user->is_active;
    //                 $this->user_avatar = $user->avatar;
    //                 $this->user_email = $user->email;
    //                 $this->user_firstname = ucwords( $user->firstname );
    //                 $this->user_lastname = ucwords( $user->lastname );
    //                 $this->user_name = !empty( trim($user->firstname . ' ' . $user->lastname) ) ? trim($user->firstname . ' ' . $user->lastname) : $user->email;
    //                 $this->user_date_create = $user->date_create;
    //                 $this->user_phone = $user->phone;
    //                 $this->user_gender = !empty($user->gender) ? $user->gender : 1;
    //                 $this->user_type = $this->login['user_type'];
    //                 // Add Intercom
    //                 $this->scripts['bottom'][] = array( 'src' => 'js/intercom', 'type' => 'php' );
    //                 break;
    //             default:
    //                 // Avatar
    //                 $this->user_avatar = $this->login['user_avatar'];
    //                 $this->user_email = $this->login['user_email'];
    //                 $this->user_firstname = ucwords( $this->login['user_firstname'] );
    //                 $this->user_lastname = ucwords( $this->login['user_lastname'] );
    //                 $this->user_name = !empty( trim($this->user_firstname . ' ' . $this->user_lastname) ) ? trim($this->user_firstname . ' ' . $this->user_lastname) : $this->user_email;
    //                 $this->user_gender = $this->login['user_gender'];
    //                 $this->user_type = $this->login['user_type'];
    //                 break;
    //         }
    //         // Loads Lang
    //         $this->lang->load('account-' . $this->user_type);
    //         // Menu
    //         $this->config->load('account', TRUE);
    //         $this->menu = $this->config->item('account')['normal']['menu'];
    //     } else {
    //         // Includes loginPopup
    //         $this->includes['footer'][] = 'account/login-popup';
    //         $this->includes['footer'][] = 'account/signin-popup';
    //     }
    // }
    // function is_login($user_type = false) {
    //     return $this->login && ( $user_type ? $this->user_type === $user_type : true );
    // }
    // function type_from_email( $email ){
    //     if( !empty($email) && strpos($email, '@') ) {
    //         $email = strtolower($email);
    //         list($user, $domain) = explode('@', $email);
    //         $explode = explode('.', $domain);
    //         $type = implode( '', array_slice($explode, 0, -1) );
    //         return in_array($type, $this->type) ? $type : '';
    //     }
    //     return false;
    // }
    // function logout() {
    //     // Session destroy
    //     $newdata = array( 'login' => FALSE );
    //     $this->session->unset_userdata( $newdata );
    //     // Redirect
    //     $url = $this->input->get('redirect') ? $this->input->get('redirect') : site_url();
    //     redirect( urldecode($url) );
    // }

    function init_vars() {
        // HTTP/HTTPS/HTML Canonical
        $hrefCanonical = $this->httpCanonical(current_url());
        /* LinkTags */
        $this->linktags = array(
            // Main
            array( 'rel' => 'stylesheet', 'type' => 'text/css', 'href' => 'assets/css/style.css' ),
            array( 'rel' => 'icon', 'type' => 'image/ico', 'href' => base_url('favicon.ico') ),
            // Canonical
            'canonical' => array( 'rel' => 'canonical', 'href' => $hrefCanonical )
        );
        /* Metas */
        $this->metas = array(
            // Main
            'main' => array(
                array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
                array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=no'),
                array('name' => 'author', 'content' => 'Sonset'),
            ),
            // Seo
            'seo' => array(),
            // Social
            'social' => array(
                '<meta property="og:type" content="product" />'
            )
        );
        /* Scripts */
        $this->scripts = array(
            // Head
            'head' => array(
                array( 'src' => '//code.jquery.com/jquery-1.11.3.min.js', 'baseUrl' => false ),
                array( 'src' => 'assets/js/home.js' ),
            ),
            // Top
            'top' => array(
                array( 'src' => '//code.jquery.com/ui/1.10.4/jquery-ui.min.js', 'baseUrl' => false )
            ),
            // Middle
            'middle' => array(
                // array( 'src' => 'assets/js/main.min.js' )
            ),
            // Bottom
            'bottom' => array(
            )
        );
        /* Includes */
    }
    function httpCanonical($url){
        $currentUrlParsed = parse_url($url);
        $currentQueryString = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : false;
        return 'http://' . $currentUrlParsed['host'] . $currentUrlParsed['path'] . ( $currentQueryString ? '?' . $currentQueryString : '' );
    }
    /* Return Json */
    function return_json( $return ) {
        header('Content-type: application/json');
        echo json_encode($return);
    }
}
