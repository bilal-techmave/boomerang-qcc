<?php
namespace App\Console\Commands;

use App\Models\User;
use DB;
use Illuminate\Console\Command;
class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';
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
        $fuser = User::where('id','2')->first();
        $this->info('Successfully sent daily quote to everyone.'.$fuser->name);
    }
}
