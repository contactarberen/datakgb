<?php
    class Lignemission {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getLignemissions(){
            $this->db->query('SELECT * FROM lignemissions');
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getLigneMissionById($id){
          $this->db->query('SELECT * FROM lignemissions WHERE lignemissions.idMission= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }        
        
        public function checkRegleMetier1($data){
          $this->db->query('SELECT * FROM lignemissions WHERE lignemissions.idMission= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        


        public function add($data){
            $this->db->query('INSERT INTO lignemissions (idMission, idAgent, idContact, idCible, idPlanque) 
            VALUES(:idMission,:idAgent,:idContact,:idCible,:idPlanque)');
            // Bind values
            $this->db->bind(':idMission', $data['idMission']);
            $this->db->bind(':idAgent', $data['idAgent']);
            $this->db->bind(':idContact', $data['idContact']);
            $this->db->bind(':idCible', $data['idCible']);
            $this->db->bind(':idPlanque', $data['idPlanque']);
                        
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function update($data){
          $this->db->query('UPDATE lignemissions SET idMission = :idMission, idAgent = :idAgent, 
                                  idContact = :idContact, idCible = :idCible,idPlanque = :idPlanque
                                  WHERE idPays = :idPays');
          // Bind values
          $this->db->bind(':idMission', $data['idMission']);
          $this->db->bind(':idAgent', $data['idAgent']);
          $this->db->bind(':idContact', $data['idContact']);
          $this->db->bind(':idCible', $data['idCible']);
          $this->db->bind(':idPlanque', $data['idPlanque']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM lignemissions WHERE idMission = :id');
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