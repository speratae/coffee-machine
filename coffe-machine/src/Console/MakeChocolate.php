<?php

namespace Pdpaola\CoffeeMachine\Console;

use Pdpaola\CoffeeMachine\Console\MakeDrink;
use Symfony\Component\Console\Output\OutputInterface;

class MakeChocolate extends MakeDrink
{
    protected static $price = 0.6;

    public function makeDrink(float $money, OutputInterface $output)
    {
        if ($money < self::$price) {
            $output->writeln('The chocolate costs 0.6.');
            return;
        } else {
            $output->write('You have ordered a chocolate');
        }
    }
}