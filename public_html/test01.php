<script>

  $( function( ) {

    $( ' #conversation' ) . load( ' ac. htm' ) ;
    setInterval( afficheConversation, 4000) ;

  } ) 

  alert('hello');
</script>


<script>
  $( function( ) {

    function maj_cont()
    {
      $('.contenair_msg').load('../php_server/msg_rech.php');
    }
    setInterval(maj_cont,5000);

  } ) ;
</script>




<form method="POST" action="../php_server/ajt_rep.php" class="rep_form">
  <input type="hidden" value="' .$msg_unit['msg_id'].'" name="id_msg" class="id_msg">
  <textarea rows="3"  name="reponce" placeholder="Votre reponce..." class="reponce"></textarea>
  <input type="submit" value="Repondre" class="btn_repondre" id>
</form>





<form action="./php_server/sign_fich.php" method="post" class="btn_sign">
  <input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
  <input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
  <input type="submit" value="Signaler">
</form>


<a>
  <div class="btn_sign">
    <input type="hidden" value="'.$fich_unit['cour_id'].'" name="cour_id" class="cour_id">
    <input type="hidden" value="'.$fich_unit['cour_type'].'" name="cour_type" class="cour_type">
    <img src="./img/type_fichier/telecharger.png">
    <h2>Signaler</h2>
  </div>
</a>





