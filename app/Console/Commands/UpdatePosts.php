<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ApiHelper;
use App\Models\Post;

class UpdatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and sotore posts in database';

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
        $data = ApiHelper::fetchPosts();
        $this->storePosts($data);

        return 0;
    }

    private function storePosts($data)
    {
        foreach( $data as $attributes)
        {
            $attributes = ApiHelper::managePostData($attributes);
            Post::updateOrCreate(
                ['external_id' => $attributes['external_id']],
                $attributes
            );    
        }
    } 
}
