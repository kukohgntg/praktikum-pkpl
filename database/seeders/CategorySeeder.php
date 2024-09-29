<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data kategori yang akan dimasukkan
        $categories = [
            'Agama', 'Buddha', 'Hindu', 'Islam', 'Konfusianisme', 'Kristen & Katolik', 'Spiritualitas', 'Alam', 'Hewan',
            'Aliran & Gaya Bahasa', 'Arsitektur', 'Desain Interior', 'Perencanaan Perkotaan & Penggunaan Tanah',
            'Referensi', 'Sejarah', 'Barang Antik & Koleksi', 'Berkebun', 'Tata Ruang dan Pertamanan',
            'Biografi & Autobiografi', 'Memoar Pribadi', 'Sejarah', 'Bisnis & Ekonomi', 'Akuntansi', 'Asuransi',
            'Bank & Perbankan', 'E-Commerce', 'Ekonomi', 'Etika Bisnis', 'Freelance & Wirausaha', 'Green Business',
            'Hubungan Pelanggan', 'Industri', 'Internasional', 'Investasi & Saham', 'Karier', 'Kepemimpinan',
            'Keterampilan', 'Keuangan', 'Keuangan Perusahaan', 'Kewirausahaan', 'Komunikasi Bisnis', 'Lain-Lain',
            'Manajemen', 'Manajemen Industri', 'Manajemen Proyek', 'Motivasi', 'Negosiasi', 'Pelatihan', 'Pemasaran',
            'Pemerintah & Bisnis', 'Perbankan Islam & Keuangan', 'Perilaku Konsumen', 'Perpajakan', 'Perumahan & Real Estate',
            'Public Relations', 'Sales & Marketing', 'Sejarah Ekonomi', 'Sumber Daya Manusia & Manajemen Personalia',
            'Desain', 'Furnitur', 'Industri', 'Sejarah & Kritik', 'Seni Grafis', 'Fiksi', 'Agama', 'Antologi',
            'Fantasi', 'Fiksi Ilmiah', 'Horor', 'Kehidupan Kota', 'Klasik', 'Misteri & Detektif', 'Muslim', 'Novel',
            'Perang & Militer', 'Romantis', 'Sastra', 'Sastra Dunia Asia (Umum)', 'Sejarah', 'Thriller',
            'Fiksi Anak & Remaja', 'Agama', 'Buku Aktivitas', 'Komik & Novel Grafis', 'Legenda, Mitos, Dongeng',
            'Fiksi Dewasa', 'Fiksi Dewasa', 'Filsafat', 'Fotografi', 'Referensi', 'Subjek & Tema', 'Teknik',
            'Game & Aktivitas', 'Buku Mewarnai', 'Kuis', 'Puzzles', 'Hewan Peliharaan', 'Hukum', 'Adat',
            'Bisnis & Keuangan', 'Etika & Tanggung Jawab Profesional', 'Hak Sipil', 'Hukum Keluarga', 'Hukum Perdata',
            'Hukum Pidana', 'Internasional', 'Kekayaan Intelektual', 'Kesehatan', 'Konstitusi', 'Layanan Hukum',
            'Lingkungan', 'Panduan Praktis', 'Pemerintah', 'Pendidikan Hukum', 'Perpajakan', 'Properti',
            'Referensi', 'Sejarah Hukum', 'Humor', 'Ilmu Politik', 'Ilmu Sosial', 'Antropologi', 'Budaya & Sosial',
            'Kriminologi', 'Penyandang Disabilitas', 'Sosiologi', 'Keluarga & Hubungan', 'Lansia', 'Parenting',
            'Pengasuhan, Penitipan & Perawatan Anak', 'Tahapan Hidup', 'Kerajinan & Hobi', 'Fashion',
            'Kesehatan & Kebugaran', 'Diet & Nutrisi', 'Obat Herbal', 'Yoga', 'Komik & Novel Grafis',
            'Fantasi', 'Fiksi Sejarah', 'Horor', 'Humor', 'Kejahatan & Misteri', 'Manga', 'Romantis',
            'Komputer', 'Aplikasi Bisnis & Produktivitas', 'Aplikasi Matematika & Statistik', 'Database Administrasi & Manajemen',
            'Desain, Grafik & Media', 'Hacking', 'Ilmu Komputer', 'Internet', 'Jaringan', 'Pemrograman',
            'Pengembangan & Rekayasa Perangkat Lunak', 'Perangkat Keras', 'Sistem Aplikasi', 'Matematika',
            'Aljabar', 'Probabilitas & Statistik', 'Terapan', 'Medis', 'Administrasi', 'Akupuntur', 'Bedah',
            'Chiropractic', 'Dermatologi', 'Ginekologi & Kebidanan', 'Kardiologi', 'Kedokteran Gigi', 'Keperawatan',
            'Kesehatan Mental', 'Layanan Kesehatan', 'Neurologi', 'Ortopedi', 'Pediatri', 'Pengobatan Alternatif',
            'Pengobatan Hewan', 'Penyakit', 'Referensi & Pedoman', 'Terapi Diet', 'Musik', 'Alat Musik',
            'Dance', 'Instruksi & Studi', 'Musik Klasik', 'Nonfiksi Anak & Remaja', 'Agama', 'Biografi & Memoar',
            'Buku Aktivitas', 'Kehidupan Kota', 'Sains & Alam', 'Sekolah & Pendidikan', 'Topik Sosial',
            'Nonfiksi Dewasa', 'Olahraga & Rekreasi', 'Pendidikan', 'Administrasi', 'Guru & Pendampingan Siswa',
            'Pelajar & Kemahasiswaan', 'Pengajaran', 'SD', 'SMA', 'SMP', 'Pengembangan Diri', 'Analisis Tulisan Tangan',
            'Emosi', 'Journaling', 'Komunikasi & Keterampilan Sosial', 'Motivasi & Inspiratif', 'Personal Growth',
            'Sukses', 'Persiapan Ujian', 'Kemahiran Bahasa Inggris', 'Tes Studi (Lainnya)', 'Pertunjukan Seni',
            'Film', 'Referensi', 'Teater', 'Psikologi', 'Gerakan', 'Kepribadian', 'Kesehatan Mental', 'Kreativitas',
            'New Age', 'Pendidikan & Pelatihan', 'Perkembangan', 'Psikologi Klinis', 'Psikologi Sosial', 'Puisi',
            'Referensi', 'Almanak', 'Ensiklopedia', 'Kamus', 'Pernikahan', 'Resep & Masakan', 'Etnis & Regional Asia',
            'Kesehatan & Penyembuhan', 'Kursus & Hidangan', 'Makanan Bayi', 'Metode', 'Minuman', 'Referensi', 'Rumah',
            'Sains', 'Botani', 'Fisika', 'Ilmu Bumi', 'Kimia', 'Life Sciences', 'Referensi', 'Sains Luar Angkasa',
            'Sejarah', 'Geografi Sejarah', 'Seni', 'Referensi', 'Sejarah', 'Studi Bahasa Asing', 'Arab',
            'Bahasa Inggris sebagai Bahasa Kedua', 'Belanda', 'Jepang', 'Jerman', 'Korea', 'Mandarin', 'Prancis',
            'Teknologi & Teknik', 'Ilmu Militer', 'Ilmu Pangan', 'Kelautan & Angkatan Laut', 'Kimia & Biokimia',
            'Konstruksi', 'Lingkungan', 'Listrik', 'Manufaktur', 'Mekanik', 'Perikanan & Akuakultur', 'Pertanian',
            'Referensi', 'Robotika', 'Sipil', 'Telekomunikasi', 'Transportasi', 'Otomotif', 'Travel', 'Afrika',
            'Amerika Selatan', 'Amerika Utara', 'Asia', 'Australia', 'Australia & Oceania', 'Eropa', 'Indonesia',
            'Minat Khusus', 'Peta', 'Timur Tengah', 'Tubuh, Pikiran & Jiwa', 'Mindfulness & Meditasi', 'Parapsikologi',
            'Spiritualisme'
        ];

        // Loop untuk membuat setiap kategori
        foreach ($categories as $categoryName) {
            // Cek apakah kategori sudah ada berdasarkan nama
            if (!Category::where('name', $categoryName)->exists()) {
                Category::create([
                    'name' => $categoryName,
                    'slug' => Str::slug($categoryName),
                ]);
            }
        }
    }
}
