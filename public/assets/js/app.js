
$(document).ready(function(){
    $('.btn-toggle-navbar').on('click', function(){
        $('.main-screen').toggleClass('open-sidebar')
    });

    new DataTable('#example', {
        responsive: true
    });
})