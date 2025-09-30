<?php

class GameEngine
{

    private $domeDuTonnere = [];
    private $tour = 0;

    public function addCombattant(Personnage $p): void
    {
        
        
        $this->domeDuTonnere[] = $p;
        
        
        
        //ajouter un combattant max 2 combattant
        // if (count($this->domeDuTonnere) < 2) {
        //     $this->domeDuTonnere[] = $p;
        // } else {
        //     echo "Maximun de combattant dans le dome du tonnere <br>";
        // }
    }

    public function start(): void
    {
        //lancer le combat 
        echo "Le Battle commence <br>";

        while (!$this->fin()) {
            $this->tourDeJeu();
        }
        echo  "Le Batlle est fini !";
    }


    public function tourDeJeu(): void
    {
        //effectuer des actions a chaque tour
        $this->tour++;

        echo "Tour " . $this->tour . " : <br>";


        // $attaquantDuTour = [];

        
        // foreach ($this->domeDuTonnere as $attaquant){

        //     if(in_array($attaquant,$attaquantDuTour,true))
        //     continue;

        //     $ciblePossible = array_filter($this->domeDuTonnere, function($p) use ($attaquant){
        //         return $p !== $attaquant;
        //     });

        //     if(empty($ciblePossible)) break;
            
        //     $cible = $ciblePossible[array_rand($ciblePossible)];

        //     $attaquant->attaquer($cible);
        //     echo $attaquant->getNom() . " attaque ". 
        //     $cible->getNom() . " <br> Point de vie restant : " . $cible->getPv(). "<br>";

        //     $attaquantDuTour[] = $attaquant;
        // }

        //  $this->nettoyerMort();

        // echo "<br>";

        // ================ function tourDeJeu uniquement pour 1 vs 1 =============================
        $attaquant = $this->domeDuTonnere[0];
        $cible = $this->domeDuTonnere[1];
        $attaquant->attaquer($cible);

        echo $attaquant->getNom() . " attaque " . $cible->getNom() . "<br>"
            . " Point de vie restant de " . $cible->getNom() . " : " . $cible->getPv() . " <br><br>";

        if ($this->fin()) return;

        $attaquant = $this->domeDuTonnere[1];
        $cible = $this->domeDuTonnere[0];
        $attaquant->attaquer($cible);

        echo $attaquant->getNom() . " attaque " . $cible->getNom() . "<br>"
            . " Point de vie restant de " . $cible->getNom() . " : " . $cible->getPv() . " <br><br>";
    }


    public function nettoyerMort(): void
    {
        // elever un mort de l'arene  
        foreach ($this->domeDuTonnere as $key => $warrior) {
            if ($warrior->getPv() <= 0) {
                echo $warrior->getNom() . " est eliminé de l'aréne ! <br>";
                unset($this->domeDuTonnere[$key]);
            }
        }
    }

    public function fin(): bool
    {
        // retourne vrai si le combat et fini
        $this->nettoyerMort();
        return count($this->domeDuTonnere) <= 1;
    }




    public function getId()
    {
        // retourne un joueur aléatoirement
    }

    public function getJoueur()
    {
        // retourner un joueur par son id 
    }
}
