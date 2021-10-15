@extends("layouts.main")

@section("meta")

@include("partials.site-meta", [
  "title" => $title,
  "image" => asset("profil-hero.jpg"),
  "keywords" => "mku, profil, visi, misi, upn, jatim",
  "description" => "Profil Visi Dan Misi Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur"
])

@endsection

@section("content")

@include("partials.hero-section", [
  "text" => "Profil MKU",
  "image" => asset("profil-hero.jpg")
])

<main id="visi-misi" class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-6">
    @include("partials.section-title", ["text" => "Visi"])
  </div>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum voluptatem
    rem itaque doloribus modi, praesentium asperiores suscipit dolorem, sint
    magnam laborum corporis dolore deserunt accusantium alias? Vel voluptate
    culpa expedita, animi repudiandae fugiat cum praesentium, nisi accusamus
    dolorem maxime, hic reprehenderit nulla ad. Quasi excepturi impedit vero.
    Nihil, enim. Dignissimos voluptates voluptas eligendi expedita animi
    accusantium enim perferendis nulla asperiores ipsam omnis voluptatem
    sapiente obcaecati unde harum quod iure doloribus tempora.
  </p>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores et repellat
    illo sed nesciunt similique, repellendus rerum quasi aut iure ut recusandae,
    quas debitis eos. Animi facilis odio error itaque quis adipisci modi
    accusamus, sunt, voluptates ducimus doloremque, debitis in fugiat atque eius
    officiis commodi ipsum ex! Dicta, quisquam sit?
  </p>

  <div class="mb-6 mt-12">
    @include("partials.section-title", ["text" => "Misi"])
  </div>
  <p>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum
    exercitationem molestias nisi esse a veritatis obcaecati pariatur
    voluptatibus rerum aspernatur sit, nulla ratione ut dolor ab eum! Voluptates
    assumenda non aliquam sed blanditiis, aspernatur soluta adipisci ipsa sint
    rerum. Non nisi at ducimus veniam expedita eaque quibusdam eos vel eveniet,
    quas numquam.
  </p>
  <p>
    Repudiandae inventore nesciunt molestiae necessitatibus eius, veniam unde ut
    ratione facilis dolor consequuntur aperiam corporis iusto autem, soluta nam
    blanditiis quo deleniti. Illum dolor aliquid iure laborum odio minus
    dolorem.
  </p>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam a dolorem
    fugiat nostrum velit nihil ratione perferendis, mollitia, tenetur voluptates
    itaque illo aliquam expedita maxime natus explicabo nesciunt ipsa ducimus
    hic aliquid. Repudiandae pariatur nobis explicabo inventore repellendus
    atque tenetur?
  </p>
</main>

@endsection