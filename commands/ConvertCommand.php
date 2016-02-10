<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('convert')
            ->setDescription('Get currency rate')
            ->addArgument(
                'amount',
                InputArgument::REQUIRED,
                'How much?'
            )
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
        $result = convertCurrency($arguments);
        if($result === false) {
            $output->writeln('<error>Unknown currency</error>');
        } else {
            $output->writeln('<info>' . $result . '</info>');
        }
    }

}
