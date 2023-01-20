<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/cibles" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <div class="card card-body bg-light mt-5">
        <h2>Modification d'une cible</h2>
        <p>Modification d'une cible à l'aide de ce formulaire</p>
        <form action="<?php echo URLROOT; ?>/cibles/edit/<?php echo $data['idCible']; ?>" method="post">
            <div class="form-group">
                <label for="nom">Nom: <sup>*</sup></label>
                <input type="text" name="nom" class="form-control form-control-lg <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom: <sup>*</sup></label>
                <input type="text" name="prenom" class="form-control form-control-lg <?php echo (!empty($data['prenom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prenom']; ?>">
                <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="dateNaissance">Date de naissance: <sup>*</sup></label>
                <input type="text" name="dateNaissance" class="form-control form-control-lg <?php echo (!empty($data['dateNaissance_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['dateNaissance']; ?>">
                <span class="invalid-feedback"><?php echo $data['dateNaissance_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="nomCode">nom de code: <sup>*</sup></label>
                <input type="text" name="nomCode" class="form-control form-control-lg <?php echo (!empty($data['nomCode_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nomCode']; ?>">
                <span class="invalid-feedback"><?php echo $data['nomCode_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="idNationalite">Id Nationalité: <sup>*</sup></label>
                <input type="text" name="idNationalite" class="form-control form-control-lg <?php echo (!empty($data['idNationalite_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['idNationalite']; ?>">
                <span class="invalid-feedback"><?php echo $data['idNationalite_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Envoyer">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>