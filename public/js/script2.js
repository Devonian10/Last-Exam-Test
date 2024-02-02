function totalClick(click) {
    const totalClicks =document.getElementById('totalClicks');
    const sumvalue = parseInt(totalClicks.innerText)+click;
    console.log(sumvalue + click);
    totalClicks.innerText = sumvalue;

    if (sumvalue < 0){
        totalClicks.innerText=0;
    } if (click === 0){
        totalClicks.innerText=0
    }
}