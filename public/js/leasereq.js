let leasemodals = document.querySelectorAll('.modal[id*="req"]');


leasemodals.forEach(modal => {
    let terms = modal.querySelectorAll('#durationinput input')
    let startdate = modal.querySelector('[name="startdate"]');
    let enddate = modal.querySelector('[name="enddate"]');




    startdate.addEventListener('change', () => {
            let sdate = new Date(startdate.value);
            let years = Number(modal.querySelector('[name="years"]').value);
            let months = Number(modal.querySelector('[name="months"]').value);
            let weeks = Number(modal.querySelector('[name="weeks"]').value);
            let days = Number(modal.querySelector('[name="days"]').value);
            let cenddate =  getenddate(sdate, years,months,weeks,days);
            enddate.value = datetostring(cenddate);
            modal.querySelector('.totalcost span').innerHTML = numberWithCommas(calculatecost(Number(modal.dataset.price), years,months,weeks,days));
            modal.querySelector('[name="totalcost"]').value = tcost;
    })

    terms.forEach(term => {
        term.addEventListener('change', () => {
            let sdate = new Date(startdate.value);
            let years = Number(modal.querySelector('[name="years"]').value);
            let months = Number(modal.querySelector('[name="months"]').value);
            let weeks = Number(modal.querySelector('[name="weeks"]').value);
            let days = Number(modal.querySelector('[name="days"]').value);
            let cenddate =  getenddate(sdate, years,months,weeks,days);
            enddate.value = datetostring(cenddate);
            let tcost = calculatecost(Number(modal.dataset.price), years,months,weeks,days);
            modal.querySelector('.totalcost span').innerHTML = numberWithCommas(tcost);
            modal.querySelector('[name="totalcost"]').value = tcost;
        })
    })


})



function getenddate(date, years, months, weeks, days){

    date.setFullYear(date.getFullYear() + years);
    date.setMonth(date.getMonth() + months);
    date.setDate(date.getDate() + (weeks * 7) + days);
    return date
}


function datetostring(date){
    // let dd = date.getDate();
    // let mm = date.getMonth() + 1; //January is 0!
    // let yyyy = date.getFullYear();

    // if (dd < 10) {
    //     dd = '0' + dd;
    // }
    // if (mm < 10) {
    //     mm = '0' + mm;
    // }
    // let sdate = yyyy + '-' + mm + '-' + dd;

    let sdate = date.toISOString().split('T')[0];
    return sdate;
}

function curDate(){

    return datetostring(new Date());
}


function calculatecost(price,years,months,weeks,days){
    let cost =
        price / 3.8 * years +
        price / 48 * months +
        price / 200 * weeks +
        price / 1360 * days

    return Math.round(cost);
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
