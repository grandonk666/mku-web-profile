<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Gallery;
use App\Models\Kategori;
use App\Models\Matakuliah;
use App\Models\Post;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'is_admin' => true,
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin"),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->count(5)->create();

        Kategori::create([
            "nama" => "Berita",
            "slug" => "berita"
        ]);
        Kategori::create([
            "nama" => "Pengumuman",
            "slug" => "pengumuman"
        ]);

        Post::factory()->count(20)->create();

        Gallery::create([
            'image' => 'gallery/gedung1.jpg',
            'caption' => 'Gedung Kuliah Bersama, tempat belajar mengajar MKU'
        ]);
        Gallery::create([
            'image' => 'gallery/gedung2.jpg',
            'caption' => 'Gedung Kuliah Bersama'
        ]);
        Gallery::create([
            'image' => 'gallery/gedung3.jpg',
            'caption' => 'Gedung Kuliah Bersama'
        ]);
        Gallery::create([
            'image' => 'gallery/gedung4.jpg',
            'caption' => 'Gedung Kuliah Bersama'
        ]);
        Gallery::create([
            'image' => 'gallery/kelas.jpg',
            'caption' => 'Ruang kelas gedung GKB'
        ]);
        Gallery::create([
            'image' => 'gallery/tas.jpg',
            'caption' => 'Ruang kelas gedung GKB'
        ]);



        $agama = Matakuliah::create([
            "nama" => "Pendidikan Agama",
            "slug" => "pendidikan-agama",
            "detail" => '<div>Jadwal matakuliah Pendidikan Agama</div>'
        ]);
        $agama->listDosen()->createMany([
            [
                'nama' => 'A. Muammar Alawi, S.Pd.I, M.Pd.I',
                'keterangan' => 'Agama Islam'
            ],
            [
                'nama' => 'Drs. Zawawi, M.Pd',
                'keterangan' => 'Agama Islam',
                'nip' => '370069600601'
            ],
            [
                'nama' => 'Drs. Imam Ghozali, M.M',
                'keterangan' => 'Agama Islam',
                'nip' => '19650910199331001'
            ],
            [
                'nama' => 'Saifuddin Zuhri. M.Si, Drs',
                'keterangan' => 'Agama Islam',
                'nip' => '370069400351'
            ],
            [
                'nama' => 'Rohmatul Faizah, S.Pd.I, M.Pd.I',
                'keterangan' => 'Agama Islam',
                'nip' => '17219940221007'
            ],
            [
                'nama' => 'Taufikurrahman, S.Pd, M.Pd',
                'keterangan' => 'Agama Islam',
                'nip' => '20119930410246'
            ],
            [
                'nama' => 'Erwin K, S.Th.I, M.Pd',
                'keterangan' => 'Agama Islam',
                'nip' => '17219920510006'
            ],
            [
                'nama' => 'Cholid Fadil, S.Sos.I, M.Pd.I',
                'keterangan' => 'Agama Islam',
                'nip' => '374100802651'
            ],
            [
                'nama' => 'Drs. Sony Wiliams Ss, M.Hum',
                'keterangan' => 'Agama Katolik'
            ],
            [
                'nama' => 'Niluh P K, Se, S.Pdh, M.Pdh',
                'keterangan' => 'Agama Hindu'
            ],
            [
                'nama' => 'Suranto, S. Ag, M. A',
                'keterangan' => 'Agama Budha'
            ],
            [
                'nama' => 'Pdt. Abraham Lalong L, Ma',
                'keterangan' => 'Agama Kristen'
            ],
            [
                'nama' => 'Andreas Jonathan, Ph.D',
                'keterangan' => 'Agama Kristen'
            ],
        ]);
        $agama->file_support()->create([
            'path' => 'file-support/pendidikan-agama.pdf',
            'filename' => 'Jadwal matakuliah Pendidikan Agama'
        ]);

        $indonesia = Matakuliah::create([
            "nama" => "Bahasa Indonesia",
            "slug" => "bahasa-indonesia",
            "detail" => '<div>Jadwal matakuliah Bahasa Indonesia</div>'
        ]);
        $indonesia->listDosen()->createMany([
            [
                'nama' => 'Adelia S, S.Hum, M.Hum',
                'nip' => '20219920404240'
            ],
            [
                'nama' => 'Ahmad Suyuti, S.Pd, M.A',
                'nip' => '20119920302241'
            ],
            [
                'nama' => 'Dewi Puspa A, S.Pd, M.Pd',
                'nip' => '1719890624026'
            ],
            [
                'nama' => 'Endang S, Dr. S.Pd, M.Pd',
                'nip' => '17219860506024'
            ],
            [
                'nama' => 'Siti Ning Farida, Dra. M.Si',
                'nip' => '196407291990032000'
            ],
            [
                'nama' => 'Ilmatus S, S.Pd., M.Hum',
                'nip' => '20219930130239'
            ],
            [
                'nama' => 'Dra. Peni Cahya Cartika, M.Si'
            ],
            [
                'nama' => 'Dr. Eko Hardianto, M.Pd'
            ],
        ]);
        $indonesia->file_support()->create([
            'path' => 'file-support/bahasa-indonesia.pdf',
            'filename' => 'Jadwal matakuliah Bahasa Indonesia'
        ]);

        $inggris = Matakuliah::create([
            "nama" => "Bahasa Inggris",
            "slug" => "bahasa-inggris",
            "detail" => '<div>Jadwal matakuliah Bahasa Inggris</div>'
        ]);
        $inggris->listDosen()->createMany([
            [
                'nama' => 'Dr. Rosida, S.Tp, M.P',
                'nip' => '371029500441'
            ],
            [
                'nama' => 'Dr. Zainal Abidin Achmad, S.Sos, M.Si',
                'nip' => '37305997301701'
            ],
            [
                'nama' => 'Laksmi Diana, S.S, M.Pd',
                'nip' => ''
            ],
            [
                'nama' => 'Kinanti Resmi Hayati, S.Hum, M.A',
                'nip' => ''
            ],
            [
                'nama' => 'Navisatul Izzah, S.Pd, M.Tesol',
                'nip' => '20219950330243'
            ],
            [
                'nama' => 'Wahyu Kyestiati Sumarno, S.Pd, M.Ed, M.Pd',
                'nip' => '20219890807242'
            ],
            [
                'nama' => 'Dwi Wahyuningtyas, S.Pd, M.A',
                'nip' => '20219910528244'
            ],
            [
                'nama' => 'Drs. Suprapto, M.Hum',
                'nip' => '573031404660007'
            ],
            [
                'nama' => 'Dr.Drs. Sukirmiyadi, M.Pd',
                'nip' => '196106011993091000'
            ],
            [
                'nama' => 'Hendra Sudarso S.Pd, M.Pd',
                'nip' => '0727048701'
            ],
            [
                'nama' => 'Linda Mayasari,  S.Pd.M.Pd',
                'nip' => '0718928401'
            ],
            [
                'nama' => 'Ari Setyorini, Ss., Ma',
            ],
            [
                'nama' => 'Diah Astuty Ss.,M.Pd,',
                'nip' => '0714127401'
            ],
            [
                'nama' => 'Dr.Drs Kani Sulam Taufik M.Pd',
                'nip' => '0725105101'
            ],
            [
                'nama' => 'Sulton Dedi Wijaya S.Pd.,M.Pd,',
                'nip' => '3515111512750004'
            ],
            [
                'nama' => 'Davy budiono S.Pd.,Mhum',
                'nip' => '0718097601'
            ],
            [
                'nama' => 'Nuriah Mufidah Ss.,M.Pd'
            ],
            [
                'nama' => 'Septaria S. Prihandini'
            ],
        ]);
        $inggris->file_support()->create([
            'path' => 'file-support/bahasa-inggris.pdf',
            'filename' => 'Jadwal matakuliah Bahasa Inggris'
        ]);

        $kepemimpinan = Matakuliah::create([
            "nama" => "Kepemimpinan",
            "slug" => "kepemimpinan",
            "detail" => '<div>Jadwal matakuliah Kepemimpinan</div>'
        ]);
        $kepemimpinan->listDosen()->createMany([
            [
                'nama' => 'Ario Bimo Utomo, S.Ip, M.I.R'
            ],
            [
                'nama' => 'Budi Prabowo, S.Sos, Mm'
            ],
            [
                'nama' => 'Dr. I Gede Susrama Masdiyasa, S.T, M.Kom',
                'nip' => '370060602101'
            ],
            [
                'nama' => 'Ir. Minto Waluyo, Dr. Mmt',
                'nip' => '196111301990031001'
            ],
            [
                'nama' => 'Dra. Ety Dwi Susanti, M.Si',
                'nip' => '196805011994032001'
            ],
            [
                'nama' => 'Dra. Sri Wibawani, M.Si',
                'nip' => '196704061994032001'
            ],
            [
                'nama' => 'Dra. Herlina Suksmawati, M.Si',
                'nip' => '196412251993092001'
            ],
            [
                'nama' => 'Ir. Bambang Wahyudi, M.S'
            ],
            [
                'nama' => 'Praja Firdaus Nuryananda, S.Hub.Int, M.Hub.Int',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Artimuri Krisbowo, S.I.P., M.Si.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dandi Darmadi, S.Ip., M.A.P.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Drh. Wiludjeng Widayati, M.P.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Made Bambang Adnyana, M.Par.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dra.Ec. Nurjanti Takarini, M.Si.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Drs.Ec. Hery Pudjoprastyono, M.M.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'IR. Naniek Ratni Juliardi A.R., M.Kes.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dhian Satria Yudha Kartika, S.Kom., M.Kom.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dra. Endang Iryanti, M.M.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dr.Ir. Penta Suryaminarsih, M.P.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dr.Ir. Hery Nirwanto, M.P.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dra. Suparwati, M.Si.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dr. Sutrisno. SH.M.Hum.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dr. Ir. Ni Ketut Sari. MT.',
                'nip' => '388071303601'
            ],
            [
                'nama' => 'Dr.Ir.Hamidah Hendrarini,M.Si.',
                'nip' => '388071303601'
            ],
        ]);
        $kepemimpinan->file_support()->create([
            'path' => 'file-support/kepemimpinan.pdf',
            'filename' => 'Jadwal matakuliah Kepemimpinan'
        ]);

        $kewirausahaan = Matakuliah::create([
            "nama" => "Kewirausahaan",
            "slug" => "kewirausahaan",
            "detail" => '<div>Jadwal matakuliah Kewirausahaan</div>'
        ]);
        $kewirausahaan->listDosen()->createMany([
            [
                'nama' => 'Adibah N.Y, St, Bbe, Msc'
            ],
            [
                'nama' => 'Aileena S, C.E.C, St, M.Ds'
            ],
            [
                'nama' => 'Aloysia K, St, M.Ds'
            ],
            [
                'nama' => 'Ardika Nurmawati, St, Mt'
            ],
            [
                'nama' => 'Arief Budiman, S.Ab.M.Ab'
            ],
            [
                'nama' => 'Arista Pratama, S.Kom, M.Kom'
            ],
            [
                'nama' => 'Dra. Diana Amalia, M.Si'
            ],
            [
                'nama' => 'Dr.Ir. Hamidah Hendrarini, M.Si'
            ],
            [
                'nama' => 'Dr. Renny Oktafia, S.E., M.E.I'
            ],
            [
                'nama' => 'Dra. Anna Rumintag Nauli, M.T.'
            ],
            [
                'nama' => 'Dra.Ec. Nurjanti Takarini, M.Si.'
            ],
            [
                'nama' => 'Dra.Ec. Niniel Imaningsih, M.P.'
            ],
            [
                'nama' => 'Dra.Ec. Tituk D.Widajantie, M.Aks.'
            ],
            [
                'nama' => 'Drs.Ec. Muslimin M.Si.'
            ],
            [
                'nama' => 'Drs.Ec. Hery Pudjoprastyono, M.M.'
            ],
            [
                'nama' => 'Dyan Agustin,  St, Mt'
            ],
            [
                'nama' => 'Egan Evanzha Y,  Smn., Mm.'
            ],
            [
                'nama' => 'Fauzatul Laily Nisa,  Se, Me'
            ],
            [
                'nama' => 'Henni Endah W,  S.Kom, M.Kom'
            ],
            [
                'nama' => 'Ika Nawang P,  St.Mt'
            ],
            [
                'nama' => 'Ir. Bambang Wahyudi, M.S.'
            ],
            [
                'nama' => 'Ir. Eendang Pudji Widjajati, M.Mt.'
            ],
            [
                'nama' => 'Ir. Handoyo, M.T.'
            ],
            [
                'nama' => 'Ir. Setyo Parsudi, M.P.'
            ],
            [
                'nama' => 'Muhammad Ilham Naufal, S.A., Mba.'
            ],
            [
                'nama' => 'Ratna Andriani,  St., Mds'
            ],
            [
                'nama' => 'Renova Panjaitan,  St.M'
            ],
            [
                'nama' => 'Reva Edra Nugraha,  Ssi'
            ],
            [
                'nama' => 'Sugiarto,  S.Kom, M.Kom'
            ],
            [
                'nama' => 'Tri Lathif Mardi Suryanto, S.Kom.,M.T.'
            ],
            [
                'nama' => 'Widyasari,  St, Mt'
            ],
            [
                'nama' => 'Wiwin Yulianingsih,  Sh., Mkn'
            ],
            [
                'nama' => 'Dr. Yudiana Indriastuti, S.Sos.,M.Si.'
            ],
            [
                'nama' => 'Zetta Rasullia K,  St,Mt., M.Sc'
            ],
            [
                'nama' => 'Zuhda Mila F,  Sh., L.L.M'
            ],
            [
                'nama' => 'Ika Sari Tondang, S.P., M.Sc.'
            ],
            [
                'nama' => 'Risqi Firdaus Setiawan, S.P., M.P.'
            ],
        ]);
        $kewirausahaan->file_support()->create([
            'path' => 'file-support/kewirausahaan.pdf',
            'filename' => 'Jadwal matakuliah Kewirausahaan'
        ]);

        $belaNegara = Matakuliah::create([
            "nama" => "Pendidikan Bela Negara",
            "slug" => "pendidikan-bela-negara",
            "detail" => '<div>Jadwal matakuliah Pendidikan Bela Negara</div>'
        ]);
        $belaNegara->listDosen()->createMany([
            ['nama' => 'A. Muammar Alawi, S.Pd.I, M.Pd.I'],
            ['nama' => 'Anita Wulansari, S.Kom, M.Kom'],
            ['nama' => 'Ardian Jaya Prasetya, S.T, M.Ds'],
            ['nama' => 'Arief Rachman Hakim, S.H, M.H'],
            ['nama' => 'Arimurti Kriswibowo, Sip, M.Si'],
            ['nama' => 'Asif Faroqi, S.Kom, M.Kom'],
            ['nama' => 'Cholid Fadil, S.Sos.I, M.Pd.I'],
            ['nama' => 'Daisy Marthina Rosyanti, Se, Mm'],
            ['nama' => 'Dhian Satria Y K, S.Kom, M.Kom'],
            ['nama' => 'Dr. Fazlul Rahman, Lc, Ma.Hum'],
        ]);
        $belaNegara->file_support()->create([
            'path' => 'file-support/pendidikan-bela-negara.pdf',
            'filename' => 'Jadwal matakuliah Pendidikan Bela Negara'
        ]);

        $pancasila = Matakuliah::create([
            "nama" => "Pendidikan Pancasila",
            "slug" => "pendidikan-pancasila",
            "detail" => '<div>Jadwal matakuliah Pendidikan Pancasila</div>'
        ]);
        $pancasila->listDosen()->createMany([
            ['nama' => 'Ir. Mutasim Billah, M.S'],
            ['nama' => 'Prof.Dr.Ir. H. Syarif Imam Hidayat, M.M'],
            ['nama' => 'Prof.Dr.Drs.Ec. Syamsul Huda, M.T'],
            ['nama' => 'Dr. Lukman Arif, M.Si'],
            ['nama' => 'Drs. Zawawi, M.Pd'],
            ['nama' => 'Panggung Handoko, S.Sos, S.H, M.M'],
            ['nama' => 'Drs.Ec. Munari, M.M'],
            ['nama' => 'Ir. Setyo Budi Santoso, M.P'],
            ['nama' => 'Ir. Purwadi, M.P'],
            ['nama' => 'Ir. Eko Priyanto, M.P'],
        ]);
        $pancasila->file_support()->create([
            'path' => 'file-support/pendidikan-pancasila.pdf',
            'filename' => 'Jadwal matakuliah Pendidikan Pancasila'
        ]);



        $dosen1 = Dosen::create([
            'nama' => 'Dr.Ir. Sri Mulijani, MT'
        ]);
        $dosen1->struktur()->createMany([
            ['jabatan' => 'Ketua Program MKU'],
            ['jabatan' => 'Koordinator MK Kewirausahaan'],
        ]);

        $dosen2 = Dosen::create([
            'nama' => 'Chrystia Aji Putra, S.Kom.MT'
        ]);
        $dosen2->matakuliah()->attach($kewirausahaan->id);
        $dosen2->struktur()->create(['jabatan' => 'Sekretaris Program MKU']);

        $dosen3 = Dosen::create([
            'nama' => 'Dr. Fazlul Rahman, Lc.MA',
            'keterangan' => 'Agama Islam',
            'nip' => '20119850913247'
        ]);
        $dosen3->matakuliah()->attach($agama->id);
        $dosen3->struktur()->create(['jabatan' => 'Koordinator MK Agama']);

        $dosen4 = Dosen::create([
            'nama' => 'Drs. Kusnarto, M.Si',
            'nip' => '195808011984021000'
        ]);
        $dosen2->matakuliah()->attach($indonesia->id);
        $dosen4->struktur()->create(['jabatan' => 'Koordinator MK Bahasa Indonesia']);

        $dosen5 = Dosen::create([
            'nama' => 'Dr. Wulan Retno Wiganti, M.Pd',
            'nip' => '195808251991032001'
        ]);
        $dosen5->matakuliah()->attach($inggris->id);
        $dosen5->struktur()->create(['jabatan' => 'Koordinator MK Bahasa Inggris']);

        $dosen6 = Dosen::create([
            'nama' => 'Prof.Dr.Ir. Syarif Imam Hidayat, MM'
        ]);
        $dosen6->struktur()->create(['jabatan' => 'Koordinator MK Kewarganegaraan']);

        $dosen7 = Dosen::create([
            'nama' => 'Ir. Sigit Dwi Nugroho, M.Pkn'
        ]);
        $dosen7->matakuliah()->attach($pancasila->id);
        $dosen7->struktur()->create(['jabatan' => 'Koordinator MK Pancasila']);

        $dosen8 = Dosen::create([
            'nama' => 'Dra. Sri Wibawani, M.Si'
        ]);
        $dosen8->matakuliah()->attach($belaNegara->id);
        $dosen8->struktur()->create(['jabatan' => 'Koordinator MK Bela Negara']);

        $dosen9 = Dosen::create([
            'nama' => 'Dr. Ertien Rining Nawangsari, M.Si'
        ]);
        $dosen9->matakuliah()->attach($kepemimpinan->id);
        $dosen9->struktur()->create(['jabatan' => 'Koordinator MK Kepemimpinan']);
    }
}
