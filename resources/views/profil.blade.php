@extends("layouts.main")

@section("content")

<div
  class="relative w-full min-h-[70vh] md:min-h-screen flex justify-center items-center bg-cover bg-bottom"
  style="background-image: url({{ asset("profil-hero.jpg") }})">
  <div
    class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent bg-black/20 flex justify-center items-center flex-col">
    <div
      class="bg-black/80 flex justify-center items-center  w-11/12 lg:w-4/5 py-12">
      <h1 class="text-4xl lg:text-6xl font-bold text-white text-center">Profil
        MKU</h1>
    </div>
  </div>
</div>

<main id="visi-misi" class="container mx-auto min-h-screen py-12 px-4">
  <div class="mb-6">
    <span class="block w-40 h-1.5 bg-gray-500 rounded-full mb-2"></span>
    <h2 class="text-gray-900 font-bold text-3xl">Visi</h2>
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
    <span class="block w-40 h-1.5 bg-gray-500 rounded-full mb-2"></span>
    <h2 class="text-gray-900 font-bold text-3xl">Misi</h2>
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