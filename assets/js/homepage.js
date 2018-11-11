$(document).ready(function () {

    // collapse sidebar
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        if($(window).width() <= 768){
            $('#main').toggleClass('hide');
            $('#nameHome').toggleClass('hide');
        }
    });

    // Home button
    $('#btnHome').on('click', function () {
        var baseUrl = $('#baseUrl').val();
        window.location.replace(baseUrl);
    });

    // Sidebar Home Button
    $('#homeBtn').on('click', function () {
        $('#mainContainer').removeClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
    });

    // Sidebar Housemate Button
    $('#housemateBtn').on('click', function () {
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').removeClass('hide');
        $('#financeContainer').addClass('hide');
    });

    // Sidebar Finance Button
    $('#financeBtn').on('click', function () {
        $('#mainContainer').addClass('hide');
        $('#taskContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').removeClass('hide');
    });

    // Sidebar Task Button
    $('#btnTask').on('click', function () {
        $('#taskContainer').removeClass('hide');
        $('#mainContainer').addClass('hide');
        $('#housemateContainer').addClass('hide');
        $('#financeContainer').addClass('hide');
    });
});