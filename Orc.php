<?php

class Orc extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, espece:"Orc", force: 20, pv: 100, endurance: 40);
    }
}
