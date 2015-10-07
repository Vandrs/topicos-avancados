<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class InsertUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:insert {name : Nome do usuário}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere um usuário no banco. ';

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
        $userName = $this->argument('name');
        if(User::create(["name"=>$userName])){
            $this->info("Usuário criado com sucesso.");
        } else {
            $this->error("Falha ao criar usuário.");
        }
    }
}
