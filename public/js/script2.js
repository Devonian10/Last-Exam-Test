function totalClick(index, click, maxStock) {
    var totalClicks = document.getElementById(`totalClicks${index}`);
    var currentClicks = parseInt(totalClicks.innerText);
    var sumValue = currentClicks + click;

    totalClicks.innerText = Math.max(0, sumValue); // Set totalClicks to 0 if sumValue is negative

    if (sumValue >= 0 && sumValue <= maxStock) {
        totalClicks.innerText = sumValue;
    }
    console.log(totalClicks.innerText); // Logging the updated totalClicks value
}
