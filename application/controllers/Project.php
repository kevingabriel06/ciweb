<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Project extends CI_Controller {
 
   public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Project_model', 'project');

      if(!$this->session->userdata('id'))
      {
        redirect(base_url('login'));
      }
 
   }
 
   /*
      Display all records in page
   */
  public function index()
  {
    $data['projects'] = $this->project->get_all();
    $data['title'] = "CodeIgniter Project Manager";
    $this->load->view('layout/header');       
    $this->load->view('project/index',$data);
    $this->load->view('layout/footer');
  }
 
  /*
 
    Display a record

  */
  public function show($id)
  {
    $data['project'] = $this->project->get($id);
    $data['title'] = "Show Project";
    $this->load->view('layout/header');
    $this->load->view('project/show', $data);
    $this->load->view('layout/footer'); 
  }
 
  /*
    Create a record page
  */
  public function create()
  {
    $data['title'] = "Create Project";
    $this->load->view('layout/header');
    $this->load->view('project/create',$data);
    $this->load->view('layout/footer');     
  }
 
  /*
    Save the submitted record
  */
  public function store()
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if (!$this->form_validation->run()) {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('project/create'));
    } else {
        $config = [
            'upload_path' => './assets/images',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'max_size' => 100,
            'max_width' => 1024,
            'max_height' => 768
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $this->project->store();
            $this->session->set_flashdata('success', "Saved Successfully!");
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('project/create'));
        }
    }

  }
 
  /*
    Edit a record page
  */
  public function edit($id)
  {
    $data['project'] = $this->project->get($id);
    $data['title'] = "Edit Project";
    $this->load->view('layout/header');
    $this->load->view('project/edit', $data);
    $this->load->view('layout/footer');     
  }
 
  /*
    Update the submitted record
  */
  public function update($id)
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('errors', validation_errors());
      redirect(base_url('project/edit/' . $id));
    } else {

      $config = [
        'upload_path' => './assets/images',
        'allowed_types' => 'gif|jpg|jpeg|png',
        'max_size' => 100,
        'max_width' => 1024,
        'max_height' => 768
      ];

      $this->load->library('upload', $config);
      
      if ($this->upload->do_upload('image')) {

        $this->project->update($id);
        $this->session->set_flashdata('success', "Updated Successfully!");
        redirect(base_url('dashboard'));

      }
      else {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect(base_url('dashboard'));
      }
    }

 
  }
 
  /*
    Delete a record
  */
  public function delete($id)
  {
    $item = $this->project->delete($id);
    $this->session->set_flashdata('success', "Deleted Successfully!");
    redirect(base_url('project'));
  }
 
  public function logout()
 {
  $data = $this->session->all_userdata();
  foreach($data as $row => $rows_value)
  {
   $this->session->unset_userdata($row);
  }
  redirect(base_url('login'));
 }
 
}

?>