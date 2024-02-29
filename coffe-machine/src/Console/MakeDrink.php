<?php

namespace Pdpaola\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class MakeDrink
{
    abstract public function makeDrink(float $money, OutputInterface $output): void;

    public function addSugar(int $sugars, OutputInterface $output) {
        if ($sugars >= 0 && $sugars <= 2) {
            $output->write(' with ' . $sugars . ' sugars (stick included)');
        } else {
            $output->writeln('The number of sugars should be between 0 and 2.');
        }
    }

    public function makeExtraHot(bool $extraHot, OutputInterface $output) {
        if ($extraHot) {
            $output->write(' extra hot');
        }
    }

}