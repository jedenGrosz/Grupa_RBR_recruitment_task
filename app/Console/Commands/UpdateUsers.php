<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ApiHelper;
use App\Models\User;

class UpdateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and sotore users in database';

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
        $data = ApiHelper::fetchUsers();
        $this->storeUsers($data);

        return 0;
    }

    private function storeUsers($data)
    {
        foreach($data as $attributes)
        {
            $attributes = ApiHelper::manageUserData($attributes);
            User::updateOrCreate(
                ['external_id' => $attributes['external_id']],
                $attributes
            );    
        }
    } 
}
