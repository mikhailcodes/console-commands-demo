<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class Sort extends Command
{
    protected function configure(): void
    {
        $this->setName('custom-sort')
            ->setDescription('SortCommand')
            ->addArgument('key', InputArgument::OPTIONAL, 'Get key value');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        require 'Database.php';

        $key1 = ($input->getArgument('key'));
        
        $price = array();
        foreach ($users as $key => $row) {
            $price[$key] = $row[$key1];
        }
        $sort = array_multisort(array_column($users, 'user_id'), SORT_DESC, $users);

        $output->writeln($sort);

        return Command::SUCCESS;
    }
}
