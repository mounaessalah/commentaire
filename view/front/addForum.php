<?php
include_once "c:/wamp64/www/forum/forum/controller/forumC.php";
include_once "c:/wamp64/www/forum/forum/model/forum.php";

$error = "";
// create Forum
$forum = null;

// create an instance of the controller
$forumC = new forumC();

if (
    isset($_POST["titre"]) &&
    isset($_POST["description"]) &&
    isset($_POST["date"]) &&
    isset($_POST["categorie"]) &&
    isset($_POST["etat"])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["categorie"]) &&
        !empty($_POST["etat"])
    ) {
        $forum = new forum(
           $_POST["id_forum"],
            $_POST["titre"],
            $_POST["description"],
            $_POST["date"],
            $_POST["categorie"] ,
            $_POST["etat"]
        );

        $forumC->addForum($forum);
        header('Location:http://localhost/forum/forum/view/listForum.php');
    } 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Clean Up Nation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Forum </title>

</head>

<body> 
    


    <a href="listForum.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="id_forum">id_forum :</label></td>
                <td>
                    <input type="text" id="id_forum" name="id_forum" />
                    <span id="erreurid_forum" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                <input type="text" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
    <td><label for="categorie">categorie :</label></td>
    <td>
        <select id="categorie" name="categorie">
            <option value="finance">finance</option>
            <option value="psychologie">psychologie</option>
            <option value="informatique">informatique</option>
            <option value="marketing">marketing</option>
        </select>
        <div id="erreurcategorie" style="color: red"></div>
    </td>
</tr>

            <tr>
                <td><label for="etat">état :</label></td>
                <td>
                <input type="text" id="etat" name="etat" />
                    <span id="erreuretat" style="color: red"></span>
                </td>
            </tr>
            <td>
            <input type="submit" onclick=" return validerforum()" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
            <td>
                <input type="button" value="commentaire">
            </td>
        </table>

    </form>
    <script src="forum.js"></script>
</body>
</html>