<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
<br>
<h1><?php echo $data['mission']->titre; ?></h1>
<div class="bg-primary text-white p-2 mb-3">
Nom de code: <?php echo $data['mission']->nomCode; ?>
</div>
<p>Date de début: <?php echo $data['mission']->dateDebut; ?><br>
  Date de fin: <?php echo $data['mission']->dateFin; ?></p>
<h3>Description de la mission</h3>
<p><?php echo $data['mission']->description; ?></p>
<h3>Informations complémentaires</h3>
<table class="table table-bordered">
  <tbody>
    <tr class="ligne">
      <td>Pays</td>
      <td><?php echo $data['mission']->nomPays; ?></td>
    </tr>
    <tr class="ligne">
      <td>Type de mission</td>
      <td><?php echo $data['mission']->typeMission; ?></td>
    </tr>
    <tr class="ligne">
      <td>Statut</td>
      <td><?php echo $data['mission']->statutMission; ?>
    </tr>
    <tr class="ligne">
      <td>Spécialité</td>
      <td><?php echo $data['mission']->nomSpecialite; ?></td>
    </tr>
  </tbody>
</table>

<h3>Agents</h3>
  <table class="table">
      <thead>
        <tr class="bg-primary text-white p-2 mb-3">
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Date de naissance</th>
          <th scope="col">Code d'identification</th>
          <th scope="col">Nationalité</th>
          <th scope="col">Spécialités</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data['missionAgent'] as $missionMi) : ?>
          <tr class="ligne">
            <td><?php echo $missionMi->nomAgent; ?></td>
            <td><?php echo $missionMi->prenomAgent; ?></td>
            <td><?php echo $missionMi->dateNaissAgent; ?></td>
            <td><?php echo $missionMi->CodeIdAgent; ?></td>
            <td><?php echo $missionMi->NationaliteAgent; ?></td>
            <td><?php foreach($data['missionSpeAgent'] as $missionSpeA) : ?>
                  <?php if($missionSpeA->agentId == $missionMi->agentId){
                      echo $missionSpeA->nomSpecialite.'<br>';
                  }?>
                        
                <?php endforeach; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
  </table>

<h3>Contacts</h3>
<table class="table">
  <thead>
    <tr class="bg-primary text-white p-2 mb-3">
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Nom de code</th>
      <th scope="col">Nationalité</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data['missionContact'] as $missionMi) : ?>
      <tr class="ligne">
        <td><?php echo $missionMi->nomContact; ?></td>
        <td><?php echo $missionMi->prenomContact; ?></td>
        <td><?php echo $missionMi->dateNaissContact; ?></td>
        <td><?php echo $missionMi->nomCodeContact; ?></td>
        <td><?php echo $missionMi->NationaliteContact; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
  </table>
<h3>Cibles</h3>
  <table class="table">
    <thead>
      <tr class="bg-primary text-white p-2 mb-3">
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Nom de code</th>
        <th scope="col">Nationalité</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['missionCible'] as $missionMi) : ?>
        <tr class="ligne">
          <td><?php echo $missionMi->nomCible; ?></td>
          <td><?php echo $missionMi->prenomCible; ?></td>
          <td><?php echo $missionMi->dateNaissCible; ?></td>
          <td><?php echo $missionMi->nomCodeCible; ?></td>
          <td><?php echo $missionMi->NationaliteCible; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table>
<h3>Planques</h3>
  <table class="table">
    <thead>
      <tr class="bg-primary text-white p-2 mb-3">
        <th scope="col">Nom de code</th>
        <th scope="col">Adresse</th>
        <th scope="col">Pays</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['missionPlanque'] as $missionMi) : ?>
        <tr class="ligne">
          <td><?php echo $missionMi->nomPlanque; ?></td>
          <td><?php echo $missionMi->adressePlanque; ?></td>
          <td><?php echo $missionMi->PaysPlanque; ?></td>
          <td><?php echo $missionMi->typePlanque; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </table>

<?php require APPROOT . '/views/inc/footer.php'; ?>

