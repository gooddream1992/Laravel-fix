<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class cornjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Escort Availability';

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
        $current = Carbon::now();
        
        $users = DB::table('users')->where([
            ['roleStatus','=',2],
            ['timer','!=',"0000-00-00 00:00:00"],
            ['timer', '<=', $current]
        ])->select()->get();
        foreach ($users as $value) {
            DB::table('users')->where('id','=',$value->id)->update(['activation'=>0]);
        }
    }
}
