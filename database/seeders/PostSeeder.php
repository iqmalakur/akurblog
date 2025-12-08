<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->pluck('id');

        if ($users->isEmpty()) {
            $this->command->warn('Seeder Post dibatalkan: user kosong');
            return;
        }

        $now = Carbon::now();

        $posts = [
            [
                'title' => 'Mengenal Laravel untuk Pengembangan Web Modern',
                'category_id' => 1, // Teknologi
                'content' => <<<TEXT
Laravel adalah framework PHP modern yang dirancang untuk mempermudah proses pengembangan aplikasi web.
Framework ini menawarkan sintaks yang elegan, struktur proyek yang rapi, serta ekosistem yang kaya.

Laravel membantu developer membangun aplikasi web dengan lebih cepat dan aman.
TEXT,
            ],
            [
                'title' => 'Pentingnya Secure Coding bagi Developer',
                'category_id' => 2, // Pendidikan
                'content' => <<<TEXT
Secure coding adalah praktik menulis kode dengan memperhatikan aspek keamanan sejak awal pengembangan.
Tujuannya adalah mencegah celah keamanan seperti XSS, SQL Injection, dan CSRF.

Dengan secure coding, kualitas dan kepercayaan terhadap aplikasi meningkat.
TEXT,
            ],
            [
                'title' => 'Membangun Kebiasaan Produktif di Era Digital',
                'category_id' => 3, // Gaya Hidup
                'content' => <<<TEXT
Era digital membawa banyak kemudahan, namun juga tantangan dalam menjaga fokus.
Produktivitas dapat meningkat dengan membangun kebiasaan kecil secara konsisten.

Mengelola waktu dan energi adalah kunci keseimbangan hidup.
TEXT,
            ],
            [
                'title' => 'Tips Memulai Karier di Bidang IT',
                'category_id' => 4, // Karier
                'content' => <<<TEXT
Bidang IT menawarkan peluang karier yang luas dan menjanjikan.
Namun, dibutuhkan persiapan skill dan mental yang matang sejak awal.

Belajar berkelanjutan dan membangun portofolio menjadi langkah penting.
TEXT,
            ],
            [
                'title' => 'Peluang Bisnis Digital di Tahun Ini',
                'category_id' => 5, // Bisnis
                'content' => <<<TEXT
Bisnis digital berkembang pesat seiring meningkatnya penggunaan teknologi.
Banyak peluang terbuka bagi pelaku usaha yang mampu beradaptasi.

Strategi yang tepat dan pemahaman pasar menentukan kesuksesan.
TEXT,
            ],
            [
                'title' => 'Menemukan Motivasi untuk Terus Belajar',
                'category_id' => 6, // Inspirasi
                'content' => <<<TEXT
Motivasi belajar tidak selalu stabil, terutama saat menghadapi kesulitan.
Menemukan alasan kuat untuk belajar akan membantu menjaga konsistensi.

Setiap langkah kecil membawa perubahan besar.
TEXT,
            ],
            [
                'title' => 'Pendapat tentang Masa Depan Kerja Remote',
                'category_id' => 7, // Opini
                'content' => <<<TEXT
Kerja remote menjadi pilihan populer bagi banyak pekerja modern.
Fleksibilitas waktu memberikan keuntungan, namun juga memerlukan disiplin tinggi.

Keseimbangan komunikasi dan tanggung jawab sangat penting.
TEXT,
            ],
            [
                'title' => 'Perkembangan Teknologi AI Terbaru',
                'category_id' => 8, // Berita
                'content' => <<<TEXT
Artificial Intelligence berkembang pesat dan berdampak besar di berbagai industri.
Inovasi terbaru membuka peluang baru sekaligus tantangan etis.

Mengikuti berita teknologi penting untuk tetap relevan.
TEXT,
            ],
            [
                'title' => 'Tren Pengembangan Web yang Perlu Diketahui',
                'category_id' => 9, // Tren
                'content' => <<<TEXT
Dunia web development terus berubah dengan cepat.
Framework, tool, dan best practice baru terus bermunculan.

Adaptasi dan pembelajaran berkelanjutan menjadi tuntutan utama.
TEXT,
            ],
            [
                'title' => 'Menjaga Kesehatan di Tengah Kesibukan',
                'category_id' => 10, // Kesehatan
                'content' => <<<TEXT
Kesibukan sering membuat kita lupa menjaga kesehatan tubuh.
Padahal, kesehatan adalah aset utama untuk produktivitas.

Olahraga ringan dan istirahat cukup sangat dianjurkan.
TEXT,
            ],
        ];

        $data = [];

        foreach ($posts as $index => $post) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'user_id' => $users->random(),
                'category_id' => $post['category_id'],
                'title' => $post['title'],
                'content' => $post['content'],
                'slug' => Str::slug($post['title']) . '-' . ($index + 1),
                'published_at' => $now->copy()->subDays(rand(1, 30)),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('posts')->insert($data);
    }
}
