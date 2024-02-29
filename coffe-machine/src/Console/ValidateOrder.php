<?php

namespace Pdpaola\CoffeeMachine\Console;

use Symfony\Component\Console\Output\OutputInterface;
class ValidateOrder
{
    public static function validateSugars(int $sugars, OutputInterface $output)
    {
        if ($sugars < 0 || $sugars > 2) {
            $output->writeln('The number of sugars should be between 0 and 2.');
            return false;
        }
        return true;
    }

    public static function validateMoney(float $money, float $price, string $drinkType, OutputInterface $output)
    {
        if ($money < $price) {
            $output->writeln(sprintf('The ' . $drinkType .' costs ' . $price . '.'));
            return false;
        }
        return true;
    }
}
