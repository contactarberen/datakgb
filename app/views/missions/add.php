<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  <div class="card card-body bg-light mt-5">
    <h2>Ajout d'une mission</h2>
    <p>Création d'une mission à l'aide de ce formulaire</p>
    <form action="<?php echo URLROOT; ?>/missions/add" method="post">
    <div class="form-group">
        <label for="dateDebut">Date de début: <sup>*</sup></label>
        <input type="text" name="dateDebut" class="form-control form-control-lg <?php echo (!empty($data['dateDebut_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dateDebut']; ?>">
        <span class="invalid-feedback"><?php echo $data['dateDebut_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="dateFin">Date de fin: <sup>*</sup></label>
        <input type="text" name="dateFin" class="form-control form-control-lg <?php echo (!empty($data['dateFin_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dateFin']; ?>">
        <span class="invalid-feedback"><?php echo $data['dateFin_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="titre">Titre: <sup>*</sup></label>
        <input type="text" name="titre" class="form-control form-control-lg <?php echo (!empty($data['titre_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['titre']; ?>">
        <span class="invalid-feedback"><?php echo $data['titre_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="description">Description: <sup>*</sup></label>
        <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="nomCode">Nom de code: <sup>*</sup></label>
        <input type="text" name="nomCode" class="form-control form-control-lg <?php echo (!empty($data['nomCode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nomCode']; ?>">
        <span class="invalid-feedback"><?php echo $data['nomCode_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="idPays">Id du pays: <sup>*</sup></label>
        <input type="text" name="idPays" class="form-control form-control-lg <?php echo (!empty($data['idPays_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idPays']; ?>">
        <span class="invalid-feedback"><?php echo $data['idPays_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="idTypeMission">Id du type de la mission: <sup>*</sup></label>
        <input type="text" name="idTypeMission" class="form-control form-control-lg <?php echo (!empty($data['idTypeMission_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idTypeMission']; ?>">
        <span class="invalid-feedback"><?php echo $data['idTypeMission_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="idStatut">Id du statut: <sup>*</sup></label>
        <input type="text" name="idStatut" class="form-control form-control-lg <?php echo (!empty($data['idStatut_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idStatut']; ?>">
        <span class="invalid-feedback"><?php echo $data['idStatut_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="idSpecialite">Id Spécialité: <sup>*</sup></label>
        <input type="text" name="idSpecialite" class="form-control form-control-lg <?php echo (!empty($data['idSpecialite_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idSpecialite']; ?>">
        <span class="invalid-feedback"><?php echo $data['idSpecialite_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Envoyer">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>