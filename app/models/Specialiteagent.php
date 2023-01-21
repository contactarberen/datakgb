<?php
    class Specialiteagent {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getSpecialiteagents(){
            $this->db->query('SELECT * FROM specialiteagents');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getSpecialiteAgentById($id){
          $this->db->query('SELECT * FROM specialiteagents WHERE specialiteagents.idAgent= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO specialiteagents (idAgent, idSpecialite) 
            VALUES(:idAgent,:idSpecialite)');
            // Bind values
            $this->db->bind(':idAgent', $data['idAgent']);
            $this->db->bind(':idSpecialite', $data['idSpecialite']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function update($data){
          $this->db->query('UPDATE specialiteagents SET idAgent = :idAgent, idSpecialite = :idSpecialite WHERE idAgent = :idAgent');
          // Bind values
          $this->db->bind(':idAgent', $data['idAgent']);
          $this->db->bind(':idSpecialite', $data['idSpecialite']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM specialiteagents WHERE idAgent = :id');
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