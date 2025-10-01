<?php

class GameEngine
{

    private $domeDuTonnere = [];

    public function addCombattant(Personnage ...$personnage): void
    {
        foreach ($personnage as $p) {
            $this->domeDuTonnere[] = $p;
        }
    }

    public function start(): void
    {
        $this->tourDeJeu();
    }


    public function tourDeJeu(): void
    {

        echo "Debut du  Battle  !!! ⚔️ <br> ";

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

        echo  "Le Batlle est fini ! <br>";

        $winner = reset($this->domeDuTonnere);

        echo " Le vainqeur du battle est : " . $winner->getNom() . "🏆";
    }


    public function getId()
    {

        return array_rand($this->domeDuTonnere);
    }

    public function getJoueur(int $id)
    {
        return $this->domeDuTonnere[$id];
    }



    public function nettoyerMort(): void
    {
        foreach ($this->domeDuTonnere as $key => $warrior) {
            if ($warrior->getPv() <= 0) {
                echo $warrior->getNom() . " est eliminé de l'aréne ! 💀 <br><br>";
                unset($this->domeDuTonnere[$key]);
            }
        }
    }

    public function fin(): bool
    {
        $this->nettoyerMort();
        return count($this->domeDuTonnere) <= 1;
    }
}
