<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/statutmissions/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter une spécialité
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id du statut de la mission</th>
            <th scope="col">Nom du statut</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['statutmissions'] as $statutmission) : ?>
            <tr class=<?php echo("ligne" . "$statutmission->idStatutMission");?>>
            <td><?php echo $statutmission->idStatutMission; ?></td>
            <td><?php echo $statutmission->nom; ?></td>
            <td><a href="<?php echo URLROOT; ?>/statutmissions/edit/<?php echo $statutmission->idStatutMission; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/statutmissions/delete/<?php echo $statutmission->idStatutMission; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>