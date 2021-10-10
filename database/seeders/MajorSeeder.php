<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::create([
            'name' => 'Civil Engineering',
            'photo_url' => 'https://images.unsplash.com/photo-1503708928676-1cb796a0891e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80'
        ]);
        Major::create([
            'name' => 'Digital Journalism',
            'photo_url' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80'
        ]);
        Major::create([
            'name' => 'Software',
            'photo_url' => 'https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80'
        ]);
        Major::create([
            'name' => 'Broadcast',
            'photo_url' => 'https://images.unsplash.com/photo-1598743400863-0201c7e1445b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80'
        ]);
        Major::create([
            'name' => 'Industrial Engineering',
            'photo_url' => 'https://images.unsplash.com/photo-1496247749665-49cf5b1022e9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2073&q=80'

        ]);
        Major::create([
            'name' => 'Psychology',
            'photo_url' => 'https://images.unsplash.com/photo-1592496001020-d31bd830651f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1212&q=80'
        ]);
        Major::create([
            'name' => 'Hardware',
            'photo_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80'
        ]);
        Major::create([
            'name' => 'Information System',
            'photo_url' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80'
        ]);
        Major::create([
            'name' => 'Accounting',
            'photo_url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1311&q=80'
        ]);
        Major::create([
            'name' => 'Public Relation',
            'photo_url' => 'https://images.unsplash.com/photo-1559523161-0fc0d8b38a7a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1180&q=80'
        ]);
        Major::create([
            'name' => 'Food Technology',
            'photo_url' => 'https://images.unsplash.com/photo-1476733636740-24c58e0e7432?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80'
        ]);
        Major::create([
            'name' => 'Management',
            'photo_url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1011&q=80'
        ]);
    }
}
