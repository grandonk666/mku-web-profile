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
        // \App\Models\User::factory(10)->create();

        User::create([
            "name" => "Grandonk",
            "email" => "grandonk457@gmail.com",
            "password" => bcrypt("66666666")
        ]);

        Dosen::create([
            "nama" => "Ryan",
            "nip" => "0897138768623"
        ]);
        Dosen::create([
            "nama" => "Smith",
            "nip" => "0897138743532"
        ]);
        Dosen::create([
            "nama" => "Alexa",
            "nip" => "0897131334341"
        ]);
        Dosen::create([
            "nama" => "Bruno",
        ]);
        Dosen::create([
            "nama" => "Paulo",
        ]);

        Matakuliah::create([
            "nama" => "Bahasa Indonesia",
            "kode" => "G0023",
            "dosen_id" => 5
        ]);
        Matakuliah::create([
            "nama" => "Bahasa Indonesia",
            "kode" => "G0024",
            "dosen_id" => 5
        ]);
        Matakuliah::create([
            "nama" => "Agama Islam",
            "kode" => "G0034",
            "dosen_id" => 4
        ]);
        Matakuliah::create([
            "nama" => "Agama Islam",
            "kode" => "G0032",
            "dosen_id" => 4
        ]);
        Matakuliah::create([
            "nama" => "Bahasa Inggris",
            "kode" => "G0045",
            "dosen_id" => 3
        ]);
        Matakuliah::create([
            "nama" => "Bahasa Inggris",
            "kode" => "G0047",
            "dosen_id" => 3
        ]);
        Matakuliah::create([
            "nama" => "Bela Negara",
            "kode" => "G0014",
            "dosen_id" => 2
        ]);
        Matakuliah::create([
            "nama" => "Bela Negara",
            "kode" => "G0017",
            "dosen_id" => 2
        ]);
        Matakuliah::create([
            "nama" => "Pendidikan Pancasila",
            "kode" => "G0057",
            "dosen_id" => 1
        ]);
        Matakuliah::create([
            "nama" => "Pendidikan Pancasila",
            "kode" => "G0052",
            "dosen_id" => 1
        ]);

        StrukturOrganisasi::create([
            "jabatan" => "Koordinator",
            "dosen_id" => 1
        ]);
        StrukturOrganisasi::create([
            "jabatan" => "Wakil Koordinator",
            "dosen_id" => 2
        ]);

        Kategori::create([
            "nama" => "Berita",
            "slug" => "berita"
        ]);
        Kategori::create([
            "nama" => "Pengumuman",
            "slug" => "pengumuman"
        ]);

        Post::create([
            "judul" => "Post Pertama",
            "kategori_id" => 1,
            "slug" => "post-pertama",
            "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad,",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?</p><p>Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.</p><p>Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?</p><p>Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?</p><p> Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.</p>",
        ]);
        Post::create([
            "judul" => "Post Kedua",
            "kategori_id" => 2,
            "slug" => "post-kedua",
            "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad,",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?</p><p>Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.</p><p>Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?</p><p>Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?</p><p> Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.</p>",
        ]);

        Post::create([
            "judul" => "Post Ketiga",
            "kategori_id" => 2,
            "slug" => "post-ketiga",
            "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad,",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?</p><p>Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.</p><p>Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?</p><p>Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?</p><p> Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.</p>",
        ]);

        Post::create([
            "judul" => "Post Keempat",
            "kategori_id" => 2,
            "slug" => "post-keempat",
            "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad,",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?</p><p>Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.</p><p>Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?</p><p>Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?</p><p> Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.</p>",
        ]);

        Post::create([
            "judul" => "Post Kelima",
            "kategori_id" => 1,
            "slug" => "post-kelima",
            "excerpt" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad,",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi nisi eaque ratione, laborum expedita dolore repudiandae beatae, rerum ad, eos cum perferendis dolorum deserunt corrupti aperiam fugit. Non, iure tempore?</p><p>Nesciunt, voluptate nobis. Ratione nulla molestiae laborum nam esse atque nostrum unde quos totam suscipit aperiam dolorum reprehenderit dolores consectetur iusto tempora quae ex velit illo maiores commodi, at pariatur.</p><p>Ullam harum minima molestiae quaerat nam esse ducimus earum nisi, asperiores magnam. Molestiae aliquam repellat animi minima amet labore, modi ad voluptatibus cupiditate natus ipsum, perferendis quia expedita officia perspiciatis?</p><p>Id corporis facere itaque possimus delectus nisi molestias, nihil tempora vitae sequi deleniti fuga adipisci. Voluptatem harum, eaque hic facere minima dignissimos voluptates eius. Quo reprehenderit architecto possimus unde provident?</p><p> Eaque corporis, enim nulla placeat suscipit vitae corrupti rem provident consequatur voluptates laboriosam omnis. Doloremque alias eaque repellat nihil, tempore minima officiis, impedit assumenda repellendus soluta mollitia ut dignissimos tempora.</p>",
        ]);
    }
}
