jQuery(document).ready(function($) {
	"use strict";
	/* Count Down */
    $('.zo-count-down').each(function(){
        var $this = $(this);
        var get_date_count_down = $this.find("> span").text();
        if(get_date_count_down.trim() && get_date_count_down.trim() != ""){
            $(this).countdown(get_date_count_down, function(event) {
                var day = zo_replace(event.strftime('%D'));
                $('.zo-count-down-days .zo-count-down-number', $this).html(day);
                var hour = zo_replace(event.strftime('%H'));
                $('.zo-count-down-hours .zo-count-down-number', $this).html(hour);
                var minute = zo_replace(event.strftime('%M'));
                $('.zo-count-down-minutes .zo-count-down-number', $this).html(minute);
                var second = zo_replace(event.strftime('%S'));
                $('.zo-count-down-seconds .zo-count-down-number', $this).html(second);
            });
        }
    });
});

function zo_replace(value){
    var strDay=value.split("");
    var newDay='';
    for(var key=0;key<strDay.length;key++) {
        newDay+="<span>"+strDay[key]+"</span>";
    }
    return newDay;
}
