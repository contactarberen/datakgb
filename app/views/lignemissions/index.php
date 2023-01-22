<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/lignemissions/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter un type de mission
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id mission</th>
            <th scope="col">Id agent</th>
            <th scope="col">Id contact</th>
            <th scope="col">Id cible</th>
            <th scope="col">Id planque</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['lignemissions'] as $lignemission) : ?>
            <tr class=<?php echo("ligne" . "$lignemission->idMission");?>>
            <td><?php echo $lignemission->idMission; ?></td>
            <td><?php echo $lignemission->idAgent; ?></td>
            <td><?php echo $lignemission->idContact; ?></td>
            <td><?php echo $lignemission->idCible; ?></td>
            <td><?php echo $lignemission->idPlanque; ?></td>
            <td><a href="<?php echo URLROOT; ?>/lignemissions/edit/<?php echo $lignemission->idMission; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/lignemissions/delete/<?php echo $lignemission->idMission; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>