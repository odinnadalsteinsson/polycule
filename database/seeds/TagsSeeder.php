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
        // genders
        $this->createTag('male', 'gender', 'Mand');
        $this->createTag('female', 'gender', 'Kvinde');

        // relationship statuses
        $this->createTag('single', 'relationship-status', 'Single');
        $this->createTag('one', 'relationship-status', 'I ét forhold');
        $this->createTag('more', 'relationship-status', 'I flere forhold');
    }

    protected function createTag($name, $type, $translation, $language = 'da')
    {
        $tag = Tag::findOrCreate($name, $type);
        $tag->setTranslation('name', $language, $translation);
        $tag->save();
    }
}
