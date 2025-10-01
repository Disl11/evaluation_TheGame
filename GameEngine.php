<?php

class GameEngine
{

    private $domeDuTonnere = [];
    private $tour = 0;

    public function addCombattant(Personnage ...$personnage): void
    {

        // une boucle forach sur les personage reçu
        foreach ($personnage as $p) {
            $this->domeDuTonnere[] = $p;
        }


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

        if ($this->domeDuTonnere === 1) {
            echo "il y pas de vainqeur";
        } else {
            $winner = reset($this->domeDuTonnere);
            echo " Le vainqeur du battle est : " . $winner->getNom();
        }
    }


    public function tourDeJeu(): void
    {

        // avoir 2 warrior 
        // rucupere getJoueur()


        //effectuer des actions a chaque tour
        $this->tour++;

        echo "Tour " . $this->tour . " : <br>";


        $attaquantDuTour = [];


        foreach ($this->domeDuTonnere as $attaquant) {

            // verifier le joueur dans le tableau qui a jouer sur ce tour
            if (in_array($attaquant, $attaquantDuTour, true))
                continue;


            // choisir une cible pour l'attaquant pour pas ce taper sur lui meme
            $ciblePossible = array_filter($this->domeDuTonnere, function ($p) use ($attaquant) {
                return $p !== $attaquant;
            });

            // si plus cible fin
            if (empty($ciblePossible)) break;


            // choisir  une cible au hasard
            $cible = $ciblePossible[array_rand($ciblePossible)];

            $attaquant->attaquer($cible);

            // pour pas que un joueur re attaque a nouveau
            $attaquantDuTour[] = $attaquant;
        }

        $this->nettoyerMort();



        // ================ function tourDeJeu uniquement pour 1 vs 1 =============================
        // $attaquant = $this->domeDuTonnere[0];
        // $cible = $this->domeDuTonnere[1];
        // $attaquant->attaquer($cible);

        // echo $attaquant->getNom() . " attaque " . $cible->getNom() . "<br>"
        //     . " Point de vie restant de " . $cible->getNom() . " : " . $cible->getPv() . " <br><br>";

        // if ($this->fin()) return;

        // $attaquant = $this->domeDuTonnere[1];
        // $cible = $this->domeDuTonnere[0];
        // $attaquant->attaquer($cible);

        // echo $attaquant->getNom() . " attaque " . $cible->getNom() . "<br>"
        //     . " Point de vie restant de " . $cible->getNom() . " : " . $cible->getPv() . " <br><br>";
    }


    public function getId()
    {
        // retourne un id aléatoirement
        return array_rand($this->domeDuTonnere);
    }

    public function getJoueur(int $id)
    {
        // retourne le joueur de son l'id
        return $this->domeDuTonnere[$id];
    }



    public function nettoyerMort(): void
    {
        // elever un mort de l'arene  
        foreach ($this->domeDuTonnere as $key => $warrior) {
            if ($warrior->getPv() <= 0) {
                echo $warrior->getNom() . " est eliminé de l'aréne ! <br><br>";
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
}
