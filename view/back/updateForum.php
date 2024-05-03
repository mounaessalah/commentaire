<?php
include_once "c:/wamp64/www/forum/forum/controller/forumC.php";
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
</head>

<body>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            animation: colorChange 5s infinite alternate;
            /* Pulsating background color */
        }

        @keyframes colorChange {
            0% {
                background-color: #f5f5f5;
            }

            100% {
                background-color: #ffcccb;
            }
        }

        a {
            text-decoration: none;
            color: #007BFF;
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
            width: 80%;
            /* Increased width */
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 15px;
            /* Increased padding */
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            /* Adjusted padding */
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #e91e63;
            color: #fff;
            padding: 10px 15px;
            /* Adjusted padding */
            border: none;
            cursor: pointer;
            border-radius: 4px;
            animation: floatButton 2s infinite;
        }

        @keyframes floatButton {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #c2185b;
        }

        input[type="reset"] {
            background-color: #007BFF;
        }
    </style>
<button><a href="listForum.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
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
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
        </table>
        </form>
        <script src="forum.js"></script>
        <?php
    }
    ?>
    </body>
    </html>
    
    
