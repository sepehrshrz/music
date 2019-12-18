<?php

use App\Http\Models\Music\Artist;
use Illuminate\Database\Seeder;

class FakerArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$artist=new Artist();
    $artist->name='farzad';
    $artist->nick_name='farzadfarzin';
    $artist->biography='in honarmnad dar esfehan chem be jahan goshud';


		$artist->save();
    }
}
