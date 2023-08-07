<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Sambangi Mahasiswa KKN, Bhabinkamtibmas Polsek Lais Minta Mahasiswa Membaur dengan Warga',
                'content' => 'Bhabinkamtibmas Polsek Lais Aipda Fedi Aften menyambangi Mahasiswa Universitas Bengkulu (Unib) yang sedang melaksanakan Kuliah Kerja Nyata (KKN) pada pagi Senin (17/7).
                Mahasiswa KKN yang disambangi oleh Bhabinkamtibmas Aipda Fedi Aften ini adalah Mahasiswa KKN Unib kelompok 215 yang melaksanakan KKN di Desa Kembang Manis Kecamatan Air Padang Kabupaten Bengkulu Utara.
                
                Dalam kesempatan sambang ini, Bhabinkamtibmas Aipda Fedi Aften mengajak mahasiswa untuk segera membaur dengan warga Desa Kembang Manis, dan agar mahasiswa KKN segera aktif mengikuti kegiatan-kegiatan warga di Desa.
                
                Bhabinkamtibmas juga menyampaikan, bila ada kendala selama pelaksanakan KKN, agar disampaikan kepada pemerintahan Desa Kembang Manis ataupun kepada Bhabinkamtibmas.
                
                Dihubungi terpisah, Kapolres Bengkulu Utara AKBP Andy Pramudya Wardana,S.I.K.,M.M. melalui Kapolsek Lais Iptu Sukamto menerangkan bahwa kegiatan Bhabinkamtibmas menyambangi mahasiswa KKN adalah untuk mengajak mahasiswa segera membaur dengan warga Desa dan agar mahasiswa segera aktif ikuti kegiatan warga.
                
                “Kita berikan arahan kepada mahasiswa agar segera aktif ikuti kegiatan warga di Desa”ujarnya.
            
                Menurut Kapolsek, para mahasiswa mempunyai ilmu lebih selain itu juga bisa ikut berperan aktif dalam menciptakan dan menjaga kondusifitas Kamtibmas dilingkungannya.
            
                “Dengan adanya kebersamaan dan sinergitas antara BhabinKamtibmas dan mahasiswa KKN maka akan terwujud kerjasama dalam ciptakan Kamtibmas yang kondusif” tutup Kapolsek Lais Iptu Sukamto.',
                'author_id' => 1,
                'thumbnail' => "polsek-lais-sambangi-mahasiswa-kkn.jpg"
            ]
        ];

        foreach ($newsData as $data) {
            $news = News::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'author_id' => $data['author_id'],
            ]);

            $news->addMedia(public_path('images/news/' . $data['thumbnail']))
                ->preservingOriginal()
                ->toMediaCollection("news");
        }
    }
}
