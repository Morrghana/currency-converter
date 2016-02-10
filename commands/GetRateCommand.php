<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetRateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('getRate')
            ->setDescription('Get currency rate')
            ->addArgument(
                'fromCurrency',
                InputArgument::REQUIRED,
                'From what currency?'
            )
            ->addArgument(
                'toCurrency',
                InputArgument::REQUIRED,
                'To what currency'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = $input->getArguments();
        $arguments['amount'] = 1;
        $result = convertCurrency($arguments);
        $output->writeln($result);
    }

}
