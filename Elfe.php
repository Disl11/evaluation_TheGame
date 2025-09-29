<?php
class Elfe extends Personnage
{

    public function __construct(string $nom)
    {
        parent::__construct($nom, force: 40, pv: 100, endurance: 90);
    }
}
