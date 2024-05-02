<?php

require_once 'c:/wamp64/www/forum/commentaire/config.php';

class commentaireC
{
    
   

    
    public function afficheCommentaire() {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT c.*, f.* FROM commentaire c JOIN forum f ON c.id_forum = f.id_forum");
        $query->execute();
        $commentaires = $query->fetchAll();
        return $commentaires;
      }
    
    

    public function listCommentaire()
    {
        $sql = "SELECT * FROM commentaire"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommentaire($id_commentaire)
    {
        $sql = "DELETE FROM commentaire WHERE id_commentaire = :id_commentaire"; 
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_commentaire', $id_commentaire);
    
        try {
            $result = $req->execute(); // Execute the query and store the result
    
            if ($result) {
                echo "<script type='text/javascript'> 
                        alert('Suppression réussie!'); 
                        window.location.href = 'http://localhost/forum/commentaire/view/listCommentaire.php';
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

    function addCommentaire(commentaire  $commentaire) {
        $sql = "INSERT INTO commentaire (id_commentaire,auteur,contenu,date_creation,id_forum) 
                VALUES (:id_commentaire ,:auteur ,:contenu ,:date_creation ,:id_forum)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $result = $query->execute([
                'id_commentaire' => $commentaire->getid_commentaire(),
                'auteur' => $commentaire->getauteur(),
                'contenu' => $commentaire->getcontenu(),
                'date_creation' => $commentaire->getdate_creation()
                
            ]);
             if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Ajout avec succès!'); 
                        window.location.href = 'http://localhost/forum/commentaire/view/listCommentaire.php';
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

    function showCommentaire($id_commentaire)
    {
        $sql = "SELECT * FROM commentaire WHERE id_commentaire = $id_commentaire"; // Modification de la requête SQL
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateCommentaire($commentaire, $id_commentaire) // Modification du paramètre pour utiliser le modèle commentaire
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    auteur = :auteur, 
                    contenu = :contenu, 
                    date_creation = :date_creation 
                   
                WHERE id_commentaire = :id_commentaire'
            );
            
            $result = $query->execute([
                'id_commentaire' => $id_commentaire,
                'auteur' => $commentaire->getauteur(),
                'contenu' => $commentaire->getcontenu(),
                'date_creation' => $commentaire->getdate_creation()
                
            ]);
            if ($result) {
                echo "<script type=\"text/javascript\"> 
                        alert('Mise à jour avec succès!'); 
                        window.location.href = 'http://localhost/forum/commentaire/view/listCommentaire.php';
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
