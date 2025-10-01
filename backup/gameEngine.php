<?php

class GameEngine
{

    private $domeDuTonnere = [];

    public function addCombattant(Personnage ...$personnage): void
    {

        // une boucle forach sur les personage reçu dans le tableau dome du tonnere
        foreach ($personnage as $p) {
            $this->domeDuTonnere[] = $p;
        }

        //ajouter un combattant max 2 combattant ( premier parti )
        // if (count($this->domeDuTonnere) < 2) {
        //     $this->domeDuTonnere[] = $p;
        // } else {
        //     echo "Maximun de combattant dans le dome du tonnere <br>";
        // }

    }

    public function start(): void
    {
        //lancer le combat 
        $this->tourDeJeu();
    }


    public function tourDeJeu(): void
    {

        // avoir 2 warrior 
        // rucupere getJoueur() pour idattaquant et idcible
        //effectuer des actions a chaque tour

        echo  "Le Batlle est fini !";

        while (!$this->fin()) {

            $idAttaquant = $this->getId();
            $attaquant = $this->getJoueur($idAttaquant);

            do {
                $idCible = $this->getId();
            } while ($idCible === $idAttaquant);

            $cible = $this->getJoueur($idCible);

            $attaquant->attaquer($cible);

            $this->nettoyerMort();
        }

        if ($this->domeDuTonnere === 1) {
            echo "il y pas de vainqeur";
        } else {
            $winner = reset($this->domeDuTonnere);
            echo " Le vainqeur du battle est : " . $winner->getNom();
        }




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
