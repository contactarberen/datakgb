<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/agents/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Agents
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
        <?php foreach($data['agents'] as $agent) : ?>
            <tr class=<?php echo("ligne" . "$agent->idAgent");?>>
            <td><?php echo $agent->nom; ?></td>
            <td><?php echo $agent->prenom; ?></td>
            <td><?php echo $agent->dateNaissance; ?></td>
            <td><?php echo $agent->codeId; ?></td>
            <td><?php echo $agent->idNationalite; ?></td>
            <td><a href="<?php echo URLROOT; ?>/agents/edit/<?php echo $agent->idAgent; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/agents/delete/<?php echo $agent->idAgent; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>