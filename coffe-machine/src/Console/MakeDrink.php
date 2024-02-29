<?php

namespace Pdpaola\CoffeeMachine\Console;

use Symfony\Component\Console\Output\OutputInterface;

abstract class MakeDrink
{
    protected $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    abstract public function makeDrink(float $money, OutputInterface $output);

    abstract public function hasEnoughMoney(float $money);

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

    public function getPrice()
    {
        return $this->price;
    }
}