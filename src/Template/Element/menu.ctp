<?php 
$session = $this->request->session();
if($session->check('Auth.User.id')) {
?>

<div id='navbar' class='navbar-collapse collapse'>
<span class="header_titre">Rôle : <?= $session->read('Auth.User.role')?></span>
	<ul class="nav navbar-nav navbar-right">
                	<li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestion<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        	<li><?php echo $this->Html->link('Compétition','/competitions/index',array('title'=>'Gestion des compétitions')); ?></li>
                            <li><?php echo $this->Html->link('Clubs','/clubs/index',array('title'=>'Gestion des clubs')); ?></li>
                            <li><?php echo $this->Html->link('Licenciés','/licencies/index',array('title'=>'Gestion des licenciés')); ?></li>
                      	</ul>
                	</li>
                    <li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Compétition<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                        	<li><a href='#'>R&eacute;partition</a></li>
                            <li><a href='#'>Tirage au sort</a></li>
                            <li><a href='#'>Tirage au sort EQUIPES France</a></li>
                            <li><a href='#'>G&eacute;n&eacute;ration poules</a></li>
                            <li><a href='#'>Imprimer poules</a></li>
                            <li><a href='#'>G&eacute;n&eacute;ration tableaux</a></li>
                            <li><a href='#'><span>R&eacute;sultats - Classement poules</a></li>
                            <li><a href='#'><span>R&eacute;sultat - Combats poules</a></li>
                            <li><a href='#'><span>R&eacute;sultat - Combats tableaux</a></li>
                        </ul>
                    </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Passages de grades<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Liste participants</a></li>
                                <li><a href="#">R&eacute;sultats</a></li>
                            </ul>
                        </li>
		<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration<span class="caret"></span></a>
	       	<ul class="dropdown-menu" role="menu">
            	<li><?php echo $this->Html->link("Utilisateurs",'/users/index',array('title'=>'Gestion des utilisateurs')); ?></li>
                <li><?php echo $this->Html->link("Catégories",'/Categories/index',array('title'=>'Gestion des catégories')); ?></li>
                <li><?php echo $this->Html->link("Régions",'/Regions/index',array('title'=>'Gestion des régions')); ?></li>
			</ul>
        </li>
		<li><?= $this->Html->link("Déconnexion","/users/logout");?></li>
	</ul>
</div>
<?php 
}
?>
