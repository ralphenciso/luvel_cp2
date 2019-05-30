let requests = document.querySelectorAll('[data-status]')
let statfilter = document.querySelectorAll('#reqfilter label');
let userfilter = document.querySelectorAll('#userfilter label');
let status = 'all';
let user = 'all';


statfilter.forEach(filter => {
    filter.addEventListener('click', () => {
        status = filter.dataset.filter;
        applyfilter();

    })
})

userfilter.forEach(filter => {
    filter.addEventListener('click', () => {
        user = filter.dataset.filter;
        console.log(user);
        applyfilter();
    });
});


function applyfilter() {
    requests.forEach(request => {
        if (
            (status === 'all' || status === request.dataset.status) &&
            (user === 'all' || user === request.dataset.userid)
        ) {
            request.classList.remove('d-none');
        } else {
            request.classList.add('d-none');
        }

        console.log(request.dataset.userid);
    });
}
