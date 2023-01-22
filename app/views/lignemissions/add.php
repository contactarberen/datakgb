<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/lignemissions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Ajout d'une ligne sur la mission</h2>
        <p>Ajout d'une ligne sur la mission à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/lignemissions/add" method="post">
            <div class="form-group">
                <label for="idMission">Id mission: <sup>*</sup></label>
                <input type="text" name="idMission" class="form-control form-control-lg <?php echo (!empty($data['idMission_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idMission']; ?>">
                <span class="invalid-feedback"><?php echo $data['idMission_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idAgent">Id agent: <sup>*</sup></label>
                <input type="text" name="idAgent" class="form-control form-control-lg <?php echo (!empty($data['idAgent_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idAgent']; ?>">
                <span class="invalid-feedback"><?php echo $data['idAgent_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idContact">Id contact: <sup>*</sup></label>
                <input type="text" name="idContact" class="form-control form-control-lg <?php echo (!empty($data['idContact_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idContact']; ?>">
                <span class="invalid-feedback"><?php echo $data['idContact_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idCible">Id cible: <sup>*</sup></label>
                <input type="text" name="idCible" class="form-control form-control-lg <?php echo (!empty($data['idCible_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idCible']; ?>">
                <span class="invalid-feedback"><?php echo $data['idCible_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idPlanque">Id planque: <sup>*</sup></label>
                <input type="text" name="idPlanque" class="form-control form-control-lg <?php echo (!empty($data['idPlanque_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idPlanque']; ?>">
                <span class="invalid-feedback"><?php echo $data['idPlanque_err']; ?></span>
            </div>

            
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>