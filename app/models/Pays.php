<?php
    class Pays {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPayss(){
            $this->db->query('SELECT * FROM pays');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPaysById($id){
          $this->db->query('SELECT * FROM pays WHERE pays.idPays= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO pays (idPays, nom) 
            VALUES(:idPays,:nom)');
            // Bind values
            $this->db->bind(':idPays', $data['idPays']);
            $this->db->bind(':nom', $data['nom']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
          
        public function update($data){
          $this->db->query('UPDATE pays SET idPays = :idPays, nom = :nom WHERE idPays = :idPays');
          // Bind values
          $this->db->bind(':idPays', $data['idPays']);
          $this->db->bind(':nom', $data['nom']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM pays WHERE idPays = :id');
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