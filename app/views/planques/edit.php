<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/planques" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Modification d'une planque</h2>
        <p>Modification d'une planque à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/planques/edit/<?php echo $data['idPlanque']; ?>" method="post">
            <div class="form-group">
                <label for="nomCode">Nom de code: <sup>*</sup></label>
                <input type="text" name="nomCode" class="form-control form-control-lg <?php echo (!empty($data['nomCode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nomCode']; ?>">
                <span class="invalid-feedback"><?php echo $data['nomCode_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse: <sup>*</sup></label>
                <input type="text" name="adresse" class="form-control form-control-lg <?php echo (!empty($data['adresse_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['adresse']; ?>">
                <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idPays">Id du pays: <sup>*</sup></label>
                <input type="text" name="idPays" class="form-control form-control-lg <?php echo (!empty($data['idPays_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idPays']; ?>">
                <span class="invalid-feedback"><?php echo $data['idPays_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="type">Type: <sup>*</sup></label>
                <input type="text" name="type" class="form-control form-control-lg <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['type']; ?>">
                <span class="invalid-feedback"><?php echo $data['type_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>