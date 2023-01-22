<?php
    class Planque {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPlanques(){
            $this->db->query('SELECT * FROM planques');
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getPlanqueById($id){
          $this->db->query('SELECT * FROM planques WHERE planques.idPlanque= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO planques (idPlanque, nomCode, adresse, idPays, type) 
            VALUES(:idPlanque,:nomCode,:adresse,:idPays,:type)');
            // Bind values
            $this->db->bind(':idPlanque', $data['idPlanque']);
            $this->db->bind(':nomCode', $data['nomCode']);
            $this->db->bind(':adresse', $data['adresse']);
            $this->db->bind(':idPays', $data['idPays']);
            $this->db->bind(':type', $data['type']);
                        
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function update($data){
            $this->db->query('UPDATE planques SET idPlanque = :idPlanque, nomCode = :nomCode, adresse = :adresse, 
                    idPays = :idPays, type = :type WHERE idPlanque = :idPlanque');
            // Bind values
            $this->db->bind(':idPlanque', $data['idPlanque']);
            $this->db->bind(':nomCode', $data['nomCode']);
            $this->db->bind(':adresse', $data['adresse']);
            $this->db->bind(':idPays', $data['idPays']);
            $this->db->bind(':type', $data['type']);
                        
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
          
          public function delete($id){
            $this->db->query('DELETE FROM planques WHERE idPlanque = :id');
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