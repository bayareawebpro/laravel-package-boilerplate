<?php

namespace BayAreaWebPro\PackageName\Commands;

use BayAreaWebPro\PackageName\Database\Seeders\DatabaseSeeder;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

#[Signature('package-name:install')]
#[Description('Run package migrations.')]
class InstallPackage extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Artisan::call('db:seed', [
            'class' => DatabaseSeeder::class
        ]);
    }
}
