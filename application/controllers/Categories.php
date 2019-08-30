<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function index(){
        $data['title'] = 'Create Category';
        $data['categories'] = $this->category_model->get_categories();
        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create(){
        $this->check_login();
        $data['title'] = 'Create Category';

        $this->form_validation->set_rules('name', "Name", 'required');
        
        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->category_model->create_category();
            // set message
            $this->session->set_flashdata('success', 'Your category has been updated');
            redirect('categories');
        }
    }
    
    public function posts($id){
        $data['title'] = $this->category_model->get_category($id)->name;;
        $data['posts'] = $this->post_model->get_post_by_category($id);
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // check login
        $this->check_login();

        $this->category_model->delete_category($id);
        $this->session->set_flashdata('danger', 'Your category has been deleted');
        redirect('categories');
    }

    private function check_login(){
        // check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
    }
}
