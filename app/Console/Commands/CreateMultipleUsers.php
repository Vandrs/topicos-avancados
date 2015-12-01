<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Business\Benchmark;

class CreateMultipleUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:insert-multiple {qtd : quantidade de usuarios a inserir}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria multiplos usuarios conforme parametro passado';

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
        $qtdCriar = $this->argument('qtd');
        if(!is_numeric($qtdCriar)){
            $this->error('Parametro qtd deve ser um numero inteiro.');
            return;
        }
        $qtdUsers = User::query()->count();
        $until = $qtdUsers+$qtdCriar;
        for($qtdUsers; $qtdUsers < $until; $qtdUsers++){
            User::create(['name' => 'Usuário '.($qtdUsers+1)]);
        }
        $this->info("Usuarios criados com sucesso!");
        $this->info("Tem decorrido: ". $benchmarck->stop()->elapsedSeconds());
    }
}
