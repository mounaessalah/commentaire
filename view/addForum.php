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
        if (isset($_POST["id_forum"])) {
            $id_forum = $_POST["id_forum"];
        } else {
            $id_forum = null; // or some default value
        }

        $forum = new forum(
            $id_forum,
            $_POST["titre"],
            $_POST["description"],
            $_POST["date"],
            $_POST["categorie"],
            $_POST["etat"]
        );

        $forumC->addForum($forum);
        header('Location:http://localhost/forum/forum/view/listForum.php');
    }
}
?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum </title>
    <link rel="stylesheet" href="css.css">
    
</head>

<body> 
  
<script src="../view/js/form.js"></script>

    <a href="listForum.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form id="forum" method="POST">
        <table>
        <tr>
                <td><label for="id_forum">id_forum :</label></td>
                <td>
                    <input type="text" id="id_forum" name="id_forum" />
                    <div id="erreurid_forum" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>
                    <input type="text" id="titre" name="titre" />
                    <div id="erreurtitre" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                <input type="text" id="description" name="description" />
                    <div id="erreurdescription" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <div id="erreurdate" style="color: red"></div>
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
                    <div id="erreuretat" style="color: red"></div>
                </td>
            </tr>
            <td>
            <input type="submit" onclick=" return validerforum()" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
            <td>
            <input type="button"  value="commentaire">
            </td>
        </table>
    </form>
  
</body>
</html>