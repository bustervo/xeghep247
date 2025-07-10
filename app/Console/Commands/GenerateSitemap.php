namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Tạo sitemap.xml tự động chuẩn SEO';

    public function handle()
    {
        $sitemap = Sitemap::create();

        // Trang chính
        $sitemap->add(Url::create('/')->setPriority(1.0));
        $sitemap->add(Url::create('/tuyen-xe')->setPriority(0.9));
        $sitemap->add(Url::create('/tin-tuc')->setPriority(0.8));

        // Bài viết
        $posts = Post::where('published_at', '<=', now())->get();
        foreach ($posts as $post) {
            $sitemap->add(
                Url::create(url($post->slug . '.html'))
                    ->setLastModificationDate($post->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        }

        // Lưu sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ sitemap.xml đã được tạo!');
    }
}
