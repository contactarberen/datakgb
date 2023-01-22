<?php
  class Statutmissions extends Controller {
    public function __construct(){
      $this->statutmissionModel = $this->model('Statutmission');
    }
    
    public function index(){
      // Get statutmissions
      $statutmissions = $this->statutmissionModel->getStatutmissions();

      $data = [
        'statutmissions' => $statutmissions
      ];
     
      $this->view('statutmissions/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idStatutMission' => trim($_POST['idStatutMission']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idStatutMission_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idStatutMission'])){
          $data['idStatutMission_err'] = 'Veuillez entrer un id de statut mission';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de statut (En préparation, en cours)';
        }
        
        // Make sure no errors
        if(empty($data['idStatutMission_err']) && empty($data['nom_err'])){
          // Validated
          if($this->statutmissionModel->add($data)){
            flash('post_message', 'Statut mission ajouté');
            redirect('statutmissions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('statutmissions/add', $data);
        }

      } else {
        $data = [
          'idStatutMission' => '',
          'nom' => ''
        ];
  
        $this->view('statutmissions/add', $data);
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
          'idStatutMission' => trim($_POST['idStatutMission']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idStatutMission_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idStatutMission'])){
          $data['idStatutMission_err'] = 'Veuillez entrer un id de statut mission';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de statut (En préparation, en cours)';
        }
        
        // Make sure no errors
        if(empty($data['idStatutMission_err']) && empty($data['nom_err'])){
          // Validated
          if($this->statutmissionModel->update($data)){
            flash('post_message', 'Statut mission modifié');
            redirect('statutmissions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('statutmissions/edit', $data);
        }

      } else {
        $statutmission = $this->statutmissionModel->getStatutMissionById($id);
        $data = [
          'idStatutMission' => $statutmission->idStatutMission,
          'nom' => $statutmission->nom
        ];
  
        $this->view('statutmissions/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->statutmissionModel->delete($id)){
          flash('post_message', 'Statut supprimé');
          redirect('statutmissions');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('statutmissions');
      }
    }
    
}