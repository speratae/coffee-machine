<?php

namespace Pdpaola\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    protected function configure()
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $drinkType = strtolower($input->getArgument('drink-type'));
        switch ($drinkType) {
            case 'tea':
                $drinkStrategy = new MakeTea();
                break;
            case 'coffee':
                $drinkStrategy = new MakeCoffee();
                break;
            case 'chocolate':
                $drinkStrategy = new MakeChocolate();
                break;
            default:
                $output->writeln('The drink type should be tea, coffee, or chocolate.');
                return;
        }

        $sugars = $input->getArgument('sugars');
        if (!ValidateOrder::validateSugars($sugars, $output)) {
            return;
        }

        $money = $input->getArgument('money');
        if (!ValidateOrder::validateMoney($money, $drinkStrategy->getPrice(), $drinkType, $output)) {
            return;
        }

        $drinkStrategy->makeDrink($money, $output);

        $extraHot = $input->getOption('extra-hot');
        $drinkStrategy->makeExtraHot($extraHot, $output);
        
        $drinkStrategy->addSugar($sugars, $output);

        $output->writeln('');

        /*    $pdo = MysqlPdoClient::getPdo();

            $stmt= $pdo->prepare( 'INSERT INTO orders (drink_type, sugars, stick, extra_hot) VALUES (:drink_type, :sugars, :stick, :extra_hot)');
            $stmt->execute([
                'drink_type' => $drinkType,
                'sugars' => $sugars,
                'stick' => $stick ?: 0,
                'extra_hot' => $extraHot ?: 0,
            ]);
        }*/
    }
}
