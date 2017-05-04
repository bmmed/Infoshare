

$( ".detail_msg" ).hide();
$( ".rep_form" ).hide();
$( ".msg_titre" ).click(function() {
	$( ".rep_form" ).hide();
$( this).next().next().slideToggle( "slow", function() {
   
  });
});

$( ".btn_rep" ).click(function() {
$( this).next().slideToggle( "slow", function() {
   
  });
});


$( ".msg_form" ).hide();
$( ".logo_ajt_msg" ).click(function() {
$( this).next().slideToggle( "slow", function() {
   
  });
});
