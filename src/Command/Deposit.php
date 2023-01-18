<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class Deposit extends Command
{

    protected function configure(): void
    {
        $this->setName('deposit')
            ->setDescription('DepositCommand')
            ->addArgument('account_number', InputArgument::REQUIRED, 'get account number')
            ->addArgument('deposit_amount', InputArgument::REQUIRED, 'get deposit amount');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // import php file with array

        require 'Database.php';

        // Account Number & Withdrawal Amount

        $get_account_number = ($input->getArgument(('account_number')));
        $deposit_amount = ($input->getArgument('deposit_amount'));

        // Get Account Type

        $account_type = $users[$get_account_number]['accounts'][0]['account_type'];

        // Make withdrawal

        if ($account_type == 'saving') {

            //Savings Account
            $saving_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];

            // Display Amount
            $output->write($saving_account_balance + $deposit_amount, "\n");
        } else {

            // Normal Account
            $normal_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];

            //Display Amount
            $output->write($normal_account_balance + $deposit_amount, "\n");
        }

        return Command::SUCCESS;
    }
}
