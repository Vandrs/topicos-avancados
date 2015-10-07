<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;

class InsertMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:insert {name : Nome do filme}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere um filme no banco.';

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
        $movieName = $this->argument('name');
        if(Movie::create(['title'=>$movieName])){
            $this->info('Filme cadastrado com sucesso');
        } else {
            $this->error('Falha ao cadastrar filme');
        }
    }
}
