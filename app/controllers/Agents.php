<?php
  class Agents extends Controller {
    public function __construct(){
      $this->agentModel = $this->model('Agent');
    }
    
    public function index(){
      // Get agents
      $agents = $this->agentModel->getAgents();

      $data = [
        'agents' => $agents
      ];
     
      $this->view('agents/index', $data);
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
          'codeId' => trim($_POST['codeId']),
          'idNationalite' => trim($_POST['idNationalite']),
          'admin_id' => $_SESSION['admin_id'],
          'nom_err' => '',
          'prenom_err' => '',
          'dateNaissance_err' => '',
          'codeId_err' => '',
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
        if(empty($data['codeId'])){
          $data['codeId_err'] = 'Veuillez entrer un id de code';
        }
        if(empty($data['idNationalite'])){
          $data['idNationalite_err'] = 'Veuillez entrer un id Nationalité';
        }
        
        // Make sure no errors
        if(empty($data['nom_err']) && empty($data['prenom_err']) &&
           empty($data['dateNaissance_err']) && empty($data['codeId_err']) &&
           empty($data['idNationalite_err'])){
          // Validated
          if($this->agentModel->add($data)){
            flash('post_message', 'Agent ajouté');
            redirect('agents');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('agents/add', $data);
        }

      } else {
        $data = [
          'nom' => '',
          'prenom' => '',
          'dateNaissance' => '',
          'codeId' => '',
          'idNationalite' => ''
        ];
  
        $this->view('agents/add', $data);
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
          'idAgent' => $id,
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'dateNaissance' => trim($_POST['dateNaissance']),
          'codeId' => trim($_POST['codeId']),
          'idNationalite' => trim($_POST['idNationalite']),
          'admin_id' => $_SESSION['admin_id'],
          'nom_err' => '',
          'prenom_err' => '',
          'dateNaissance_err' => '',
          'codeId_err' => '',
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
        if(empty($data['codeId'])){
          $data['codeId_err'] = 'Veuillez entrer un id de code';
        }
        if(empty($data['idNationalite'])){
          $data['idNationalite_err'] = 'Veuillez entrer un id Nationalité';
        }
        
        // Make sure no errors
        if(empty($data['nom_err']) && empty($data['prenom_err']) &&
           empty($data['dateNaissance_err']) && empty($data['codeId_err']) &&
           empty($data['idNationalite_err'])){
          // Validated
          if($this->agentModel->update($data)){
            flash('post_message', 'Agent modifié');
            redirect('agents');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('agents/edit', $data);
        }

      } else {
        $agent = $this->agentModel->getAgentById($id);
        $data = [
          'idAgent' => $agent->idAgent,
          'nom' => $agent->nom,
          'prenom' => $agent->prenom,
          'dateNaissance' => $agent->dateNaissance,
          'codeId' => $agent->codeId,
          'idNationalite' => $agent->idNationalite
        ];
  
        $this->view('agents/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->agentModel->delete($id)){
          flash('post_message', 'Agent supprimé');
          redirect('agents');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('agents');
      }
    }
    
}