<?php

namespace App\Console\Commands;
//namespace App\Http\Controllers\ApiController;

use Illuminate\Console\Command;

class QuoteGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GET {name=friend}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a random quote.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $quotes = [
            'waiter, waiter lemme guess, there’s a fly in your soup? no i just wanted to say I use Vim',
            'project manager: i know enough coding to be dangerous *winks* literally ruins entire codebase',
            'The software development process i can’t fix this *crisis of confidence* *questions career* *questions life* oh it was a typo, cool',
            'Web dev in 2016: Keep installing Babel plugins until it works',
            'my colleague is building a js app with no framework, no build tool, no compilers…like some sort of psychopath',
            '“Made with love” I call BS.',
            'Never trust a developer wearing a suit.',
            'We love your open source work, the code is excellent, but would you mind showing us a quick fibonacci sequence on the whiteboard?',
            'Give a man a fish and you feed him for a day, Teach a man to fish and you feed him for a lifetime, Give a startup $$ and they’ll waste it.',
            '“The Top 100 JavaScript Frameworks of 2015″ ಠ_ಠ this is an issue.',
        ];
 
        shuffle($quotes);
 
        //$this->info($quotes[0]);
        $this->info('Hey '.$this->argument('name').', check this out: '.$quotes[0]);
        // $controller = new ApiController();
        // $controller->getEmployee(['ip_address' => $ip_address]); 

    }
}
