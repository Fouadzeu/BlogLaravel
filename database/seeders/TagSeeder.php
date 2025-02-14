<?php

namespace Database\Seeders;

use App\Models\Tag;

use Illuminate\Database\Seeder;
// use Dotenv\Util\Str;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags=collect(['Fantastique','fantaisie','horreur','romance','novelas','action','fashion']);

        $tags->each(fn($tag)=>Tag::create([
            'name'=>$tag,

             'slug'=>Str::slug($tag),
        ]));
    }
}
