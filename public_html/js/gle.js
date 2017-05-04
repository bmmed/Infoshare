

function slide()
{
 e=document.querySelector('.menue_contenair');
 if (e.className=="menue_contenair slide")
 {
  e.className="menue_contenair";
 }
 else e.className="menue_contenair slide";

}


 /* pour box suprimer compte dans compte */
 function box_sup()
 {
  $( ".box_sup" ).hide();
  $( ".box_sup_valide" ).hide();
  $( ".slide_sup" ).click(function() {
   $( ".box_sup_valide" ).hide();
   $( this).next().slideToggle( "slow", function() {

   });
  });

  $( ".btn_sup_oui" ).click(function() {
   $( this).parent().next().slideToggle( "slow", function() {

   });
  });


  $( ".btn_sup_non" ).click(function() {
   $( this).parent().hide("slow");
   $( ".box_sup_valide" ).hide("slow");
  });
 }
 box_sup();

 /***********************************/

 function res_dif()
 {
  $( ".res_dif:odd" ).css( "background-color", "rgba(148, 148, 148, 0.23)" );
 }
 res_dif();
 






$(document).ready(function($) {


 
 window.onload=init();


 function ctrl_moz()
 {
  nav=navigator.userAgent;
  if((nav.indexOf('Firefox')>=0)||(nav.indexOf('Trident')>=0))
  {
   a=document.querySelector('.btn_menue_side');
   a.className=(a.className+" mozila");

  }
 }
 




 
  function init()
 {
  ctrl_moz();
 }


 /* pour box user */
 $( ".box_user" ).hide();
 $( ".img_user" ).click(function() {
  $( ".box_user" ).slideToggle( "slow", function() {

  });
 });
 /***********************************/

 /******pour l'article ***/


 $( ".detail_article" ).hide();
 $( ".btn_plus_inf" ).click(function() {
$( ".detail_article" ).not($(this).next()).hide("slow");
  $(this).next().slideToggle( "slow", function() {
   
});
  
 });
 /***********************************/


 /* pour box cnx dans index */
 $( ".box_cnx" ).hide();
 $( ".slide_cnx" ).click(function() {
  $( ".box_cnx" ).slideToggle( "slow", function() {

  });
 });

 $( ".box_cnx" ).hide();
 $( ".cnx" ).click(function() {
  $( ".box_cnx" ).show( "slow", function() {

  });
 });
 /***********************************/


 /* pour box ajouter fichier et rechercher fichier */
 $( ".box_ajout" ).hide();
 $( ".slide_ajout" ).click(function() {
  $( ".box_rech" ).hide("slow");
  $( ".box_ajout" ).slideToggle( "slow", function() {


  });
 });



 $( ".slide_rech" ).click(function() {
  $( ".box_ajout" ).hide("slow");
  $( ".box_rech" ).slideToggle( "slow", function() {

  });
 });
 /***********************************/





 /******pour la rech detail de user ***/


 $( ".user_rech_detail" ).hide();
 $( ".slide_rech_user" ).click(function() {

  $( this).next().slideToggle( "slow", function() {

  });
  $( ".user_rech_detail" ).hide();
 });
 /***********************************/

 /******pour resultat de rech detail de user ***/


 $( ".res_detail_user" ).hide();
 $( ".res_slide_detail" ).click(function() {
  $(this ).hide();
  $( this).next().fadeIn(function() {

  });

 });
 /***********************************/







 /************************** effect d'ancre smoothie ********************************/
 $(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
   if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    if (target.length) {
     $('html, body').animate({
      scrollTop: target.offset().top
     }, 1000);
     return false;
    }
   }
  });
 });
 /**************************                 ********************************/
function set_footer()
{

 var t_wind=window.screen.availHeight;
 var t_doc=$(document).height()+40;
/* alert(t_doc +' '+ t_wind);*/
 if(t_doc < t_wind)
 {
  $('footer').css({ "position": "absolute", "bottom": "0" });
 }
 else{
 $('footer').css({ "position": "relative", "bottom": "inherit" });
 } 
}
 $(window).resize(function () {
  set_footer();
                              });
 set_footer();

});

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80577320-1', 'auto');
  ga('send', 'pageview');

