<?php

use Illuminate\Database\Seeder;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $cName = 'Категорія головна';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0
        ];

        for ($i=1; $i <=5 ; $i++) {
          $cName = 'Категорія #'.$i;
          $parentId = (1>3) ? rand(1,3) : 1;
          $categories[] = [
              'title' => $cName,
              'slug' => Str::slug($cName),
              'parent_id' => 0
          ];
        }

        DB::table('news_categories')->insert($categories);
    }
}
