//function openNav() {
//    document.getElementById("mySidenav").style.width = "250px";
//    document.getElementById("mySidenavOverlay").style.display = "block";
//}
//
//function closeNav() {
//    document.getElementById("mySidenav").style.width = "0";
//    document.getElementById("mySidenavOverlay").style.display = "none";
//}


$(document).ready(function () {

    $(".toggle_nav").click(function () {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("mySidenavOverlay").style.display = "block";
    })

    $(".closebtn").click(function () {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mySidenavOverlay").style.display = "none";
    })


    $('.bullet').first().addClass('active');
    $('.slider-item').first().addClass('active');

    $('.bullet').click(function () {
        var $this = $(this);
        var $siblings = $this.parent().children();
        var position = $siblings.index($this);

        $('.slider-item').removeClass('active').eq(position).addClass('active');
        $('.bullet').removeClass('active').eq(position).addClass('active');
    });

    $('.next, .prev').click(function () {
        var $this = $(this);
        var current = $('.slider-items').find('.active');
        var position = $('.slider-items').children().index(current);
        var numItems = $('.slider-item').length;

        if ($this.hasClass('next')) {
            if (position < numItems - 1) {
                $('.active').removeClass('active').next().addClass('active');
            } else {
                $('.slider-item').removeClass('active').first().addClass('active');
                $('.bullet').removeClass('active').first().addClass('active');
            }
        } else {
            if (position === 0) {
                $('.slider-item').removeClass('active').last().addClass('active');
                $('.bullet').removeClass('active').last().addClass('active');
            } else {
                $('.active').removeClass('active').prev().addClass('active');
            }
        }
    });

})


