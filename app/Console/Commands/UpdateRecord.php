<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-record';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('products')
            ->where('closing_time', '<=', now())
            ->update(['is_active' => false]);
    }
}
