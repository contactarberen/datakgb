<?php
    class Contact {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getContacts(){
            $this->db->query('SELECT * FROM contacts');
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function getContactById($id){
          $this->db->query('SELECT * FROM contacts WHERE contacts.idContact= :id');
          $this->db->bind(':id', $id);
    
          $row = $this->db->single();
    
          return $row;
        }

        public function add($data){
            $this->db->query('INSERT INTO contacts (idContact, nom, prenom, dateNaissance, nomCode, idNationalite) 
            VALUES(:idContact,:nom,:prenom,:dateNaissance,:nomCode,:idNationalite)');
            // Bind values
            $this->db->bind(':idContact', $data['idContact']);
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
        $this->db->query('UPDATE contacts SET idContact = :idContact, nom = :nom, prenom = :prenom, 
                                  dateNaissance = :dateNaissance, nomCode = :nomCode, idNationalite = :idNationalite 
                                  WHERE idContact = :idContact');
        // Bind values
        $this->db->bind(':idContact', $data['idContact']);
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
        $this->db->query('DELETE FROM contacts WHERE idContact = :id');
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