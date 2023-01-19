<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center">
    <div class="container">
    <h1 class="display-5"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    </div>
  </div>
  <?php if(isset($_SESSION['admin_id'])) : ?>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/missions/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Ajouter Mission
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/agents/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Agents
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/cibles/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Cibles
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/contacts/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Contacts
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/payss/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Pays
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/planques/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Planques
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/specialiteagents/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Specialite Agent
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/specialites/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion Specialite
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/statutmissions/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion du statut
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/typemissions/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion du type
          </a>
    </div>
    <div class="col-md-12">
          <a href="<?php echo URLROOT; ?>/lignemissions/index" class="btn btn-secondary pull-right">
            <i class="fa fa-pencil"></i> Gestion ligne mission
          </a>
    </div>
  <?php endif; ?>
     
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Date de début</th>
        <th scope="col">Date de fin</th>
        <th scope="col">Titre</th>
        <th scope="col">Type de la mission</th>
        <th scope="col">Statut</th>
        <th scope="col">Pays</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data['missions'] as $mission) : ?>
        <tr class=<?php echo("ligne" . "$mission->idMission");?>>
          <td><?php echo $mission->dateDebut; ?></td>
          <td><?php echo $mission->dateFin; ?></td>
          <td><?php echo $mission->titre; ?></td>
          <td><?php echo $mission->typeMission; ?></td>
          <td><?php echo $mission->statutMission; ?></td>
          <td><?php echo $mission->nomPays; ?></td>
          <td><a href="<?php echo URLROOT; ?>/missions/show/<?php echo $mission->idMission; ?>" class="btn btn-dark">Détails</a></td>
          <td><a href="<?php echo URLROOT; ?>/missions/edit/<?php echo $mission->idMission; ?>" class="btn btn-dark">Editer</a></td>
          <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/missions/delete/<?php echo $mission->idMission; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>


<?php require APPROOT . '/views/inc/footer.php'; ?>
