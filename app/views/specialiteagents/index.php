<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/specialiteagents/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Spécialité à un agent
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id de l'agent</th>
            <th scope="col">Id de la spécialité</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['specialiteagents'] as $specialiteagent) : ?>
            <tr class=<?php echo("ligne" . "$specialiteagent->idAgent");?>>
            <td><?php echo $specialiteagent->idAgent; ?></td>
            <td><?php echo $specialiteagent->idSpecialite; ?></td>
            <td><a href="<?php echo URLROOT; ?>/specialiteagents/edit/<?php echo $specialiteagent->idAgent; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/specialiteagents/delete/<?php echo $specialiteagent->idAgent; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>