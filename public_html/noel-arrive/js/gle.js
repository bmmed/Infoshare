
$(document).ready(function() {

    $('#clock').countdown('2016/12/25', function (event) {
        $(this).html(event.strftime(''
            + '<div class="clock_unit"><div class="clock_digit"><p>%D</p></div> <div class="clock_label"><p>Jours</p></div></div> '
            + '<div class="clock_unit"><div class="clock_digit"><p>%H</p></div> <div class="clock_label"><p>Heurs</p></div> </div>'
            + '<div class="clock_unit"><div class="clock_digit"><p>%M</p></div> <div class="clock_label"><p>Minutes</p></div> </div> '
            + '<div class="clock_unit"><div class="clock_digit"><p>%S</p></div> <div class="clock_label"><p>Secondes</p></div> </div>'));
    });



    $( ".date_bottom" ).hide();
        $(document).on("click", ".show_day .date_top ", function() {
            $( ".date_bottom" ).not($(this).next()).hide("slow");
            $( ".date_top" ).removeClass("day_active");
            $(this).addClass("day_active");
            $(this).next().slideToggle( "slow", function() {


            });

    });

});

