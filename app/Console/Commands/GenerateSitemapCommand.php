<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Tạo sitemap.xml tự động';

    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ sitemap.xml đã được tạo!');
    }
}
