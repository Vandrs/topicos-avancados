<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Business\MdiffNotes;
use App\Business\Benchmark;

class MakeDiffMatriz extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'diffnotes:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monta a matriz de diferenças';

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
        $mdiff = new MdiffNotes;
        $qtdMdiff = $mdiff->make();
        $this->info($qtdMdiff." Diferenças calculadas.");
        $this->info("Tem decorrido: ". $benchmarck->stop()->elapsedSeconds());
    }
}