<?php

class Humain extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, force: 50, pv: 100, endurance: 60);
    }
}
