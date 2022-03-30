<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddMediaCommand extends Command
{
    protected $signature = 'add-media';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** @var User $user */
        $user = User::factory()->create();

        $pathToImage = public_path('image.png');

        $media = $user->addMedia($pathToImage)->preservingOriginal()->toMediaCollection('images', 'media');

        $this->info($media->getUrl('thumb'));
    }
}
