<?php

class Personnage
{

    private string $nom;
    private string $espece;
    private  int $force;
    private  int $pv;
    private  int $endurance;


    public function __construct(string $nom = "No Name", string $espece = "inconnu", int $force = 10, int $pv = 100, int $endurance = 10)
    {
        $this->nom = $nom;
        $this->espece = $espece;
        $this->force = $force;
        $this->pv = $pv;
        $this->endurance = $endurance;
    }

    //getter 
    public function getNom()
    {
        return $this->nom;
    }
    public function getEspece()
    {
        return $this->espece;
    }
    public function getForce()
    {
        return $this->force;
    }
    public function getPv()
    {
        return $this->pv;
    }
    public function getEndurance()
    {
        return $this->endurance;
    }


    //seter 
    public function setPv(int $pv): void
    {
        $this->pv = max(0, $pv); // pv reste a 0 meme si l'attaque est plus puissante 
    }

    public function attaquer($cible)
    {

        $cible->setPv($cible->getPv() - $this->force);
        echo $this->nom . " attaque " . $cible->getNom() . " et inflige " . $this->force . " dégat ! <br>";
        echo $cible->getNom() .  " a maintenant " . $cible->getPv() . " points de vie. <br><br>";
    }
}
