<?php
include "c:/wamp64/www/forum/forum/controller/forumC.php";
include_once "c:/wamp64/www/forum/forum/model/forum.php";

$error = "";

// create forum
$forum = null;
// create an instance of the controller
$forumC = new forumC();

if (
    isset($_POST["id_forum"]) &&
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

        $forumC->updateForum($forum, $_POST['id_forum']);
        header('Location:http://localhost/forum/forum/view/listForum.php');
    } else {
        $error = "Missing information";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    
    <link rel="stylesheet" href="css.css">
    
</head>

<body>

<script src="../view//js/form.js"></script>
      
<button><a href="http://localhost/forum/forum/view/listForum.php">Back to list</a></button>
    <hr>

    <div id="erreur">
        
    </div>

    <?php
    if (isset($_POST['id_forum'])) {
        $forum = $forumC->showForum($_POST['id_forum']);
        
    ?>

<form action="" method="POST">
<table border="2" align="center">
        <tr>
                <td><label for="id_forum">id_forum :</label></td>
                <td>
                    <input type="text" id="id_forum" name="id_forum"  value="<?php echo $forum['id_forum'] ?>"/>
                    <span id="erreurid_forum" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="titre">titre :</label></td>
                <td>

                    <input type="text" id="titre" name="titre"  value="<?php echo $forum['titre'] ?>" />
                    <span id="erreurtitre" style="color: red"></span>
                </td>
            </tr>
           
                 <tr>
            <td><label for="description">description :</label></td>
             <td> <input type="text" id="description" name="description" value="<?php echo $forum['description'] ?>"/> <span id="erreurdescription" style="color: red"></span> </td> </tr>
            
                </td>
            </tr>
            
            <tr>
            <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" value="<?php echo $forum['date'] ?>" />
 
                    <span id="erreurdate" style="color: red"></span>
                </td>
             
            <tr>
                <td><label for="categorie">categorie :</label></td>
                <td>
                    <input type="text" id="categorie" name="categorie" value="<?php echo $forum['categorie'] ?>" />
                    <span id="erreurcategorie" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="etat">état :</label></td>
                <td>
                    <input type="text" id="etat" name="etat" value="<?php echo $forum['etat'] ?>" />
                    <span id="erreuretat" style="color: red"></span>
                </td>
            </tr>
            <td>
                        <input type="submit" onclick=" return validerforum()"value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
        </table>
        </form>
        
        <?php
    }
    ?>
    </body>
    </html>
    
    
