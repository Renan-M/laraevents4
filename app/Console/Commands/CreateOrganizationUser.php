<?php

namespace App\Console\Commands;

use Faker\Guesser\Name;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\Types\This;
use App\Models\User;

class CreateOrganizationUser extends Command
{

    protected $signature = 'create:organzation=user {name} {email} {cpf} {password}';


    protected $description = 'Cria um novo usuário do tipo organização';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $name =$this->argument('name');
        $email =$this->argument('email');
        $cpf =$this->argument('cpf');
        $password =$this->argument('password');

        user::create([
            'name'=>$name,
            'email'=>$email,
            'cpf'=>$cpf,
            'password'=>$password,
            'role'=>'organization'
        ]);
            $this->info('Usuário cadastrado com sucesso ');
    }
}
