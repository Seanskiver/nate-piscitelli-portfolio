$(function() {
	$( '#bb-bookblock' ).bookblock();
});

$('#next').click(function() {
    $('#bb-bookblock').bookblock('next');
});

$('#previous').click(function() {
    $('#bb-bookblock').bookblock('prev');
})