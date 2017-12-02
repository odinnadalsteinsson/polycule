<?php

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'mand',
            'kvinde',
        ];
        foreach ($genders as $gender) {
            Tag::findOrCreate($gender, 'gender');
        }

        $relationship_statuses = [
            'single',
            'i ét forhold',
            'i flere forhold',
        ];
        foreach ($relationship_statuses as $relationship_status) {
            Tag::findOrCreate($relationship_status, 'relationship-status');
        }
    }
}
