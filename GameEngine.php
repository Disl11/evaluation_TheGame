<?php

class GameEngine
{

    private $domeDuTonnere = [];
    private $tour = 0 ;

    public function addCombattant(Personnage $p): void
    {
        //ajouter un combattant
        if (count($this->domeDuTonnere) < 2 ){
            $this->domeDuTonnere[] = $p;
        }else {
            echo "Maximun de combattant dans le dome du tonnere <br>";
        }
    }

    public function start(): void {
        //lancer le combat 

        echo "Le Battle commence <br>";

        while(!$this->fin()){
            $this->tourDeJeu();
        }
    }
    

    public function tourDeJeu(): void {
        //effectuer des actions a chaque tour

        $attaquant = $this->domeDuTonnere[0];
        $cible = $this->domeDuTonnere[1];

        echo "Tour " . (++$this->tour) . " : <br>";
        $attaquant->attaquer($cible);

        echo "Pv restant de " . $attaquant->nom . " : " . $attaquant->pv . "<br>";
        echo "Pv restant de " . $cible->nom . " : " . $cible->pv . "<br>";
    }


    public function fin(): bool {
        // retourne vrai si le combat et fini

        foreach($this->domeDuTonnere as $warrior){
            if($warrior->pv <= 0){
                return true;
            }
        }
         return false;
    }




    public function getId(){
        // retourne un joueur aléatoirement
    }

    public function getJoueur(){
        // retourner un joueur par son id 
    }
        public function nettoyerMort(){
        // elever un mort de l'arene si il y na un mort 
    }

}
