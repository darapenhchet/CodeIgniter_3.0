<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // load from and url helper optional (in this tutorial)
        $this->load->helper(array(
            'form',
            'url'
        ));
        // load database
        $this->load->database();
        // load form validation library
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("user");
    }

    public function email_check()
    {
        // allow only Ajax request
        if($this->input->is_ajax_request()) {
            // grab the email value from the post variable.
            $email = $this->input->post('email');
            // check in database - table name : tbl_users  , Field name in the table : email
            if(!$this->form_validation->is_unique($email, 'tbl_users.email')) {
            // set the json object as output
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'The email is already taken, choose another one')));
            }
        }
    }

}
 
?>