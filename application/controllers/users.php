<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function validateLogin() {
        if (isset($_POST)) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->login();
            } else {
                $user = $this->user->validateUser();
                if (isset($user) && $user['STATUS'] == "ACTIVE") {

                    //if user exists, lets put his detail in the sesssion
                    $extraSessionData = array(
                        'email' => $user['EMAIL'],
                        'userid' => $user['USER_ID'],
                        'user_type' => $user['USER_TYPE'],
                        'is_logged_in' => TRUE
                    );

                    $this->session->set_userdata($extraSessionData);
                    redirect('main/');
                } else {
                    $this->session->set_flashdata('loginError', 'Username or Password 
                        incorrect');
                    redirect('/login');
                }
            }
        } else {
            redirect('main/');
        }
    }

    public function signup() {
        //display register form

        $data['city'] = $this->city->getCity(); //for links

        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {
            //load the already logged in message
            $data['main_content'] = "loggedIn"; //body of home page
            $this->load->view('includes/templates.php', $data);
        } else {
            $data['main_content'] = "register_form"; //body of home page
            $this->load->view('includes/templates.php', $data);
        }
    }

    public function registerUser() {

        if (isset($_POST)) {

            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $this->signup();
            } else {
                /*
                 * TODO: Check if email exists before we post.
                 */
                $user_id = $this->user->createUser($this->input->post());
                if ($user_id) {
                    echo "Registration Successful";
                    //load success view page
                    //tell them to follow the link or check their email to activate their account
                } else {
                    $this->session->set_flashdata('RegError', 'There was a problem 
                        creating your account, please try again later');
                    redirect('/signup', 'refresh');
                    return false;
                }
            }
        } else {
            redirect('main/');
        }
    }

    public function profile() {

        $data['city'] = $this->city->getCity(); //for links
        $is_logged_in = $this->session->userdata('is_logged_in');

        if ($is_logged_in == true) {
            //load the profile edit page
            $data['main_content'] = "profile_form"; //body of home page

            $data['category'] = $this->event->getAllCategory();
            $data['user_details'] = $this->user->getUser($this->session->userdata('userid'));
            $this->load->view('includes/templates.php', $data);
        } else {
            redirect('/login');
        }
    }

    public function updateProfile() {

        if (isset($_POST)) {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if ($is_logged_in == true) {
                //get the userid in the session
                $userid = $this->session->userdata('userid');

                $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                $this->form_validation->set_rules('phone', 'Lastname', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->profile();
                    return false;
                }

                $status = $this->user->updateUser($userid, $this->input->post());
                if ($status == TRUE) {
                    $this->session->set_flashdata('updateSuccess', 'Profile Sucessfully Updated');
                    redirect('/profile', 'refresh');
                } else {
                    $this->session->set_flashdata('updateFailure', 'Failure');
                    redirect('/profile', 'refresh');
                }
            }else{
                redirect('/login');
            }
        }
    }

    public function login() {

        $data['city'] = $this->city->getCity(); //for links
        $this->load->library('form_validation');
        $data['main_content'] = "login_form"; //body of home page
        $this->load->view('includes/templates.php', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/login');
    }

}

?>
