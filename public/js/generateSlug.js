const judul = document.querySelector("#judul");
const slug = document.querySelector("#slug");

const generateSlug = () => {
    fetch(`/admin/post/createSlug?judul=${judul.value}`)
        .then((res) => res.json())
        .then((data) => (slug.value = data.slug))
        .catch((err) => console.log(err));
};

judul.addEventListener("change", () => {
    generateSlug();
});
