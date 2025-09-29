<?php

class Humain extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, espece: "Humain", force: 15, pv: 100, endurance: 60);
    }
}
