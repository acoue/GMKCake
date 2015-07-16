<?php 

$cakeDescription = 'GMK ';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Application de gestion d'une manifestation de kendo">
        <meta name="author" content="Anthony COUE">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
	<?php
		echo $this->fetch('meta');
		echo $this->Html->meta('icon');
    	echo $this->Html->css(['style','bootstrap','jquery-ui']);
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="main">
        <!-- navbar -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <span class="header_logo">
                    <?=	$this->Html->image('header.png', ['height' => '70px']); ?>
                    </span>
                </div>
                <!-- Menu -->
                <?= $this->element('menu'); ?>    
                <!-- /.menu-->                
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Contenu -->     
        <div class="container">
        
       		<div class='row'>
       			<div class='col-md-12'>
<?php 
		$session = $this->request->session();
		if($session->check('Auth.User.id')) {
			if(!empty($session->check('Competition.Id'))) { 
				setlocale(LC_TIME, "fr_FR");
?>
					<div class='alert alert-info titre_competition'><strong>Manifestation s&eacute;lectionn&eacute;e :
						<?= $session->read('Competition.Libelle')." (".strftime("%A %d %B %Y",strtotime($session->read('Competition.Date'))).")" ?>     		
						</strong>
					</div>
<?php 		} else { ?>
					<div class='alert alert-info titre_competition'><strong>Aucune manifestation s&eacute;lectionn&eacute;e</strong></div>
<?php 		}
		}
?>
				</div>
			</div>
            <!-- Div pour les message -->
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
					<?= $this->Flash->render('auth') ?>
                  	<?= $this->Flash->render() ?>
              </div>
              <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-12"><?= $this->fetch('content') ?> </div>
            </div>
            <br /><br />
        </div>
        <!-- /.contenu -->
	    <!-- Footer -->
	    <footer class="footer">
			<div class="container">
	        	<div class="row">
	            	<div class="col-md-10 text-footer-left">
	            	<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
	            	<?= $this->Html->image("licence.png")?></a>
	            	<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">GMK</span> de <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Anthony COUE</span> est mis à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">licence Creative Commons Attribution - Pas d’Utilisation Commerciale - Partage dans les Mêmes Conditions 4.0 International</a>
	            	</div>
	            	<div class="col-md-1 text-footer-right">A propos</div>
	                <div class="col-md-1 text-footer-right">Version 3.0<br />15/02/2015</div>
				</div>
			</div>
		</footer>
		<!-- /.footer -->
	</div>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('validatr.js') ?>
    
    <?= $this->Html->script('form-validator/jquery.form-validator.js') ?>
 	<?= $this->Html->script('form-validator/messages_fr.js') ?>
      
    <?= $this->Html->script('jquery-ui.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('userScript.js') ?>  
    
    
    <?= $this->fetch('script') ?>
</body>
</html>

