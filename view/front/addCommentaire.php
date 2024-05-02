<?php
require_once "c:/wamp64/www/forum/commentaire/controller/commentaireC.php";
require_once "c:/wamp64/www/forum/commentaire/model/commentaire.php";

$error = "";
// create commentaire
$commentaire = null;

// create an instance of the controller
$commentaireC = new commentaireC();

if (
    isset($_POST["id_commentaire"]) &&
    isset($_POST["auteur"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["date_creation"])&&
    isset($_POST["id_forum"]) 
) {
    if (
        !empty($_POST["id_commentaire"]) &&
        !empty($_POST["auteur"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["date_creation"])&&
        !empty($_POST["id_forum"])
    ) {
        $commentaire = new commentaire(
            $_POST['id_commentaire'],
            $_POST['auteur'],
            $_POST['contenu'],
            $_POST['date_creation'],
            $_POST['id_forum']
        );

        // Assuming $commentaireC is an instance of your CommentaireController
        // Add the comment to the database
        $commentaireC->addCommentaire($commentaire);
        header('Location:http://localhost/forum/commentaire/view/listCommentaire.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commentaire </title>
    <link rel="stylesheet" href="../css.css">
</head>

<body> 
   
   <script src="../js/commentaire.js"></script>

    <a href="listCommentaire.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
        <tr>
                <td><label for="id_commentaire">ID_commentaire :</label></td>
                <td>
                    <input type="text" id="id_commentaire" name="id_commentaire" />
                    <div id="erreurid_commentaire" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="auteur">Auteur :</label></td>
                <td>
                    <input type="text" id="auteur" name="auteur" />
                    <div id="erreurauteur" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="contenu">Contenu :</label></td>
                <td>
                <input type="text" id="contenu" name="contenu" />
                    <div id="erreurcontenu" style="color: red"></div>
                </td>
            </tr>
            <tr>
                <td><label for="date_creation">Date_création :</label></td>
                <td>
                    <input type="date" id="date_creation" name="date_creation" />
                    <div id="erreurdate_creation" style="color: red"></div>
                </td>
            </tr>
            <td>
            <input type="submit" onclick=" return validercommentaire()" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
    </form>
 
</body>
</html>
