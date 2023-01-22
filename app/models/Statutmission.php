<?php
    class Statutmission {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getStatutmissions(){
            $this->db->query('SELECT * FROM statutmissions');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getStatutMissionById($id){
          $this->db->query('SELECT * FROM statutmissions WHERE statutmissions.idStatutMission= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }

        public function add($data){
            $this->db->query('INSERT INTO statutmissions (idStatutMission, nom) 
            VALUES(:idStatutMission,:nom)');
            // Bind values
            $this->db->bind(':idStatutMission', $data['idStatutMission']);
            $this->db->bind(':nom', $data['nom']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function update($data){
          $this->db->query('UPDATE statutmissions SET idStatutMission = :idStatutMission, nom = :nom WHERE idStatutMission = :idStatutMission');
          // Bind values
          $this->db->bind(':idStatutMission', $data['idStatutMission']);
          $this->db->bind(':nom', $data['nom']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM statutmissions WHERE idStatutMission = :id');
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