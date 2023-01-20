<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/cibles/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Cibles
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Id du code</th>
            <th scope="col">Id nationalité</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['cibles'] as $cible) : ?>
            <tr class=<?php echo("ligne" . "$cible->idCible");?>>
            <td><?php echo $cible->nom; ?></td>
            <td><?php echo $cible->prenom; ?></td>
            <td><?php echo $cible->dateNaissance; ?></td>
            <td><?php echo $cible->nomCode; ?></td>
            <td><?php echo $cible->idNationalite; ?></td>
            <td><a href="<?php echo URLROOT; ?>/cibles/edit/<?php echo $cible->idCible; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/cibles/delete/<?php echo $cible->idCible; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>