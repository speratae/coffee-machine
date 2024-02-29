<?php

namespace Pdpaola\CoffeeMachine\Console;

use Pdpaola\CoffeeMachine\Console\MakeDrink;
use Symfony\Component\Console\Output\OutputInterface;

class MakeCoffee extends MakeDrink
{
    protected static $price = 0.5;

    public function makeDrink(float $money, OutputInterface $output)
    {
        if ($money < self::$price) {
            $output->writeln('The coffee costs 0.5.');
            return;
        } else {
            $output->write('You have ordered a coffee');
        }
    }
}