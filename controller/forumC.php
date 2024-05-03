<?php

require_once 'c:/wamp64/www/forum/forum/config.php';
include_once "c:/wamp64/www/forum/forum/model/forum.php";

class forumC
{ 
    public function afficheForum() {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT f.*, c.* FROM forum f JOIN commentaire c ON f.id_forum = c.id_forum");
        $query->execute();
        $forums = $query->fetchAll();
        return $forums;
        }
    public function listForum()
    {
        $sql = "SELECT * FROM forum"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteForum($id_forum)
    {
        $sql = "DELETE FROM forum WHERE id_forum = :id_forum"; 
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_forum', $id_forum);
    
        try {
            $result = $req->execute(); // Execute the query and store the result
    
            if ($result) {
                echo "<script type='text/javascript'> 
                        alert('Suppression réussie!'); 
                        window.location.href = 'http://localhost/forum/forum/view/listForum.php';
                      </script>";
                exit(); // Make sure to end the script execution after the redirection
            } else {
                echo "<script type='text/javascript'> 
                        alert('Erreur lors de la suppression'); 
                      </script>";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addForum(forum $forum) {
        $sql = "INSERT INTO forum (id_forum,titre,description,date,categorie,etat) 
                VALUES (:id_forum, :titre, :description, :date, :categorie, :etat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'id_forum' => $forum->getid_forum(),
                'titre' => $forum->gettitre(),
                'description' => $forum->getdescription(),
                'date' => $forum->getdate(),
                'categorie' => $forum->getcategorie(),
                'etat' => $forum->getetat()
            ]);
             if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Ajout avec succès!'); 
                        window.location.href = 'http://localhost/forum/commentaire/view/back/listCommentaire.php';
                      </script>";
                exit(); // Make sure to end the script execution after the redirection
            } else {
                echo "<script type=\"text/javascript\"> 
                        alert('Erreur lors de l\'enregistrement'); 
                      </script>";
            }
            
          
            // Gestion des résultats et des messages d'alerte
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    function showForum($id_forum)
    {
        $sql = "SELECT * FROM forum WHERE id_forum = $id_forum"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $forum = $query->fetch();
            return $forum;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateForum(forum $forum, $id_forum) // Modification du paramètre pour utiliser le modèle Forum
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE forum SET 
                    titre = :titre, 
                    description = :description, 
                    date = :date, 
                    categorie = :categorie,
                    etat = :etat
                WHERE id_forum = :id_forum"
            );
            
            $result = $query->execute([
                'id_forum' => $id_forum,
                'titre' => $forum->gettitre(),
                'description' => $forum->getdescription(),
                'date' => $forum->getdate(),
                'categorie' => $forum->getcategorie(),
                'etat' => $forum->getetat()
            ]);
            if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Mise à jour avec succès!'); 
                        window.location.href = 'http://localhost/forum/forum/view/listForum.php';
                      </script>";
                exit(); // Assurez-vous de mettre fin à l'exécution du script après la redirection
            } else {
                echo "<script type=\"text/javascript\"> 
                        alert('Erreur lors de la mise à jour de l\\'enregistrement'); 
                      </script>";
            }
            // Gestion des résultats et des messages d'alerte
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
