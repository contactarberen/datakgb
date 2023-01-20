<?php
  class Payss extends Controller {
    public function __construct(){
      $this->paysModel = $this->model('Pays');
    }
    
    public function index(){
      // Get pays
      $payss = $this->paysModel->getPayss();

      $data = [
        'payss' => $payss
      ];
     
      $this->view('payss/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'idPays' => trim($_POST['idPays']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idPays_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idPays'])){
          $data['idPays_err'] = 'Veuillez entrer un id Pays';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de pays';
        }
        
        // Make sure no errors
        if(empty($data['idPays_err']) && empty($data['nom_err'])){
          // Validated
          if($this->paysModel->add($data)){
            flash('post_message', 'Pays ajouté');
            redirect('payss');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('payss/add', $data);
        }

      } else {
        $data = [
          'idPays' => '',
          'nom' => ''
        ];
  
        $this->view('payss/add', $data);
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
          'idPays' => trim($_POST['idPays']),
          'nom' => trim($_POST['nom']),
          'admin_id' => $_SESSION['admin_id'],
          'idPays_err' => '',
          'nom_err' => ''
        ];

        // Validate data
        if(empty($data['idPays'])){
          $data['idPays_err'] = 'Veuillez entrer un id Pays';
        }
        if(empty($data['nom'])){
          $data['nom_err'] = 'Veuillez entrer un nom de pays';
        }
        
        // Make sure no errors
        if(empty($data['idPays_err']) && empty($data['nom_err'])){
          // Validated
          if($this->paysModel->update($data)){
            flash('post_message', 'Pays mis à jour');
            redirect('payss');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('payss/edit', $data);
        }

      } else {
        // Get existing post from model
        $pays = $this->paysModel->getPaysById($id);

        $data = [
          'idPays' => $pays->idPays,
          'nom' => $pays->nom
        ];
  
        $this->view('payss/edit', $data);
      }
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
                        
        if($this->paysModel->delete($id)){
          flash('post_message', 'Pays supprimé');
          redirect('payss');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('payss');
      }
    }
    
}