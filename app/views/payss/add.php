<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/payss" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Ajout d'un pays</h2>
        <p>Ajout d'un pays à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/payss/add" method="post">
            <div class="form-group">
                <label for="idPays">Id du pays: <sup>*</sup></label>
                <input type="text" name="idPays" class="form-control form-control-lg <?php echo (!empty($data['idPays_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idPays']; ?>">
                <span class="invalid-feedback"><?php echo $data['idPays_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="nom">Nom du pays: <sup>*</sup></label>
                <input type="text" name="nom" class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
            </div>
            
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>