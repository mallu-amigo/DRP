//coding the menu side bar

var menu = document.getElementById('menu_icon');
menu.addEventListener('click', function () {
    var sidebar = document.getElementsByClassName('side_bar')[0];
    sidebar.classList.remove('animate__slideOutLeft');
    sidebar.classList.add('animate__slideInLeft');
    sidebar.style.display = 'block';
    document.getElementsByClassName('overlay')[0].style.display = 'block';
    document.body.style.overflow = 'hidden';

});

document.getElementById('close_icon').addEventListener('click', function () {

    var sidebar = document.getElementsByClassName('side_bar')[0];
    sidebar.classList.remove('animate__slideInLeft');
    sidebar.classList.add('animate__slideOutLeft');
    document.body.style.overflow = 'auto';

    setTimeout(function () {
        sidebar.style.display = 'none';
        document.getElementsByClassName('overlay')[0].style.display = 'none';

    }, 300);

});

//coding the side bar menu items

//volunteer

var vol = document.getElementsByClassName('volunteer')[0];
var side_bar = document.getElementsByClassName('overlay')[0];
vol.addEventListener('click', function () {
    window.location.href = '../home/home.html#volunteer_section';
    side_bar.style.display = 'none';

});

//contact

var contact = document.getElementsByClassName('contact')[0];
contact.addEventListener('click', function () {
    window.location.href = '#footer';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
});

//home

var home = document.getElementsByClassName('home')[0];
home.addEventListener('click', function () {
    window.location.href = '../home/home.php#hero';
    var side_bar = document.getElementsByClassName('overlay')[0];
    side_bar.style.display = 'none';
})

//donate

var home = document.getElementsByClassName('donate')[0];
home.addEventListener('click', function () {
    window.location.href = '../donation/donation.php';
    side_bar.style.display = 'none';
    document.body.style.overflow = 'auto';
    
})


//repoting disaster

var report = document.getElementsByClassName('report_disaster')[0];
report.addEventListener('click', function () {
    window.location.href = '../home/home.html';
    var side_bar = document.getElementsByClassName('overlay')[0];
    side_bar.style.display = 'none';
})

