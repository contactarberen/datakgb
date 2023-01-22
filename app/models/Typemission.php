<?php
    class Typemission {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getTypemissions(){
            $this->db->query('SELECT * FROM typemissions');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getTypeMissionById($id){
          $this->db->query('SELECT * FROM typemissions WHERE typemissions.idTypeMission= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO typemissions (idTypeMission, nom) 
            VALUES(:idTypeMission,:nom)');
            // Bind values
            $this->db->bind(':idTypeMission', $data['idTypeMission']);
            $this->db->bind(':nom', $data['nom']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
        
          public function update($data){
          $this->db->query('UPDATE typemissions SET idTypeMission = :idTypeMission, nom = :nom WHERE idTypeMission = :idTypeMission');
          // Bind values
          $this->db->bind(':idTypeMission', $data['idTypeMission']);
          $this->db->bind(':nom', $data['nom']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM typemissions WHERE idTypeMission = :id');
          // Bind values
          $this->db->bind(':id', $id);
    
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }
  }