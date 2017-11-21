$(document).ready( function() {
    var refreshTime = 60000; // in milliseconds, so 10 minutes
    window.setInterval( function() {
        var url = '../includes/refresh.inc.php';
        $.get( url );
    }, refreshTime );
});