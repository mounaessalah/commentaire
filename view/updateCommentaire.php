<?php

include 'c:/wamp64/www/forum/commentaire/controller/commentaireC.php';
include_once 'c:/wamp64/www/forum/commentaire/model/commentaire.php';

$error = "";
// create commentaire
$commentaire = null;

// create an instance of the controller
$commentaireC = new commentaireC();

if (
    isset($_POST["auteur"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["date_creation"])
) {
    if (
        !empty($_POST["auteur"]) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["date_creation"])
        
    ) {
        
        $commentaire = new commentaire(
            $_POST['id_commentaire'],
            $_POST['auteur'],
            $_POST['contenu'],
            $_POST['date_creation']
        );

        
        
        $commentaireC->updateCommentaire($commentaire, $_POST['id_commentaire']);

        header('Location:http://localhost/forum/commentaire/view/listCommentaire.php');
    } else
        $error = "Missing information";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            margin: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        #error {
            color: red;
            margin: 10px;
        }

        form {
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        input[type="reset"] {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="reset"]:hover {
            background-color: #c82333;
        }
    </style>
</head>


    <button><a href="listCommentaire.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_commentaire'])) {
        $commentaire = $commentaireC->showCommentaire($_POST['id_commentaire']);
        
    ?>

<form action="" method="POST">
<table border="2" align="center">
        <tr>
                <td><label for="id_commentaire">ID_commentaire :</label></td>
                <td>
                    <input type="text" id="id_commentaire" name="id_commentaire"  value="<?php echo $commentaire['id_commentaire'] ?>"/>
                    <span id="erreurid_commentaire" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="auteur">Auteur :</label></td>
                <td>

                    <input type="text" id="auteur" name="auteur"  value="<?php echo $commentaire['auteur'] ?>" />
                    <span id="erreurauteur" style="color: red"></span>
                </td>
            </tr>
           
                 <tr>
            <td><label for="contenu">Contenu :</label></td>
             <td> <input type="text" id="contenu" name="contenu" value="<?php echo $commentaire['contenu'] ?>"/> <span id="erreurcontenu" style="color: red"></span> </td> </tr>
            
                </td>
            </tr>
            
            <tr>
            <td><label for="date_creation">Date_création :</label></td>
                <td>
                    <input type="Date" id="date_creation" name="date_creation" value="<?php echo $commentaire['date_creation'] ?>" />
 
                    <span id="erreurdate_creation" style="color: red"></span>
                </td>
             <td>

                        <input type="submit" value="Update" onclick="return validercommentaire()">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
        </table>
    </form>
     <script src="commentaire.js"></script>


    <?php
    }
    ?>
</body>

</html>