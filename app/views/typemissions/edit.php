<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/typemissions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Modification d'un type de mission</h2>
        <p>Modification d'un type de mission à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/typemissions/edit/<?php echo $data['idTypeMission']; ?>" method="post">
            <div class="form-group">
                <label for="idTypeMission">Id du type de mission: <sup>*</sup></label>
                <input type="text" name="idTypeMission" class="form-control form-control-lg <?php echo (!empty($data['idTypeMission_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idTypeMission']; ?>">
                <span class="invalid-feedback"><?php echo $data['idTypeMission_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="nom">Nom du type: <sup>*</sup></label>
                <input type="text" name="nom" class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
            </div>
            
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>