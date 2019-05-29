let items = document.querySelectorAll('.itemslist li');
let modefilters = document.querySelectorAll('#modefilter label');
let typefilters = document.querySelectorAll('#typefilter label');
let mode = 'modeall';
let type = 'typeall';
let asc = document.querySelector('#sortasc');
let desc = document.querySelector('#sortdesc');

modefilters.forEach(el => {
    el.addEventListener('click', () => {
        mode = el.querySelector('input').id;
        filter();
    })
});

typefilters.forEach(el => {
    el.addEventListener('click', () => {
        type = el.querySelector('input').id;
        filter();
    })
});

function filter() {
    items.forEach(item => {
        if (
            (mode === 'modeall' || mode === item.dataset.mode) &&
            (type === 'typeall' || type == item.dataset.type)
        ) {
            item.classList.remove('d-none');
        } else {
            item.classList.add('d-none');
        }
    })
}

asc.addEventListener('click', () => {
    sortList(document.querySelector('.itemslist'), 1);
})

desc.addEventListener('click', () => {
    sortList(document.querySelector('.itemslist'), -1);
});


function sortList(ul, key) {
    var new_ul = ul.cloneNode(false);

    // Add all lis to an array
    var lis = [];
    for (var i = ul.childNodes.length; i--; ) {
        if (ul.childNodes[i].nodeName === 'LI') lis.push(ul.childNodes[i]);
    }

    lis.sort(function(a, b) {
        order = parseInt(b.dataset.price) > parseInt(a.dataset.price) ? -1 : 1;
        order *= key
        return order
    });



    // Add them into the ul in order
    for (var i = 0; i < lis.length; i++) new_ul.appendChild(lis[i]);
    ul.parentNode.replaceChild(new_ul, ul);
}


