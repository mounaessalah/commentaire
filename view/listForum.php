<?php
include_once "c:/wamp64/www/forum/forum/controller/forumC.php";

$forumC = new forumC();
$list = $forumC->listForum();
?>
<html>
<head></head>
<body>
<center>
    <h1>List of Forum</h1>
    <h2>
        <a href="addForum.php">Add Forum</a>
    </h2>
</center>
<table border="2" align="center" width="70%">
    <tr>
        <th>id_forum</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>categorie</th>
        <th>état</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($list as $forum) {
         ?>
    <tr>
        <td><?= $forum['id_forum']; ?></td>
        <td><?= $forum['titre']; ?></td>
        <td><?= $forum['description']; ?></td>
        <td><?= $forum['date']; ?></td>
        <td><?= $forum['categorie']; ?></td>
        <td><?= $forum['etat']; ?></td>
        <td align="center">
            <form method="POST" action="updateForum.php">
                <input type="submit" name="update" value="Update">
                <input type="hidden" value="<?php echo $forum['id_forum']; ?>" name="id_forum">
            </form>
        </td>
        <td>
            <a href="deleteForum.php?id_forum=<?php echo $forum['id_forum']; ?>"onclick="return confirm ('are you sure you want to delete this record ')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
