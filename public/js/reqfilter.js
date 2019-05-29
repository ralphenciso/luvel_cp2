let requests = document.querySelectorAll('[data-status]')
let filters = document.querySelectorAll('#reqfilter label');

console.log(filters);

filters.forEach(filter => {

    filter.addEventListener('click', () => {
        let status = filter.dataset.filter;


        requests.forEach(request => {
            if(status === 'all' || status === request.dataset.status){
                request.classList.remove('d-none')
            } else {
                request.classList.add('d-none')
            }
        })
    })

})
