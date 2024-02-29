<?php

namespace Pdpaola\CoffeeMachine\Console;


use Symfony\Component\Console\Output\OutputInterface;

abstract class MakeDrink
{
    abstract public function makeDrink(float $money, OutputInterface $output);

    public function addSugar(int $sugars, OutputInterface $output) {
        if ($sugars > 0) {
                $output->write(' with ' . $sugars . ' sugars (stick included)');
        }
    }

    public function makeExtraHot(bool $extraHot, OutputInterface $output) {
        if ($extraHot) {
            $output->write(' extra hot');
        }
    }

}