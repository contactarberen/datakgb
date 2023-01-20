<?php
  class Contacts extends Controller {
    public function __construct(){
      $this->contactModel = $this->model('Contact');
    }
    
    public function index(){
      // Get contacts
      $contacts = $this->contactModel->getContacts();

      $data = [
        'contacts' => $contacts
      ];
     
      $this->view('contacts/index', $data);
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
          if($this->contactModel->add($data)){
            flash('post_message', 'Contact ajouté');
            redirect('contacts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('contacts/add', $data);
        }

      } else {
        $data = [
          'nom' => '',
          'prenom' => '',
          'dateNaissance' => '',
          'nomCode' => '',
          'idNationalite' => ''
        ];
  
        $this->view('contacts/add', $data);
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
          'idContact' => $id,
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
          if($this->contactModel->update($data)){
            flash('post_message', 'Contact modifé');
            redirect('contacts');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('contacts/edit', $data);
        }

      } else {
        $contact = $this->contactModel->getContactById($id);

        $data = [
          'idContact' => $contact->idContact,
          'nom' => $contact->nom,
          'prenom' => $contact->prenom,
          'dateNaissance' => $contact->dateNaissance,
          'nomCode' => $contact->nomCode,
          'idNationalite' => $contact->idNationalite
        ];
  
        $this->view('contacts/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->contactModel->delete($id)){
          flash('post_message', 'Contact supprimé');
          redirect('contacts');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('contacts');
      }
    }
    
}