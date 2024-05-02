<?php
class commentaire
{
    private $id_commentaire;
    private $auteur;
    private $contenu;
    private $date_creation;
   
    public function __construct($id_commentaire, $auteur, $contenu, $date_creation)
    {
        $this->id_commentaire = $id_commentaire;
        $this->auteur = $auteur;
        $this->contenu = $contenu;
        $this->date_creation = $date_creation;
        
    }

    public function getid_commentaire()
    {
        return $this->id_commentaire;
    }

    public function getauteur()
    {
        return $this->auteur;
    }

    public function setauteur($auteur)
    {
        $this->auteur = $auteur;
    }

    public function getcontenu()
    {
        return $this->contenu;
    }

    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function getdate_creation()
    {
        return $this->date_creation;
    }

    public function setdate_creation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

   
  

}
?>
