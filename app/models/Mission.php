<?php
  class Mission {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getMissions(){
      $this->db->query('SELECT mi.idMission, mi.dateDebut, mi.dateFin, mi.titre, 
                        ty.nom AS typeMission,st.nom AS statutMission, p.nom AS nomPays
                        FROM missions AS mi
                        JOIN typemissions AS ty
                        ON ty.idTypeMission = mi.idTypeMission
                        JOIN statutmissions AS st
                        ON st.idStatutMission = mi.idStatut
                        JOIN pays AS p
                        ON p.idPays = mi.idPays
                        ORDER BY mi.dateDebut ASC
                    ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addMission($data){
      $this->db->query('INSERT INTO missions (idMission, dateDebut, dateFin, titre, description, nomCode, idPays, idTypeMission,idStatut,idSpecialite) 
      VALUES(:idMission,:dateDebut,:dateFin,:titre,:description,:nomCode,:idPays,:idTypeMission,:idStatut,:idSpecialite)');
      // Bind values
      $this->db->bind(':idMission', $data['idMission']);
      $this->db->bind(':dateDebut', $data['dateDebut']);
      $this->db->bind(':dateFin', $data['dateFin']);
      $this->db->bind(':titre', $data['titre']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':nomCode', $data['nomCode']);
      $this->db->bind(':idPays', $data['idPays']);
      $this->db->bind(':idTypeMission', $data['idTypeMission']);
      $this->db->bind(':idStatut', $data['idStatut']);
      $this->db->bind(':idSpecialite', $data['idSpecialite']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
    public function updateMission($data){
      $this->db->query('UPDATE missions SET idMission = :idMission, dateDebut = :dateDebut, dateFin = :dateFin,titre = :titre,
                              description = :description, nomCode = :nomCode, idPays = :idPays, idTypeMission = :idTypeMission,
                              idStatut = :idStatut, idSpecialite = :idSpecialite WHERE idMission = :idMission');
      // Bind values
      $this->db->bind(':idMission', $data['idMission']);
      $this->db->bind(':dateDebut', $data['dateDebut']);
      $this->db->bind(':dateFin', $data['dateFin']);
      $this->db->bind(':titre', $data['titre']);
      $this->db->bind(':description', $data['description']);
      $this->db->bind(':nomCode', $data['nomCode']);
      $this->db->bind(':idPays', $data['idPays']);
      $this->db->bind(':idTypeMission', $data['idTypeMission']);
      $this->db->bind(':idStatut', $data['idStatut']);
      $this->db->bind(':idSpecialite', $data['idSpecialite']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getMissionById($id){
      $this->db->query('SELECT *,mi.idMission, mi.dateDebut, mi.dateFin, mi.titre, 
                        ty.nom AS typeMission,st.nom AS statutMission, p.nom AS nomPays, 
                        sp.nom AS nomSpecialite
                        FROM missions AS mi 
                        JOIN typemissions AS ty ON ty.idTypeMission = mi.idTypeMission 
                        JOIN statutmissions AS st ON st.idStatutMission = mi.idStatut 
                        JOIN pays AS p ON p.idPays = mi.idPays
                        JOIN specialites AS sp ON sp.idSpecialite = mi.idSpecialite
                        WHERE mi.idMission = :id
                        ORDER BY mi.dateDebut ASC
        ');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getMissionAgentById($id){
      $this->db->query('SELECT li.idMission AS MissionId, 
                        ag.nom AS nomAgent, ag.prenom AS prenomAgent,ag.dateNaissance AS dateNaissAgent, 
                          ag.codeId AS CodeIdAgent, pa.nom AS NationaliteAgent, ag.idAgent AS agentId
                        FROM lignemissions AS li
                        JOIN agents AS ag ON ag.idAgent = li.idAgent
                        JOIN pays AS pa ON pa.idPays = ag.idNationalite
                        WHERE li.idMission = :id
                        ORDER BY li.idMission ASC
        ');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getSpecialitesAgentbyId($id){
      $this->db->query('SELECT ag.idAgent AS agentId, sp.nom AS nomSpecialite 
                        FROM lignemissions AS li
                        JOIN specialiteagents AS spa ON spa.idAgent = li.idAgent
                        JOIN agents AS ag ON ag.idAgent = spa.idAgent
                        JOIN specialites AS sp ON sp.idSpecialite = spa.idSpecialite
                        WHERE li.idMission = :id
                        ORDER BY li.idMission ASC
        ');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getMissionContactById($id){
      $this->db->query('SELECT li.idMission AS MissionId, 
                        co.nom AS nomContact, co.prenom AS prenomContact,co.dateNaissance AS dateNaissContact, 
                          co.nomCode AS nomCodeContact, pa.nom AS NationaliteContact
                        FROM lignemissions AS li
                        JOIN contacts AS co ON co.idContact = li.idContact
                        JOIN pays AS pa ON pa.idPays = co.idNationalite
                        WHERE li.idMission = :id
                        ORDER BY li.idMission ASC
        ');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getMissionCibleById($id){
      $this->db->query('SELECT li.idMission AS MissionId, 
                        ci.nom AS nomCible, ci.prenom AS prenomCible,ci.dateNaissance AS dateNaissCible, 
                          ci.nomCode AS nomCodeCible, pa.nom AS NationaliteCible
                        FROM lignemissions AS li
                        JOIN cibles AS ci ON ci.idCible = li.idCible
                        JOIN pays AS pa ON pa.idPays = ci.idNationalite
                        WHERE li.idMission = :id
                        ORDER BY li.idMission ASC
        ');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getMissionPlanqueById($id){
      $this->db->query('SELECT li.idMission AS MissionId, 
                        pl.nomCode AS nomPlanque, pl.adresse AS adressePlanque, pa.nom AS PaysPlanque,
                          pl.type AS typePlanque
                        FROM lignemissions AS li
                        JOIN planques AS pl ON pl.idPlanque = li.idPlanque
                        JOIN pays AS pa ON pa.idPays = pl.idPays
                        WHERE li.idMission = :id
                        ORDER BY li.idMission ASC
        ');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function delete($id){
      $this->db->query('DELETE FROM missions WHERE idMission = :id');
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