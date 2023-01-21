<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/specialites/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter une spécialité
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id de la spécialité</th>
            <th scope="col">Nom de la spécialité</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['specialites'] as $specialite) : ?>
            <tr class=<?php echo("ligne" . "$specialite->idSpecialite");?>>
            <td><?php echo $specialite->idSpecialite; ?></td>
            <td><?php echo $specialite->nom; ?></td>
            <td><a href="<?php echo URLROOT; ?>/specialites/edit/<?php echo $specialite->idSpecialite; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/specialites/delete/<?php echo $specialite->idSpecialite; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>