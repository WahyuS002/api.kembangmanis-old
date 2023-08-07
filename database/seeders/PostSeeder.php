<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
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
            ],
            [
                'title' => 'Mahasiswa KKN Unib Periode 100  turut aktif bantu pelaksanaan Open Turnamen Sepak Bola KUDA TERBANG CUP 2023',
                'content' => 'Desa Kembang Manis Kecamatan Air Padang, Bengkulu Utara mengadakan event besar berupa pertandingan sepak bola yang sempat terhenti beberapa tahun belakangan. Setelah melalui proses yang panjang akhirnya Desa Kembang Manis dapat menyelenggarakan kegiatan pertandingan sepak bola ini. 
                
                Para mahasiswa KKN Unib Periode 100 kelompok 215 desa Kembang Manis terlibat langsung dalam kegiatan tersebut. “saya selaku kordes kelompok kkn 215 bersama rekan – rekan kelompok KKN 215 yang lain, bersemangat untuk membantu mensukseskan kegiatan yang diadakan pertandingan sepak bola ini. Kami juga berterima kasih kepada pak Kades desa Kembang Manis yang telah mempercayakan kelompok KKN kami untuk ikut serta dalam kepanitiaan besar ini”. Ujar Ogi Hendrikson selaku Kordes kelompok KKN 215

                Pertandingan sepak bola mulai dilaksanakan pada hari Rabu 12 Juli 2023 di Desa Kembang Manis dengan peserta sekitar 70 club sepak bola se Provinsi Bengkulu. “ Saya senang sebab Desa kami akhirnya dapat menyelenggarakan pertandingan besar ini. Dan  kegiatan ini berjalan dengan lancar tanpa adanya hambatan, berlangsung dengan damai sampai selesai acara, serta selalu menjunjung tinggi sportifitas dan silatirahim”. Ujar Anton Kades desa Kembang Manis.
                
                Lebih lanjut, Ongki Julianto sebagai ketua panitia event sepak bola ini mengatakan, “ dalam dunia bola, perbedaan hanya ada didalam lapangan saja, bila diluar lapangan diharapakan akan memperpanjang tali silaturahmi baik antar pemain, suporter, maupun masyarakat. Selain itu, event ini juga bertujuan untuk mencari bibit – bibit unggul dari generasi muda yang ada di Desa Kembang Manis yang dapat memajukan sepak bola Indonesia baik tingkat local, regional, nasional maupun tingkat Internasional, besar harapan saya untuk event kuda terbang ini agar bisa berjalan dengan baik dan sukses hingga selesai acara”. ujar ketua panitia, Ongki Julianto  
                
                 Hingga berita ini diturunkan pertandingan masih berlangsung hingga 30 hari kedepan. (Dicko)',
                'author_id' => 1,
                'thumbnail' => "open-turnamen.jpg"
            ]
        ];

        foreach ($posts as $data) {
            $post = Post::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'author_id' => $data['author_id'],
            ]);

            $post->addMedia(public_path('images/posts/' . $data['thumbnail']))
                ->preservingOriginal()
                ->toMediaCollection("post_thumbnails");
        }
    }
}
