function totalClick(index, click) {
    const totalClicks = document.getElementById(`totalClicks${index}`);
    const currentClicks = parseInt(totalClicks.innerText);
    const sumValue = currentClicks + click;

    totalClicks.innerText = Math.max(0, sumValue); // Set totalClicks to 0 if sumValue is negative

    console.log(totalClicks.innerText); // Logging the updated totalClicks value
}

const gambar = document.querySelector("#gambar");
const imgPreview = document.querySelector(".img-preview");

imgPreview.style.display = "block";
