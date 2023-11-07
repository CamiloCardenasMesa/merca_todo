<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteImages extends Command
{
    protected $signature = 'images:delete-all';
    protected $description = 'Delete all images from the "images" disk';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $disk = Storage::disk('images');
        $files = $disk->files('product_images');

        foreach ($files as $file) {
            $disk->delete($file);
            $this->info("La imagen $file ha sido eliminada");
        }

        $this->info('Todas las imágenes han sido eliminadas satisfactoriamente');
    }
}
