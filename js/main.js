$(document).ready(function () {
    //shows hidden tab-content whose display is set as none.
    //if this line is removed adn display is not set as none..page flickers
    $('.tab-content').show();
    $('.side-navbar ul li:first').addClass('active');
    $('.tab-content:not(:first)').hide();
    $('.side-navbar ul li a').click(function (event) {
        event.preventDefault();
        var content = $(this).attr('href');
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        $(content).show();
        $(content).siblings('.tab-content').hide();
    });
});