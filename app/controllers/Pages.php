<?php
  class Pages extends Controller {
    public function __construct(){
      $this->adminModel = $this->model('Admin');
      $this->missionModel = $this->model('Mission');
    }
    
    public function index(){
      // Get missions
      $missions = $this->missionModel->getMissions();

      $data = [
        'title' => 'DataKGB',
        'description' => 'Gestion de la base de données du KGB',
        'missions' => $missions
      ];
     
      $this->view('pages/index', $data);
    }

        
    
    
    public function about(){
      $data = [
        'title' => 'A propos',
        'description' => 'Application de gestion de la base de données du KGB et partage des missions'
      ];

      $this->view('pages/about', $data);
    }
  }