<?php
    class Specialite {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getSpecialites(){
            $this->db->query('SELECT * FROM specialites');
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getSpecialiteById($id){
          $this->db->query('SELECT * FROM specialites WHERE specialites.idSpecialite= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }

        public function add($data){
            $this->db->query('INSERT INTO specialites (idSpecialite, nom) 
            VALUES(:idSpecialite,:nom)');
            // Bind values
            $this->db->bind(':idSpecialite', $data['idSpecialite']);
            $this->db->bind(':nom', $data['nom']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
        
        public function update($data){
          $this->db->query('UPDATE specialites SET idSpecialite = :idSpecialite, nom = :nom WHERE idSpecialite = :idSpecialite');
          // Bind values
          $this->db->bind(':idSpecialite', $data['idSpecialite']);
          $this->db->bind(':nom', $data['nom']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM specialites WHERE idSpecialite = :id');
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