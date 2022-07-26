$(document).ready(function () {
    AOS.init();
    $(document).on("scroll", onScroll);
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
        window.location.hash = "";
        $('html, body').stop().animate({
            scrollTop: $($.attr(this, 'href')).offset().top + (-80)
        }, 100, 'swing', function () {
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(){
    console.clear();
    history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
    var scrollPos = $(this).scrollTop() + 90;
    $('#navbarSupportedContent .activated').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#navbarSupportedContent ul li .activated').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}