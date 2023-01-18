<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class Withdrawal extends Command
{

    protected function configure(): void
    {
        $this->setName('withdrawal')
            ->setDescription('WithdrawalCommand')
            ->addArgument('account_number', InputArgument::REQUIRED, 'get account number')
            ->addArgument('withdrawal_amount', InputArgument::REQUIRED, 'get withdrawal amount');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // import php file with array

        require 'Database.php';

        // Account Number & Withdrawal Amount
        
        $get_account_number = ($input->getArgument(('account_number')));
        $withdrawal_amount = ($input->getArgument('withdrawal_amount'));
        
        // Get Account Type

        $account_type = $users[$get_account_number]['accounts'][0]['account_type'];

        // Make withdrawal
        
        if ($account_type == 'saving') {
            
            //Savings Account
            $saving_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];

            // Display Amount
            $output->write($saving_account_balance - $withdrawal_amount, "\n");

        }
        else {
            
            // Normal Account
            $normal_account_balance = $users[$get_account_number]['accounts'][0]['account_balance'];

            // Display Amount
            $output->write($normal_account_balance - $withdrawal_amount, "\n");
        }

        return Command::SUCCESS;
        // Update if matching record found in array
    }
}
