<?php

namespace App\Console\Commands;

use App\Data\User\UserCreateData;
use App\Services\UserService;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin {email} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(UserService $userService): int
    {
        $password = \Str::password();

        $data = new UserCreateData(
            $this->argument('email'),
            $this->argument('name'),
            $password,
        );

        $userService->create($data);

        $this->info("Password: $data->password");

        return 0;
    }
}
