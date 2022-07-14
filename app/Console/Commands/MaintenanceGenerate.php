<?php

namespace App\Console\Commands;

use App\Models\Investment;
use App\Models\MaintenanceItem;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MaintenanceGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $totalActive = Investment::where('status', 'active')->sum('amount');
        $totalActiveIds = Investment::where('status', 'active')->get()->pluck('id')->toArray();
        MaintenanceItem::create([
            'month' => date("F"),
            'year' => date("Y"),
            'active_investments' => $totalActive,
            'active_investments_id' => json_encode($totalActiveIds),
            'percentage' => 0.5
        ]);
    }
}
