<?php

namespace Pdpaola\CoffeeMachine\Console;

use Pdpaola\CoffeeMachine\Console\MakeDrink;
use Symfony\Component\Console\Output\OutputInterface;

class MakeTea extends MakeDrink
{
    protected static $price = 0.4;

    public function makeDrink(float $money, OutputInterface $output)
    {
        if ($money < self::$price) {
            $output->writeln('The tea costs 0.4.');
            return;
        } else {
            $output->write('You have ordered a tea');
        }
    }
}