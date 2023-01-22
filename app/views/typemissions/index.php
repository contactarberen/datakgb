<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/typemissions/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter une spécialité
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id du type de mission</th>
            <th scope="col">Nom du type</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['typemissions'] as $typemission) : ?>
            <tr class=<?php echo("ligne" . "$typemission->idTypeMission");?>>
            <td><?php echo $typemission->idTypeMission; ?></td>
            <td><?php echo $typemission->nom; ?></td>
            <td><a href="<?php echo URLROOT; ?>/typemissions/edit/<?php echo $typemission->idTypeMission; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/typemissions/delete/<?php echo $typemission->idTypeMission; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>