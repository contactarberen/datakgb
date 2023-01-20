<?php
    class Cible {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getCibles(){
            $this->db->query('SELECT * FROM cibles');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getCibleById($id){
          $this->db->query('SELECT * FROM cibles WHERE cibles.idCible= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }
        
        public function add($data){
            $this->db->query('INSERT INTO cibles (idCible, nom, prenom, dateNaissance, nomCode, idNationalite) 
            VALUES(:idCible,:nom,:prenom,:dateNaissance,:nomCode,:idNationalite)');
            // Bind values
            $this->db->bind(':idCible', $data['idCible']);
            $this->db->bind(':nom', $data['nom']);
            $this->db->bind(':prenom', $data['prenom']);
            $this->db->bind(':dateNaissance', $data['dateNaissance']);
            $this->db->bind(':nomCode', $data['nomCode']);
            $this->db->bind(':idNationalite', $data['idNationalite']);
            
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function update($data){
          $this->db->query('UPDATE cibles SET idCible = :idCible, nom = :nom, prenom = :prenom,
                                    dateNaissance = :dateNaissance, nomCode = :nomCode, idNationalite = :idNationalite
                                     WHERE idCible = :idCible');
          // Bind values
          $this->db->bind(':idCible', $data['idCible']);
          $this->db->bind(':nom', $data['nom']);
          $this->db->bind(':prenom', $data['prenom']);
          $this->db->bind(':dateNaissance', $data['dateNaissance']);
          $this->db->bind(':nomCode', $data['nomCode']);
          $this->db->bind(':idNationalite', $data['idNationalite']);
          
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function delete($id){
          $this->db->query('DELETE FROM cibles WHERE idCible = :id');
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