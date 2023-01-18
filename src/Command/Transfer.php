<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class Transfer extends Command
{
    protected function configure(): void
    {
        $this->setName('transfer')
            ->setDescription('TransferCommand')
            ->addArgument('transfer_amount', InputArgument::REQUIRED, 'get transfer amount');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Import php file with array
        require 'Database.php';

        // Account Number  & Transfer Amount

        $get_account_number = ($input->getArgument(('account_number')));
        $transfer_amount = ($input->getArgument('transfer_amount'));

        // Make Transfer

        if ($account_type == 'saving') {

            //Savings Account
            $saving_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];
            
            // Display Amount
            $output->write($saving_account_balance + $transfer_amount, "\n");
        } else {

            // Normal Account
            $normal_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];

            //Display Amount
            $output->write($normal_account_balance + $transfer_amount, "\n");
        }

        return Command::SUCCESS;
    }
}
