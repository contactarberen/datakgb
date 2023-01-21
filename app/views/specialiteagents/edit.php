<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/specialiteagents" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Modification d'une spécialite à un agent</h2>
        <p>Modification d'une spécialité à un agent à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/specialiteagents/edit/<?php echo $data['idAgent']; ?>" method="post">
            <div class="form-group">
                <label for="idAgent">Id de l'agent: <sup>*</sup></label>
                <input type="text" name="idAgent" class="form-control form-control-lg <?php echo (!empty($data['idAgent_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idAgent']; ?>">
                <span class="invalid-feedback"><?php echo $data['idAgent_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idSpecialite">Id de la spécialité: <sup>*</sup></label>
                <input type="text" name="idSpecialite" class="form-control form-control-lg <?php echo (!empty($data['idSpecialite_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idSpecialite']; ?>">
                <span class="invalid-feedback"><?php echo $data['idSpecialite_err']; ?></span>
            </div>
            
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>