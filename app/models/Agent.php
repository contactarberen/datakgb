<?php
    class Agent {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getAgents(){
            $this->db->query('SELECT * FROM agents');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAgentById($id){
          $this->db->query('SELECT * FROM agents WHERE agents.idAgent= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO agents (idAgent, nom, prenom, dateNaissance, codeId, idNationalite) 
            VALUES(:idAgent,:nom,:prenom,:dateNaissance,:codeId,:idNationalite)');
            // Bind values
            $this->db->bind(':idAgent', $data['idAgent']);
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':dateNaissance', $data['dateNaissance']);
            $this->db->bind(':codeId', $data['codeId']);
            $this->db->bind(':idNationalite', $data['idNationalite']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
        public function update($data){
          $this->db->query('UPDATE agents SET idAgent = :idAgent, nom = :nom, prenom = :prenom, 
                                    dateNaissance = :dateNaissance, codeId = :codeId, idNationalite = :idNationalite 
                                    WHERE idAgent = :idAgent');
          // Bind values
          $this->db->bind(':idAgent', $data['idAgent']);
          $this->db->bind(':nom', $data['nom']);
          $this->db->bind(':prenom', $data['prenom']);
          $this->db->bind(':dateNaissance', $data['dateNaissance']);
          $this->db->bind(':codeId', $data['codeId']);
          $this->db->bind(':idNationalite', $data['idNationalite']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }
  
        public function delete($id){
          $this->db->query('DELETE FROM agents WHERE idAgent = :id');
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