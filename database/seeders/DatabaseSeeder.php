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

        Dosen::factory()->count(10)->create();

        Matakuliah::factory()->count(10)->create();

        StrukturOrganisasi::create([
            "jabatan" => "Koordinator",
            "dosen_id" => 1
        ]);
        StrukturOrganisasi::create([
            "jabatan" => "Wakil Koordinator",
            "dosen_id" => 2
        ]);
        StrukturOrganisasi::create([
            "jabatan" => "Kepala Laboratorium",
            "dosen_id" => 3
        ]);
        StrukturOrganisasi::create([
            "jabatan" => "Ketua Redaksi",
            "dosen_id" => 4
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
    }
}
