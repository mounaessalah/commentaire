<?php
include_once "c:/wamp64/www/forum/commentaire/controller/commentaireC.php";

$commentaireC = new commentaireC();
$list = $commentaireC->listCommentaire();
?>
<html>
<head></head>
<body>
<center>
    <h1>List of commentaire</h1>
    <h2>
        <a href="addCommentaire.php">Add commentaire</a>
    </h2>
</center>
<table border="2" align="center" width="70%">
    <tr>
        <th>ID_commentaire</th>
        <th>Auteur</th>
        <th>Contenu</th>
        <th>Date_création</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($list as $commentaire) {
         ?>
    <tr>
        <td><?= $commentaire['id_commentaire']; ?></td>
        <td><?= $commentaire['auteur']; ?></td>
        <td><?= $commentaire['contenu']; ?></td>
        <td><?= $commentaire['date_creation']; ?></td>
        
        <td align="center">
            <form method="POST" action="updateCommentaire.php">
                <input type="submit" name="update" value="Update">
                <input type="hidden" value="<?php echo $commentaire['id_commentaire']; ?>" name="id_commentaire">
            </form>
        </td>
        <td>
            <a href="deleteCommentaire.php?id_commentaire=<?php echo $commentaire['id_commentaire']; ?>"onclick="return confirm ('are you sure you want to delete this record ')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
