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
        for ($i=1;$i<=20;$i++){
            DB::table('messages')->insert([
                    'title'=>'test_title_'.$i,
                    'content'=>'test_content_'.$i
                ]);
        }
    }
}
