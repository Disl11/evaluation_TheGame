<?php

class Orc extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, force: 70, pv: 100, endurance: 40);
    }
}
