<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/statutmissions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Modification d'une spécialite à un agent</h2>
        <p>Modification d'une spécialité à un agent à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/statutmissions/edit/<?php echo $data['idStatutMission']; ?>" method="post">
            <div class="form-group">
                <label for="idStatutMission">Id du statut de la mission: <sup>*</sup></label>
                <input type="text" name="idStatutMission" class="form-control form-control-lg <?php echo (!empty($data['idStatutMission_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idStatutMission']; ?>">
                <span class="invalid-feedback"><?php echo $data['idStatutMission_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="nom">Nom du statut: <sup>*</sup></label>
                <input type="text" name="nom" class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
            </div>
            
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>