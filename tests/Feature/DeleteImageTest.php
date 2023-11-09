<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DeleteImageTest extends TestCase
{
    public function testDeleteAllImages()
    {
        $this->markTestSkipped();

        Artisan::call('images:delete-all');

        $this->assertSame(0, Artisan::call('images:delete-all'));

        $directory = storage_path('app/public/product_images');
        $files = scandir($directory);

        $this->assertCount(2, $files);
    }

    public function testDeleteSingleImage()
    {
        $disk = Storage::disk('images');
        $imagePath = 'product_images/test_image.jpg';
        $disk->put($imagePath, 'contents');

        Artisan::call('images:delete-all');

        $this->assertFalse($disk->exists($imagePath));
    }
}
