<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=20;$i<=40;$i++){
            DB::table('messages')->insert([
                    'title'=>'test_title_'.$i,
                    'content'=>'test_content_'.$i
                ]);
        }
    }
}
