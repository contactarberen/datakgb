<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/missions" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
  
    <?php if(isset($_SESSION['admin_id'])) : ?>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/contacts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Ajouter Contacts
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
        <?php foreach($data['contacts'] as $contact) : ?>
            <tr class=<?php echo("ligne" . "$contact->idContact");?>>
            <td><?php echo $contact->nom; ?></td>
            <td><?php echo $contact->prenom; ?></td>
            <td><?php echo $contact->dateNaissance; ?></td>
            <td><?php echo $contact->nomCode; ?></td>
            <td><?php echo $contact->idNationalite; ?></td>
            <td><a href="<?php echo URLROOT; ?>/contacts/edit/<?php echo $contact->idContact; ?>" class="btn btn-dark">Editer</a></td>
            <td>
                <form class="pull-right" action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $contact->idContact; ?>" method="post">
                <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>