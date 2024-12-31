<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsData = News::query()->get();
        // ini_set('max_execution_time', 3600);
        foreach ($newsData as $dataNews) {
            $post = Post::create([
                'title'     => ['ar' => $dataNews['title'], 'en' => ''],
                'content'   => ['ar' => $dataNews['contents'] ?? $dataNews['title'], 'en' => ''],
                'metadata_title' => ['ar' => $dataNews['title'], 'en' => ''],
                'metadata_description' => ['ar' => $dataNews['meta_description'], 'en' => ''],
                'metadata_keywords' => ['ar' => $dataNews['meta_key_words'], 'en' => ''],
                'section'   =>  2, // 1 is post  

                'views' => $dataNews['views'] ?? 0,
                'published_on' => $dataNews['publish_date'] ?? $dataNews['created_date'],
                'created_at' => $dataNews['created_date'] ?? $dataNews['publish_date'],
                'updated_at' => $dataNews['created_date'] ?? $dataNews['publish_date'],
                'status' => 1,
                'created_by' => 'admin',
                'updated_by' => 'admin', // Assuming you want this as well
            ]);
            $imgfile = explode("/", $dataNews['img']);
            $fileName = end($imgfile);
            $image = $dataNews['img'];
            $file_name = $fileName;
            $imageString = file_get_contents($dataNews['img']);
            $image1 = file_put_contents(base_path('public/assets/posts/' . $file_name), $imageString);
            $file_type = Storage::mimeType(basename($imageString));
            $file_size = filesize(base_path('public/assets/posts/' . $file_name));

            $post->photos()->create([
                'file_name' => $file_name,
                'file_size' => $file_size,
                'file_type' => $file_type,
                'file_status' => 'true',
                'file_sort' => 1,
            ]);
        }
    }
}
