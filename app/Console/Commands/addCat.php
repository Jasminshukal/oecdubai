<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class addCat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Category:Add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add New Category';

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
        $name = $this->ask('What is your Category?');
        $type = $this->ask('What is your type of '.$name.'?');

        $this->info("cat name is ".$name);
        $this->info("ans the type is ".$type);

        $cat=Category::create([
            'type'=>$type,
            'name' => $name
        ]);
        return 0;
    }
}
