<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Business\RateMovies;
use App\Business\Benchmark;

class RateMoviesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:rate {qtd : quantidade de filmes a serem avaliados}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Avalia os filmes na quantidade informada.';

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
        $benchmarck = new Benchmark;
        $benchmarck->start();
        $qtd = $this->argument('qtd');
        if(!is_numeric($qtd)){
            $this->error('O parametro qtd deve ser um numero inteiro');
            return;
        }
        $ratedMovies = RateMovies::doAction($qtd);
        $this->info($ratedMovies.' avaliações realizadas.');
        $this->info("Tem decorrido: ". $benchmarck->stop()->elapsedSeconds());
    }
}
