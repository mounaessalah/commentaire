<?php
class forum
{
    private $id_forum;
    private $titre;
    private $description;
    private $date;
    private $categorie;
    private $etat;
    public function __construct($id, $titre, $description, $date, $categorie, $etat)
    {
        $this->id_forum = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date = $date;
        $this->categorie = $categorie;
        $this->etat = $etat;
    }

    public function getid_forum()
    {
        return $this->id_forum;
    }

    public function gettitre()
    {
        return $this->titre;
    }

    public function settitre($titre)
    {
        $this->titre = $titre;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function getdate()
    {
        return $this->date;
    }

    public function setdate($date)
    {
        $this->date = $date;
    }

    public function getcategorie()
    {
        return $this->categorie;
    }

    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;
    }
    public function getetat()
    {
        return $this->etat;
}
public function setetat($etat)
    {
        $this->etat = $etat;
    }
}
?>
