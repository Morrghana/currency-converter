<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Libs\CurrencyRatesUpdater;

class DownloadRatesCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('downloadRates')
        ->setDescription('Download currency rates');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currencyRatesUpdater = new CurrencyRatesUpdater();
        $result = $currencyRatesUpdater->getRates();
        $output->writeln("Done!");
    }
}
