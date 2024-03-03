<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SavePdf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savepdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pdfを保存';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Http::get('http://localhost/laravel-billbook-app/public/pdf');
    }
}
