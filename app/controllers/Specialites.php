<?php
  class Specialites extends Controller {
    public function __construct(){
      $this->specialiteModel = $this->model('Specialite');
    }
    
    public function index(){
      // Get specialites
      $specialites = $this->specialiteModel->getSpecialites();

      $data = [
        'specialites' => $specialites
      ];
     
      $this->view('specialites/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idSpecialite' => trim($_POST['idSpecialite']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idSpecialite_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idSpecialite'])){
          $data['idSpecialite_err'] = 'Veuillez entrer un id de spécialité';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idSpecialite_err']) && empty($data['nom_err'])){
          // Validated
          if($this->specialiteModel->add($data)){
            flash('post_message', 'Spécialité ajouté');
            redirect('specialites');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('specialites/add', $data);
        }

      } else {
        $data = [
          'idSpecialite' => '',
          'nom' => ''
        ];
  
        $this->view('specialites/add', $data);
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
          'idSpecialite' => trim($_POST['idSpecialite']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idSpecialite_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idSpecialite'])){
          $data['idSpecialite_err'] = 'Veuillez entrer un id de spécialité';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de spécialité';
        }
        
        // Make sure no errors
        if(empty($data['idSpecialite_err']) && empty($data['nom_err'])){
          // Validated
          if($this->specialiteModel->update($data)){
            flash('post_message', 'Spécialité modifié');
            redirect('specialites');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('specialites/edit', $data);
        }

      } else {
        $specialite = $this->specialiteModel->getSpecialiteById($id);

        $data = [
          'idSpecialite' => $specialite->idSpecialite,
          'nom' => $specialite->nom
        ];
  
        $this->view('specialites/edit', $data);
      }
    }
    
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->specialiteModel->delete($id)){
          flash('post_message', 'Spécialité supprimé');
          redirect('specialites');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('specialites');
      }
    }
    
}