<?php
  class Cibles extends Controller {
    public function __construct(){
      $this->cibleModel = $this->model('Cible');
    }
    
    public function index(){
      // Get cibles
      $cibles = $this->cibleModel->getCibles();

      $data = [
        'cibles' => $cibles
      ];
     
      $this->view('cibles/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'dateNaissance' => trim($_POST['dateNaissance']),
          'nomCode' => trim($_POST['nomCode']),
          'idNationalite' => trim($_POST['idNationalite']),
          'admin_id' => $_SESSION['admin_id'],
          'nom_err' => '',
          'prenom_err' => '',
          'dateNaissance_err' => '',
          'nomCode_err' => '',
          'idNationalite_err' => ''
        ];

        // Validate data
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom';
        }
        if(empty($data['prenom'])){
          $data['prenom_err'] = 'Veuillez entrer un prénom';
        }
        if(empty($data['dateNaissance'])){
          $data['dateNaissance_err'] = 'Veuillez entrer une date de naissance';
        }
        if(empty($data['nomCode'])){
          $data['nomCode_err'] = 'Veuillez entrer un nom de code';
        }
        if(empty($data['idNationalite'])){
          $data['idNationalite_err'] = 'Veuillez entrer un id Nationalité';
        }
        
        // Make sure no errors
        if(empty($data['nom_err']) && empty($data['prenom_err']) &&
           empty($data['dateNaissance_err']) && empty($data['nomCode_err']) &&
           empty($data['idNationalite_err'])){
          // Validated
          if($this->cibleModel->add($data)){
            flash('post_message', 'Cible ajouté');
            redirect('cibles');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('cibles/add', $data);
        }

      } else {
        $data = [
          'nom' => '',
          'prenom' => '',
          'dateNaissance' => '',
          'nomCode' => '',
          'idNationalite' => ''
        ];
  
        $this->view('cibles/add', $data);
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
          'idCible' => $id,
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'dateNaissance' => trim($_POST['dateNaissance']),
          'nomCode' => trim($_POST['nomCode']),
          'idNationalite' => trim($_POST['idNationalite']),
          'admin_id' => $_SESSION['admin_id'],
          'nom_err' => '',
          'prenom_err' => '',
          'dateNaissance_err' => '',
          'nomCode_err' => '',
          'idNationalite_err' => ''
        ];

        // Validate data
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom';
        }
        if(empty($data['prenom'])){
          $data['prenom_err'] = 'Veuillez entrer un prénom';
        }
        if(empty($data['dateNaissance'])){
          $data['dateNaissance_err'] = 'Veuillez entrer une date de naissance';
        }
        if(empty($data['nomCode'])){
          $data['nomCode_err'] = 'Veuillez entrer un nom de code';
        }
        if(empty($data['idNationalite'])){
          $data['idNationalite_err'] = 'Veuillez entrer un id Nationalité';
        }
        
        // Make sure no errors
        if(empty($data['nom_err']) && empty($data['prenom_err']) &&
           empty($data['dateNaissance_err']) && empty($data['nomCode_err']) &&
           empty($data['idNationalite_err'])){
          // Validated
          if($this->cibleModel->update($data)){
            flash('post_message', 'Cible mise à jour');
            redirect('cibles');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('cibles/edit', $data);
        }

      } else {
        $cible = $this->cibleModel->getCibleById($id);

        $data = [
          'idCible' => $cible->idCible,
          'nom' => $cible->nom,
          'prenom' => $cible->prenom,
          'dateNaissance' => $cible->dateNaissance,
          'nomCode' => $cible->nomCode,
          'idNationalite' => $cible->idNationalite
        ];
  
        $this->view('cibles/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->cibleModel->delete($id)){
          flash('post_message', 'Cible supprimé');
          redirect('cibles');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('cibles');
      }
    }
    
}