<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/planques/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Planques
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom de code</th>
            <th scope="col">Adresse</th>
            <th scope="col">Id du pays</th>
            <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['planques'] as $planque) : ?>
            <tr class=<?php echo("ligne" . "$planque->idPlanque");?>>
            <td><?php echo $planque->nomCode; ?></td>
            <td><?php echo $planque->adresse; ?></td>
            <td><?php echo $planque->idPays; ?></td>
            <td><?php echo $planque->type; ?></td>
            <td><a href="<?php echo URLROOT; ?>/planques/edit/<?php echo $planque->idPlanque; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/planques/delete/<?php echo $planque->idPlanque; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>