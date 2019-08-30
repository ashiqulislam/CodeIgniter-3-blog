<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function register(){
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $this->user_model->register($password);
            // set message
            $this->session->set_flashdata('success', 'You are now registered and can log in');
            redirect('posts');
        }
        
    }

    public function login(){
        $data['title'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->user_model->login($username);

            if(password_verify($password, $user->password)){
                // create session
                $data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'logged_in' => true
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success', 'You are now logged in');
                redirect('posts');
            } else {
                $this->session->set_flashdata('danger', 'Login is invalid');
                redirect('users/login');
            }
            
        }
        
    }

    public function logout(){
        $this->session->unset_userdata(['user_id', 'username', 'logged_in']);
        $this->session->set_flashdata('success', 'You are now logged out');
        redirect('users/login');
    }



}
