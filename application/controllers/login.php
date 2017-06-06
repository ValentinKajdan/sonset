<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('Login_model','user',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $this->load->helper('security');

   // Post
   $post = $this->input->post();

   $this->form_validation->set_rules('mail', 'Mail', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   var_dump($this->input->post());


   // Form Validation
   if( $this->form_validation->run() === false ) {
       $data['status'] = false;
       $data['errors']['messages'] = '';
       $data['errors']['inputs'] = array();
       foreach ( $post as $name => $values ) {
           if( form_error($name, '[', ']') === '[login_1]' || form_error($name, '[', ']') === '[login_2]' || form_error($name, '[', ']') === '[login_3]' ) {
               if( !in_array('user_email', $data['errors']['inputs']) )
                   $data['errors']['inputs'][] = '[name="user_email"]';
               if( !in_array('user_password', $data['errors']['inputs']) )
                   $data['errors']['inputs'][] = '[name="user_password"]';

               $data['errors']['messages'] .= '<p>' . lang(trim(form_error($name, '!', '!'), '!')) . '</p>';
           } else {
               if( !empty(form_error($name)) ) {
                   $data['errors']['inputs'][] = '[name="' . $name . '"]';
                   $data['errors']['messages'] .= form_error($name);
               }
           }
       }
       redirect(site_url(), 'refresh');
   } else {
     $data['status'] = true;
     redirect(site_url(), 'refresh');
   }

   var_dump($data);




  //  if($this->form_validation->run() == FALSE)
  //  {
  //    var_dump($this->form_validation->run());
  //    //Field validation failed.  User redirected to login page
  //   //  $this->load->view('login_view');
  //   // redirect('index', 'refresh');
  //  }
  //  else
  //  {
  //    var_dump($this->form_validation->run());
  //    //Go to private area
  //   //  redirect('index', 'refresh');
  //  }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $mail = $this->input->post('mail');

   //query the database
   $result = $this->user->login($mail, $password);
   var_dump("result : ", $result);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
