<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoInsertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert record to table todos';

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
        //return 0;
        DB::table('todos')->insert([
            'user_id' => '4',
            'name' => 'Tets command schedule',
            'description' => 'Thử tạo và lên lịch insert',
            'completed' => '0'
        ]);
        $this->info('Test insert by command to table todos');
    }
}
