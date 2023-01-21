<?php
  class Specialiteagents extends Controller {
    public function __construct(){
      $this->specialiteagentModel = $this->model('Specialiteagent');
    }
    
    public function index(){
      // Get specialiteagents
      $specialiteagents = $this->specialiteagentModel->getSpecialiteagents();

      $data = [
        'specialiteagents' => $specialiteagents
      ];
     
      $this->view('specialiteagents/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idAgent' => trim($_POST['idAgent']),
          'idSpecialite' => trim($_POST['idSpecialite']),
          'admin_id' => $_SESSION['admin_id'],
          'idAgent_err' => '',
          'idSpecialite_err' => ''
        ];

        // Validate data
        if(empty($data['idAgent'])){
          $data['idAgent_err'] = 'Veuillez entrer un id d\'agent';
        }
        if(empty($data['idSpecialite'])){
          $data['idSpecialite_err'] = 'Veuillez entrer un id de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idAgent_err']) && empty($data['idSpecialite_err'])){
          // Validated
          if($this->specialiteagentModel->add($data)){
            flash('post_message', 'Spécialité de l\'agent ajouté');
            redirect('specialiteagents');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('specialiteagents/add', $data);
        }

      } else {
        $data = [
          'idAgent' => '',
          'idSpecialite' => ''
        ];
  
        $this->view('specialiteagents/add', $data);
      }
    }
    
    public function edit($id){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idAgent' => trim($_POST['idAgent']),
          'idSpecialite' => trim($_POST['idSpecialite']),
          'admin_id' => $_SESSION['admin_id'],
          'idAgent_err' => '',
          'idSpecialite_err' => ''
        ];

        // Validate data
        if(empty($data['idAgent'])){
          $data['idAgent_err'] = 'Veuillez entrer un id d\'agent';
        }
        if(empty($data['idSpecialite'])){
          $data['idSpecialite_err'] = 'Veuillez entrer un id de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idAgent_err']) && empty($data['idSpecialite_err'])){
          // Validated
          if($this->specialiteagentModel->update($data)){
            flash('post_message', 'Spécialité de l\'agent modifié');
            redirect('specialiteagents');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('specialiteagents/edit', $data);
        }

      } else {
        $specialiteagent = $this->specialiteagentModel->getSpecialiteAgentById($id);
        $data = [
          'idAgent' => $specialiteagent->idAgent,
          'idSpecialite' => $specialiteagent->idSpecialite
        ];
  
        $this->view('specialiteagents/edit', $data);
      }
    }
    
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->specialiteagentModel->delete($id)){
          flash('post_message', 'Spécialité de l\'agent supprimé');
          redirect('specialiteagents');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('specialiteagents');
      }
    }
    
}