<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/payss/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Pays
            </a>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id du pays</th>
            <th scope="col">Nom du pays</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['payss'] as $pays) : ?>
            <tr class=<?php echo("ligne" . "$pays->idPays");?>>
            <td><?php echo $pays->idPays; ?></td>
            <td><?php echo $pays->nom; ?></td>
            <td><a href="<?php echo URLROOT; ?>/payss/edit/<?php echo $pays->idPays; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/payss/delete/<?php echo $pays->idPays; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>