<?php

namespace Pdpaola\CoffeeMachine\Console;

use Pdpaola\CoffeeMachine\Console\MakeDrink;
use Symfony\Component\Console\Output\OutputInterface;

class MakeChocolate extends MakeDrink
{
    public function __construct()
    {
        parent::__construct(0.6); 
    }

    public function makeDrink(float $money, OutputInterface $output)
    {
        $output->write('You have ordered a chocolate');
    }
    
}