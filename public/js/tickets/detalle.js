function init() {

}

$(document).ready(function(){

    var tick_id = getUrlParameter('id');

    $.post("../../controller/ticket.php?op=listar_detalle", {tick_id: tick_id}, function(data) {
        $('#lbldetalle').html(data);
    });

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }

};

init();