<?php
  class Typemissions extends Controller {
    public function __construct(){
      $this->typemissionModel = $this->model('Typemission');
    }
    
    public function index(){
      // Get typemissions
      $typemissions = $this->typemissionModel->getTypemissions();

      $data = [
        'typemissions' => $typemissions
      ];
     
      $this->view('typemissions/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idTypeMission' => trim($_POST['idTypeMission']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idTypeMission_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idTypeMission'])){
          $data['idTypeMission_err'] = 'Veuillez entrer un id de type de mission';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idTypeMission_err']) && empty($data['nom_err'])){
          // Validated
          if($this->typemissionModel->add($data)){
            flash('post_message', 'Type de mission ajouté');
            redirect('typemissions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('typemissions/add', $data);
        }

      } else {
        $data = [
          'idTypeMission' => '',
          'nom' => ''
        ];
  
        $this->view('typemissions/add', $data);
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
          'idTypeMission' => trim($_POST['idTypeMission']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idTypeMission_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idTypeMission'])){
          $data['idTypeMission_err'] = 'Veuillez entrer un id de type de mission';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idTypeMission_err']) && empty($data['nom_err'])){
          // Validated
          if($this->typemissionModel->update($data)){
            flash('post_message', 'Type de mission modifié');
            redirect('typemissions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('typemissions/edit', $data);
        }

      } 
      else {
        $typemission = $this->typemissionModel->getTypeMissionById($id);
        
        $data = [
          'idTypeMission' => $typemission->idTypeMission,
          'nom' => $typemission->nom
        ];
  
        $this->view('typemissions/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->typemissionModel->delete($id)){
          flash('post_message', 'type supprimé');
          redirect('typemissions');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('typemissions');
      }
    }
    
}