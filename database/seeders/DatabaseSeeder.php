<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kategori;
use App\Models\Matakuliah;
use App\Models\Post;
use App\Models\StrukturOrganisasi;
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
            "name" => "Grandonk",
            "email" => "grandonk.cm@gmail.com",
            "password" => bcrypt("66666666")
        ]);

        Kategori::create([
            "nama" => "Berita",
            "slug" => "berita"
        ]);
        Kategori::create([
            "nama" => "Pengumuman",
            "slug" => "pengumuman"
        ]);

        Post::factory()->count(20)->create();



        $agamaIslam = Matakuliah::create([
            "nama" => "Pendidikan Agama Islam",
            "slug" => "pendidikan-agama-islam",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Agama Islam<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-agama.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-agama.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-agama.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $agamaIslam->listDosen()->createMany([
            ['nama' => 'A. Muammar Alawi, S.Pd.I, M.Pd.I'],
            ['nama' => 'Drs. Imam Ghozali, M.M'],
            ['nama' => 'Saifuddin Zuhri. M.Si, Drs'],
            ['nama' => 'Rohmatul Faizah, S.Pd.I, M.Pd.I'],
            ['nama' => 'Taufikurrahman, S.Pd, M.Pd'],
            ['nama' => 'Erwin K, S.Th.I, M.Pd'],
            ['nama' => 'Cholid Fadil, S.Sos.I, M.Pd.I'],
        ]);

        $agamaKatolik = Matakuliah::create([
            "nama" => "Pendidikan Agama Katolik",
            "slug" => "pendidikan-agama-katolik",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Agama Katolik<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-agama.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-agama.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-agama.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $agamaKatolik->listDosen()->create(['nama' => 'Drs. Sony Wiliams Ss, M.Hum']);

        $agamaHindu = Matakuliah::create([
            "nama" => "Pendidikan Agama Hindu",
            "slug" => "pendidikan-agama-hindu",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Agama Hindu<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-agama.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-agama.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-agama.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $agamaHindu->listDosen()->create(['nama' => 'Niluh P K, Se, S.Pdh, M.Pdh']);

        $agamaBudha = Matakuliah::create([
            "nama" => "Pendidikan Agama Budha",
            "slug" => "pendidikan-agama-budha",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Agama Budha<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-agama.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-agama.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-agama.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $agamaBudha->listDosen()->create(['nama' => 'Suranto, S. Ag, M. A']);

        $agamaKristen = Matakuliah::create([
            "nama" => "Pendidikan Agama Kristen",
            "slug" => "pendidikan-agama-kristen",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Agama Kristen<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-agama.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-agama.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-agama.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-agama.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $agamaKristen->listDosen()->createMany([
            ['nama' => 'Pdt. Abraham Lalong L, Ma'],
            ['nama' => 'Andreas Jonathan, Ph.D'],
        ]);

        $indonesia = Matakuliah::create([
            "nama" => "Bahasa Indonesia",
            "slug" => "bahasa-indonesia",
            "detail" => '<div>Berikut ini jadwal matakuliah Bahasa Indonesia<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;bahasa-indonesia.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/bahasa-indonesia.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/bahasa-indonesia.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/bahasa-indonesia.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">bahasa-indonesia.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $indonesia->listDosen()->createMany([
            ['nama' => 'Adelia S, S.Hum, M.Hum'],
            ['nama' => 'Ahmad Suyuti, S.Pd, M.A'],
            ['nama' => 'Dewi Puspa A, S.Pd, M.Pd'],
            ['nama' => 'Endang S, Dr. S.Pd, M.Pd'],
            ['nama' => 'Siti Ning Farida, Dra. M.Si'],
            ['nama' => 'Ilmatus S, S.Pd., M.Hum'],
            ['nama' => 'Dra. Peni Cahya Cartika, M.Si'],
            ['nama' => 'Dr. Eko Hardianto, M.Pd'],
        ]);

        $inggris = Matakuliah::create([
            "nama" => "Bahasa Inggris",
            "slug" => "bahasa-inggris",
            "detail" => '<div>Berikut ini jadwal matakuliah Bahasa Inggris<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;bahasa-inggris.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/bahasa-inggris.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/bahasa-inggris.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/bahasa-inggris.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">bahasa-inggris.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $inggris->listDosen()->createMany([
            ['nama' => 'Dr. Rosida, S.Tp, M.P'],
            ['nama' => 'Dr. Zainal Abidin Achmad, S.Sos, M.Si'],
            ['nama' => 'Laksmi Diana, S.S, M.Pd'],
            ['nama' => 'Kinanti Resmi Hayati, S.Hum, M.A'],
            ['nama' => 'Navisatul Izzah, S.Pd, M.Tesol'],
            ['nama' => 'Wahyu Kyestiati Sumarno, S.Pd, M.Ed, M.Pd'],
            ['nama' => 'Dwi Wahyuningtyas, S.Pd, M.A'],
            ['nama' => 'Drs. Suprapto, M.Hum'],
            ['nama' => 'Dr.Drs. Sukirmiyadi, M.Pd'],
            ['nama' => 'Hendra Sudarso S.Pd, M.Pd'],
        ]);

        $kepemimpinan = Matakuliah::create([
            "nama" => "Kepemimpinan",
            "slug" => "kepemimpinan",
            "detail" => '<div>Berikut ini jadwal matakuliah Kepemimpinan<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;kepemimpinan.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/kepemimpinan.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/kepemimpinan.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/kepemimpinan.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">kepemimpinan.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $kepemimpinan->listDosen()->createMany([
            ['nama' => 'Ario Bimo Utomo, S.Ip, M.I.R'],
            ['nama' => 'Budi Prabowo, S.Sos, Mm'],
            ['nama' => 'Dr. I Gede Susrama Masdiyasa, S.T, M.Kom'],
            ['nama' => 'Ir. Minto Waluyo, Dr. Mmt'],
            ['nama' => 'Dra. Ety Dwi Susanti, M.Si'],
            ['nama' => 'Dra. Sri Wibawani, M.Si'],
            ['nama' => 'Dr.Dra. Ertien Rining Nawangsari, M.Si'],
            ['nama' => 'Dra. Herlina Suksmawati, M.Si'],
            ['nama' => 'Ir. Bambang Wahyudi, M.S'],
            ['nama' => 'Praja Firdaus Nuryananda, S.Hub.Int, M.Hub.Int'],
        ]);

        $kewirausahaan = Matakuliah::create([
            "nama" => "Kewirausahaan",
            "slug" => "kewirausahaan",
            "detail" => '<div>Berikut ini jadwal matakuliah Kewirausahaan<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;kewirausahaan.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/kewirausahaan.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/kewirausahaan.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/kewirausahaan.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">kewirausahaan.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
        ]);
        $kewirausahaan->listDosen()->createMany([
            ['nama' => 'Adibah N.Y, St, Bbe, Msc'],
            ['nama' => 'Aileena S, C.E.C, St, M.Ds'],
            ['nama' => 'Aloysia K, St, M.Ds'],
            ['nama' => 'Ardika Nurmawati, St, Mt'],
            ['nama' => 'Arief Budiman, S.Ab.M.Ab'],
            ['nama' => 'Arista Pratama, S.Kom, M.Kom'],
            ['nama' => 'Dra. Diana Amalia, M.Si'],
            ['nama' => 'Dr.Ir. Hamidah Hendrarini, M.Si'],
            ['nama' => 'Dr.Ir. Pawana Nur Indah, M.Si'],
            ['nama' => 'Dr. Nur Aini Fauziyah, S.Pd, M.Si'],
        ]);

        $belaNegara = Matakuliah::create([
            "nama" => "Pendidikan Bela Negara",
            "slug" => "pendidikan-bela-negara",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Bela Negara<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-bela-negara.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-bela-negara.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-bela-negara.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-bela-negara.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-bela-negara.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
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

        $pancasila = Matakuliah::create([
            "nama" => "Pendidikan Pancasila",
            "slug" => "pendidikan-pancasila",
            "detail" => '<div>Berikut ini jadwal matakuliah Pendidikan Pancasila<br>
            <figure
              data-trix-attachment="{&quot;contentType&quot;:&quot;application/pdf&quot;,&quot;filename&quot;:&quot;pendidikan-pancasila.pdf&quot;,&quot;filesize&quot;:17267,&quot;href&quot;:&quot;' . asset("storage/attachment/pendidikan-pancasila.pdf") . '&quot;,&quot;url&quot;:&quot;' . asset("storage/attachment/pendidikan-pancasila.pdf") . '&quot;}"
              data-trix-content-type="application/pdf"
              class="attachment attachment--file attachment--pdf"><a
                href="' . asset("storage/attachment/pendidikan-pancasila.pdf") . '">
                <figcaption class="attachment__caption"><span
                    class="attachment__name">pendidikan-pancasila.pdf</span> <span
                    class="attachment__size">16.86 KB</span></figcaption>
              </a></figure>
          </div>'
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
            'nama' => 'Dr. Fazlul Rahman, Lc.MA'
        ]);
        $dosen2->matakuliah()->attach($agamaIslam->id);
        $dosen3->struktur()->create(['jabatan' => 'Koordinator MK Agama']);

        $dosen4 = Dosen::create([
            'nama' => 'Drs. Kusnarto, M.Si'
        ]);
        $dosen2->matakuliah()->attach($indonesia->id);
        $dosen4->struktur()->create(['jabatan' => 'Koordinator MK Bahasa Indonesia']);

        $dosen5 = Dosen::create([
            'nama' => 'Dr. Wulan Retno Wiganti, M.Pd'
        ]);
        $dosen2->matakuliah()->attach($inggris->id);
        $dosen5->struktur()->create(['jabatan' => 'Koordinator MK Bahasa Inggris']);

        $dosen6 = Dosen::create([
            'nama' => 'Prof.Dr.Ir. Syarif Imam Hidayat, MM'
        ]);
        $dosen6->struktur()->create(['jabatan' => 'Koordinator MK Kewarganegaraan']);

        $dosen7 = Dosen::create([
            'nama' => 'Ir. Sigit Dwi Nugroho, M.Pkn'
        ]);
        $dosen2->matakuliah()->attach($pancasila->id);
        $dosen7->struktur()->create(['jabatan' => 'Koordinator MK Pancasila']);

        $dosen8 = Dosen::create([
            'nama' => 'Dra. Sri Wibawani, M.Si'
        ]);
        $dosen2->matakuliah()->attach($belaNegara->id);
        $dosen8->struktur()->create(['jabatan' => 'Koordinator MK Bela Negara']);

        $dosen9 = Dosen::create([
            'nama' => 'Dr. Ertien Rining Nawangsari, M.Si'
        ]);
        $dosen2->matakuliah()->attach($kepemimpinan->id);
        $dosen9->struktur()->create(['jabatan' => 'Koordinator MK Kepemimpinan']);
    }
}
