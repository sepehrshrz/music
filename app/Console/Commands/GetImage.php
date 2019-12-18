<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetImage extends Command
{
	const BASE_IMAGE_PATH_IN_STORAGE = "app/public/images/%s";
	const BASE_MP3_PATH_IN_STORAGE   = "app/public/songs/%s";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get image from radio javan';
	private $images = [
		'https://nex1music.ir/upload/special_post/nex1music-khashayar-taj-rabete.jpg',
		'https://nex1music.ir/upload/2019-12-03/mehdi-taj-rabete-2019-12-03-17-30-41.jpg',

	];
	private $mp3s   = [
		'http://dl.nex1music.ir/1398/09/12/Mehdi%20Taj%20-%20Rabete.mp3?time=1575883088&filename=/1398/09/12/Mehdi%20Taj%20-%20Rabete.mp3',
	];
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
    public function handle()
    {
		$kind = $this->choice('Do you want mp3 or images', [
			'mp3',
			'images'
		], 'images');
		\Storage::makeDirectory('public/images');
		\Storage::makeDirectory('public/songs');
		switch ($kind){
			case 'mp3':
				$this->getMp3s();
				break;
			case 'images':
				$this->getImages();
				break;
		}
	}
	/**
	 *
	 * @return array|void
	 */
	private function getImages()
	{
		$progress = $this->output->createProgressBar(count($this->images));
		foreach ($this->images as $image) {
			$pathExploded = explode('/', $image);
			$imageName    = end($pathExploded);
			$storagePath = storage_path(sprintf(self::BASE_IMAGE_PATH_IN_STORAGE, $imageName));
			file_put_contents($storagePath, file_get_contents($image));
			$progress->advance();
		}
		$progress->finish();
		$this->info("\nAll images downloaded.");
	}
	/**
	 *
	 * @return array|void
	 */
	private function getMp3s()
	{
		$progress = $this->output->createProgressBar(count($this->mp3s));
		foreach ($this->mp3s as $mp3) {
			$pathExploded = explode('/', $mp3);
			$mp3Name      = end($pathExploded);
			$storagePath = storage_path(sprintf(self::BASE_MP3_PATH_IN_STORAGE, $mp3Name));
			file_put_contents($storagePath, file_get_contents($mp3));
			$progress->advance();
		}
		$progress->finish();
		$this->info("\nAll songs downloaded.");
	}

}
