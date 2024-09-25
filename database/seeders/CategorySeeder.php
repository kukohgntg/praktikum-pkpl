<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Agama',
            'Alam',
            'Automotive & Motorcycles',
            'Biografi & Autobiografi',
            'Bisnis & Ekonomi',
            'Business & Investing',
            'Children Age 0-3',
            'Communities',
            'Fashion & Style',
            'Fiksi Anak & Remaja',
            'Fiksi Dewasa',
            'Fiksi Ilmiah',
            'Horror & Paranormal',
            'Hukum',
            'Humor',
            'Ilmu Politik',
            'Islam',
            'Kehidupan Kristen',
            'Keluarga & Hubungan',
            'Kerajinan & Hobi',
            'Kesehatan & Kebugaran',
            'Klasik',
            'Komik & Novel Grafis',
            'Komputer',
            'Luxury',
            'Manga',
            'Misteri & Detektif',
            'Nonfiksi Dewasa',
            'Olahraga & Rekreaksi',
            'Parenting',
            'Pemerintah',
            'Pendidikan',
            'Pengembangan Diri',
            'Pertunjukan Seni',
            'Professional & Journals',
            'Psikologi',
            'Puisi',
            'Referensi',
            'Resep & Masakan',
            'Romantis',
            'Rumah',
            'Sastra',
            'Sejarah',
            'Seni',
            'Technology, Games & Gadget',
            'Teknologi & Teknik',
            'Travel',
            'Travel, City & Vacations',
            'Womens Interest',
        ];


        // foreach ($data as $value) {
        //     Category::insert(['name' => $value]);
        // }

        foreach ($data as $value) {
            Category::insert(['name' => $value, 'slug' => $value]);
        }
    }
}
