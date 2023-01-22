<?php
  class Lignemissions extends Controller {
    public function __construct(){
      $this->lignemissionModel = $this->model('Lignemission');
    }
    
    public function index(){
      // Get lignemissions
      $lignemissions = $this->lignemissionModel->getLignemissions();

      $data = [
        'lignemissions' => $lignemissions
      ];
     
      $this->view('lignemissions/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idMission' => trim($_POST['idMission']),
          'idAgent' => trim($_POST['idAgent']),
          'idContact' => trim($_POST['idContact']),
          'idCible' => trim($_POST['idCible']),
          'idPlanque' => trim($_POST['idPlanque']),
          'admin_id' => $_SESSION['admin_id'],
          'idMission_err' => '',
          'idAgent_err' => '',
          'idContact_err' => '',
          'idCible_err' => '',
          'idPlanque_err' => ''
        ];

        // Validate data
        if(empty($data['idMission'])){
          $data['idMission_err'] = 'Veuillez entrer un id de mission';
        }
        if(empty($data['idAgent'])){
          $data['idAgent_err'] = 'Veuillez entrer un id agent';
        }
        if(empty($data['idContact'])){
          $data['idContact_err'] = 'Veuillez entrer un id contact';
        }
        if(empty($data['idCible'])){
          $data['idCible_err'] = 'Veuillez entrer un id de cible';
        }
        if(empty($data['idPlanque'])){
          $data['idPlanque_err'] = 'Veuillez entrer un id planque';
        }
        
        // Make sure no errors
        if(empty($data['idMission_err']) && empty($data['idAgent_err']) &&
           empty($data['idContact_err']) && empty($data['idCible_err']) &&
           empty($data['idPlanque_err'])){
          if ($this->lignemissionModel->checkRegleMetier1($data)){
            // Validated
            if($this->lignemissionModel->add($data)){
              flash('post_message', 'Ligne mission ajouté');
              redirect('lignemissions');
            } else {
              die('Something went wrong');
            }
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('lignemissions/add', $data);
        }

      } else {
        $data = [
          'idMission' => '',
          'idAgent' => '',
          'idContact' => '',
          'idCible' => '',
          'idPlanque' => ''
        ];
  
        $this->view('lignemissions/add', $data);
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
          'idMission' => trim($_POST['idMission']),
          'idAgent' => trim($_POST['idAgent']),
          'idContact' => trim($_POST['idContact']),
          'idCible' => trim($_POST['idCible']),
          'idPlanque' => trim($_POST['idPlanque']),
          'admin_id' => $_SESSION['admin_id'],
          'idMission_err' => '',
          'idAgent_err' => '',
          'idContact_err' => '',
          'idCible_err' => '',
          'idPlanque_err' => ''
        ];

        // Validate data
        if(empty($data['idMission'])){
          $data['idMission_err'] = 'Veuillez entrer un id de mission';
        }
        if(empty($data['idAgent'])){
          $data['idAgent_err'] = 'Veuillez entrer un id agent';
        }
        if(empty($data['idContact'])){
          $data['idContact_err'] = 'Veuillez entrer un id contact';
        }
        if(empty($data['idCible'])){
          $data['idCible_err'] = 'Veuillez entrer un id de cible';
        }
        if(empty($data['idPlanque'])){
          $data['idPlanque_err'] = 'Veuillez entrer un id planque';
        }
        
        // Make sure no errors
        if(empty($data['idMission_err']) && empty($data['idAgent_err']) &&
           empty($data['idContact_err']) && empty($data['idCible_err']) &&
           empty($data['idPlanque_err'])){
          // Validated
          if($this->lignemissionModel->update($data)){
            flash('post_message', 'Ligne mission modifié');
            redirect('lignemissions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('lignemissions/edit', $data);
        }

      } else {
        $lignemission = $this->lignemissionModel->getLigneMissionById($id);

        $data = [
          'idMission' => $lignemission->idMission,
          'idAgent' => $lignemission->idAgent,
          'idContact' => $lignemission->idContact,
          'idCible' => $lignemission->idCible,
          'idPlanque' => $lignemission->idPlanque
        ];
  
        $this->view('lignemissions/edit', $data);
      }
    }
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->lignemissionModel->delete($id)){
          flash('post_message', 'ligne mission supprimé');
          redirect('lignemissions');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('lignemissions');
      }
    }
    
}