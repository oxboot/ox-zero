<?php namespace Ox\Commands;

/**
 * @package     ox
 * @copyright   Copyright (C) 2018 Zorca. All rights reserved.
 * @license     See LICENSE file for details.
 */

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class SiteCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:create {site_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new site';

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
    public function handle(): void
    {
        if (! ox_check_domain($this->argument('site_name'))) {
            $this->error('Error: Site name not valid');
            return;
        }
        ox_mkdir(config('filesystems.disks.www.root').$this->argument('site_name').'/'.config('app.public-folder'));
        ox_chown(config('filesystems.disks.www.root').$this->argument('site_name').'/'.config('app.public-folder'), 'www-data', 'www-data');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
