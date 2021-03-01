<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    // public function __construct(){
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }

    public function __construct(){
        parent::__construct();
        is_logged_in();
    }

    public function index(){
        $data['title']="My Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit(){
        $data['title']="Edit Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //cek jika ada gambar yang diupload
        $upload_image = $_FILES["image"]["name"];

        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/image/profile/';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
                $old_image = $data['user']['image'];
                if($old_image != 'default.jpg'){
                    unlink(FCPATH.'assets/img/profile/'.$old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-success">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword(){
        $data['title']="Change Password";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer', $data);
        }else{
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            $new_password2 = $this->input->post('new_password2');

            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message','<div class="alert alert-danger">Current Password isn\'t correct !</div>');
                redirect('user/changepassword');
            }else{
                if($current_password == $new_password2){
                    $this->session->set_flashdata('message','<div class="alert alert-danger">Current password can\'t match with the new password</div>');
                    redirect('user/changepassword');
                }else{
                    //password ok
                    $this->db->set('password', password_hash($new_password, PASSWORD_DEFAULT));
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert alert-success">Password Changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


}?>


