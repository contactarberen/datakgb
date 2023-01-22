<?php
  class Planques extends Controller {
    public function __construct(){
      $this->planqueModel = $this->model('Planque');
    }
    
    public function index(){
      // Get planques
      $planques = $this->planqueModel->getPlanques();

      $data = [
        'planques' => $planques
      ];
     
      $this->view('planques/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'nomCode' => trim($_POST['nomCode']),
          'adresse' => trim($_POST['adresse']),
          'idPays' => trim($_POST['idPays']),
          'type' => trim($_POST['type']),
          'admin_id' => $_SESSION['admin_id'],
          'nomCode_err' => '',
          'adresse_err' => '',
          'dateNaissance_err' => '',
          'idPays_err' => '',
          'type_err' => ''
        ];

        // Validate data
        if(empty($data['nomCode'])){
          $data['nomCode_err'] = 'Veuillez entrer un nom de code';
        }
        if(empty($data['adresse'])){
          $data['adresse_err'] = 'Veuillez entrer une adresse';
        }
        if(empty($data['idPays'])){
          $data['idPays_err'] = 'Veuillez entrer un id de pays';
        }
        if(empty($data['type'])){
          $data['type_err'] = 'Veuillez entrer un type';
        }
                
        // Make sure no errors
        if(empty($data['nomCode_err']) && empty($data['adresse_err']) &&
           empty($data['idPays_err']) && empty($data['type_err'])){
          // Validated
          if($this->planqueModel->add($data)){
            flash('post_message', 'Planque ajouté');
            redirect('planques');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('planques/add', $data);
        }

      } else {
        $data = [
          'nomCode' => '',
          'adresse' => '',
          'idPays' => '',
          'type' => ''
        ];
  
        $this->view('planques/add', $data);
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
          'idPlanque' => $id,
          'nomCode' => trim($_POST['nomCode']),
          'adresse' => trim($_POST['adresse']),
          'idPays' => trim($_POST['idPays']),
          'type' => trim($_POST['type']),
          'admin_id' => $_SESSION['admin_id'],
          'nomCode_err' => '',
          'adresse_err' => '',
          'dateNaissance_err' => '',
          'idPays_err' => '',
          'type_err' => ''
        ];

        // Validate data
        if(empty($data['nomCode'])){
          $data['nomCode_err'] = 'Veuillez entrer un nom de code';
        }
        if(empty($data['adresse'])){
          $data['adresse_err'] = 'Veuillez entrer une adresse';
        }
        if(empty($data['idPays'])){
          $data['idPays_err'] = 'Veuillez entrer un id de pays';
        }
        if(empty($data['type'])){
          $data['type_err'] = 'Veuillez entrer un type';
        }
                
        // Make sure no errors
        if(empty($data['nomCode_err']) && empty($data['adresse_err']) &&
           empty($data['idPays_err']) && empty($data['type_err'])){
          // Validated
          if($this->planqueModel->update($data)){
            flash('post_message', 'Planque modifié');
            redirect('planques');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('planques/edit', $data);
        }

      } else {
        // Get existing mission from model
        $planque = $this->planqueModel->getPlanqueById($id);
        
        $data = [
          'idPlanque' => $planque->idPlanque,
          'nomCode' => $planque->nomCode,
          'adresse' => $planque->adresse,
          'idPays' => $planque->idPays,
          'type' => $planque->type
        ];
  
        $this->view('planques/edit', $data);
      }
    }
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->planqueModel->delete($id)){
          flash('post_message', 'Planque supprimé');
          redirect('planques');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('planques');
      }
    }
    
}