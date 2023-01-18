<?php
  class Missions extends Controller {
    public function __construct(){
      $this->missionModel = $this->model('Mission');
      $this->adminModel = $this->model('Admin');
    }
    
    public function index(){
      // Get missions
      $missions = $this->missionModel->getMissions();

      $data = [
        'title' => 'DataKGB',
        'description' => 'Gestion de la base de données du KGB',
        'missions' => $missions
      ];
     
      $this->view('missions/index', $data);
    }
    
    public function add(){
      if(!isLoggedIn()){
        redirect('admins/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'dateDebut' => trim($_POST['dateDebut']),
          'dateFin' => trim($_POST['dateFin']),
          'titre' => trim($_POST['titre']),
          'description' => trim($_POST['description']),
          'nomCode' => trim($_POST['nomCode']),
          'idPays' => trim($_POST['idPays']),
          'idTypeMission' => trim($_POST['idTypeMission']),
          'idStatut' => trim($_POST['idStatut']),
          'idSpecialite' => trim($_POST['idSpecialite']),
          'admin_id' => $_SESSION['admin_id'],
          'dateDebut_err' => '',
          'dateFin_err' => '',
          'titre_err' => '',
          'description_err' => '',
          'nomCode_err' => '',
          'idPays_err' => '',
          'idTypeMission_err' => '',
          'idStatut_err' => '',
          'idSpecialite_err' => ''
        ];

        // Validate data
        if(empty($data['dateDebut'])){
          $data['dateDebut_err'] = 'Veuillez entrer une date de début';
        }
        if(empty($data['dateFin'])){
          $data['dateFin_err'] = 'Veuillez entrer une date de fin';
        }
        if(empty($data['titre'])){
          $data['titre_err'] = 'Veuillez entrer un titre';
        }
        if(empty($data['description'])){
          $data['description_err'] = 'Veuillez entrer une description';
        }
        if(empty($data['nomCode'])){
          $data['nomCode_err'] = 'Veuillez entrer un nom de code';
        }
        if(empty($data['idPays'])){
          $data['idPays_err'] = 'Veuillez entrer un id de pays';
        }
        if(empty($data['idTypeMission'])){
          $data['idTypeMission_err'] = 'Veuillez entrer un id de type de mission';
        }
        if(empty($data['idStatut'])){
          $data['idStatut_err'] = 'Veuillez entrer un id de statut';
        }
        if(empty($data['idSpecialite'])){
          $data['idSpecialite_err'] = 'Veuillez entrer un id de specialite';
        }

        // Make sure no errors
        if(empty($data['dateDebut_err']) && empty($data['dateFin_err']) &&
           empty($data['titre_err']) && empty($data['description_err']) &&
           empty($data['nomCode_err']) && empty($data['idPays_err']) &&
           empty($data['idTypeMission_err']) && empty($data['idStatut_err']) &&
           empty($data['idSpecialite_err'])){
          // Validated
          if($this->missionModel->addMission($data)){
            flash('post_message', 'Mission Added');
            redirect('missions');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('missions/add', $data);
        }

      } else {
        $data = [
          'dateDebut' => '',
          'dateFin' => '',
          'titre' => '',
          'description' => '',
          'nomCode' => '',
          'idPays' => '',
          'idTypeMission' => '',
          'idStatut' => '',
          'idSpecialite' => ''
        ];
  
        $this->view('missions/add', $data);
      }
    }

    public function show($id){
      $mission = $this->missionModel->getMissionById($id);
      $missionAgent = $this->missionModel->getMissionAgentById($id);
      $missionSpeAgent = $this->missionModel->getSpecialitesAgentbyId($id);
      $missionContact = $this->missionModel->getMissionContactById($id);
      $missionCible = $this->missionModel->getMissionCibleById($id);
      $missionPlanque = $this->missionModel->getMissionPlanqueById($id);

      $data = [
        'mission' => $mission,
        'missionAgent' => $missionAgent,
        'missionSpeAgent' => $missionSpeAgent,
        'missionContact' => $missionContact,
        'missionCible' => $missionCible,
        'missionPlanque' => $missionPlanque
      ];

      $this->view('missions/show', $data);
    }
}