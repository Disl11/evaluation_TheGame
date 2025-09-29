<?php
class Elfe extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, espece:"Elfe", force: 10, pv: 100, endurance: 90);
    }
}
