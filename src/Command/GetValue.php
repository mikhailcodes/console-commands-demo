<?php

namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class GetValue extends Command
{
    
    
    protected function configure(): void
    {
        $this -> setName('custom-get-value')
        -> setDescription('GetValueCommand')
        -> addArgument('user_id', InputArgument::REQUIRED, 'Get user id')
        -> addArgument('key', InputArgument::REQUIRED, 'Get key value');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // import php file with array
        
        require 'Database.php';

        $user_id = ($input->getArgument(('user_id')));
        $key = ($input->getArgument('key'));
        // $output->writeln($user_id);
        // $output->writeln($key);
        
        

         $output->writeln($users[$key]['accounts'][0][$user_id]);


        // Loop over array
        
        

       
        
        
        return Command::SUCCESS;
        // Update if matching record found in array
    }
}


