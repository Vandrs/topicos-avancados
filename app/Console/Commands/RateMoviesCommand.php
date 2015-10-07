<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Business\RateMovies;

class RateMoviesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Avalia os projetos.';

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
     * @return mixed
     */
    public function handle()
    {
        $ratedMovies = RateMovies::doAction();
        $this->info($ratedMovies.' filmes avaliados.');
    }
}
