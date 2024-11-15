<?php

namespace Database\Seeders;


use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tagDummy = require_once database_path("dummy/tagsDummy.php");
        $inserts = [];
        foreach ($tagDummy as $tag) {
            $inserts[] = [
                'title' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table("tags")->insert($inserts);
    }
}
