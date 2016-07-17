<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

\macgyer\yii2materializecss\assets\MaterializeAsset::register($this);
rmrevin\yii\fontawesome\AssetBundle::register($this);

$this->title = 'Wei Fast Pay | Landing Page';
?>

<video class="video-fondo" src="video/fondo.mp4" type="" autoplay loop muted>	
</video>

<header>
	<div class="perfil left-align">
		<div class="imagen-perfil"><?php echo Html::img('@web/images/perfil2.jpg') ?></div>
		<div class="texto-perfil"><p>Has sido invitado por Andres Mauricio Shek</p></div>
	</div>
</header>
<div class="divider"></div>
<div class="container">
	<div class="row">
	<div class="videos col m9 s10 center-align">
			<div class="row">
					 <div class="video">


					 	<!-- Modal Trigger -->
						  <?php echo Html::img('@web/images/presentacion.jpg' , ['class' => 'responsive-img', 'alt' => 'Presentacion']) ?>

						  <!-- Modal Structure -->

						  <?php
						    Modal::begin([
							    'toggleButton' => ['label' => 'click me'],
							    'id' => 'modal',
							    'size' => 'modal-lg',
							]);
						    
						    echo "<div id='modalContent'>"	
						    ?>	
							<iframe width="700" height="399" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
							<?php
							echo "</div>";
							Modal::end();
						   ?>



						  <div id="modal1" class="modal">
						    <div class="modal-content">
						      <iframe width="700" height="399" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
						    </div>
						  </div>
						  <!-- End Modal Structure -->
				     </div>
					<div class="video">
				        <!-- Modal Trigger -->
						  <a class="modal-trigger" href="#modal1"><?php echo Html::img('@web/images/intro.jpg', ['class' => 'responsive-img']) ?></a>

						  <!-- Modal Structure -->
						  <div id="modal1" class="modal">
						    <div class="modal-content">
						      <iframe width="700" height="399" src="https://www.youtube.com/watch?v=Fp7G16ie3I0" frameborder="0" allowfullscreen></iframe>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
						    </div>
						  </div>
						  <!-- End Modal Structure -->
				     </div>
			</div>	
			<div class="row">
					<div class="video">
				        <!-- Modal Trigger -->
						  <a class="modal-trigger" href="#modal1"><?php echo Html::img('@web/images/intro.jpg', ['class' => 'responsive-img']) ?></a>

						  <!-- Modal Structure -->
						  <div id="modal1" class="modal">
						    <div class="modal-content">
						      <iframe width="700" height="399" src="https://www.youtube.com/watch?v=Fp7G16ie3I0" frameborder="0" allowfullscreen></iframe>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
						    </div>
						  </div>
						  <!-- End Modal Structure -->
				     </div>
				
					<div class="video">
				        <!-- Modal Trigger -->
						  <a class="modal-trigger" href="#modal1"><?php echo Html::img('@web/images/presentacion.jpg', ['class' => 'responsive-img']) ?></a>

						  <!-- Modal Structure -->
						  <div id="modal1" class="modal">
						    <div class="modal-content">
						      <iframe width="700" height="399" src="https://www.youtube.com/watch?v=Fp7G16ie3I0" frameborder="0" allowfullscreen></iframe>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
						    </div>
						  </div>
						  <!-- End Modal Structure -->				     
				</div>
			</div>	
		</div>
		<div class="redes col m3 s2 center-align">

			<div class="subtitulo">
				<h2>Sígueme</h2>
			</div>
				<div class="botones-sociales">
				<!--Facebook-->
				<a type="button" class="btn-fb btn-floating btn-large"><i class="fa fa-facebook"></i></a>
				<!--Twitter-->
				<a type="button" class="btn-floating btn-large btn-tw"><i class="fa fa-twitter"></i></a>
				<!--Google +-->
				<a type="button" class="btn-floating btn-large btn-gplus"><i class="fa fa-google-plus"></i></a>
				<!--Linkedin-->
				<a type="button" class="btn-floating btn-large btn-li"><i class="fa fa-linkedin"></i></a>
				<!--Youtube-->
				<a type="button" class="btn-floating btn-large btn-yt" href="https://www.youtube.com/channel/UCNL7yogXgcZWtNKaI_gndWA" target="_blank"><i class="fa fa-youtube"></i></a>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="botones center-align">
			<a href="<?php echo Url::to(['user/register']); ?>" target="_blank"><button class="btn waves-effect waves-light" type="submit" name="action">Registrarme
    			<i class="material-icons right">person add</i>
    			
  			</button></a>
		</div>
	</div>
</div>
<div class="divider"></div>
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Texto</h5>
                <p class="grey-text text-lighten-4">Texto del footer.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Enlaces</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Registrarme!</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Wei Fast Pay</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contacto</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Copyright Wei Fast Pay 
            <a class="grey-text text-lighten-4 right" href="http://www.emporiocreativo.com" target="_blank">Emporio Creativo</a>
            </div>
          </div>
        </footer>