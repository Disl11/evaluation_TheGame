<?php

class Personnage
{

    public string $nom;
    public string $espece;
    public int $force;
    public int $pv;
    public int $endurance;


    public function __construct(string $nom = "No Name", string $espece = "inconnu", int $force = 50, int $pv = 100, int $endurance = 50)
    {
        $this->nom = $nom;
        $this->espece = $espece;
        $this->force = $force;
        $this->pv = $pv;
        $this->endurance = $endurance;
    }

    public function attaquer($cible)
    {
        echo $this->nom . 
        " qui est un " . $this->espece .  
        " Attaque " . $cible->nom . 
        " qui est un " . $cible->espece. "<br>";

        $cible->pv = $cible->pv - $this->force;
    }
}
