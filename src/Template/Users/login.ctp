<!-- src/Template/Users/login.ctp -->
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="users form_login">
		<!-- Formulaire de connexion -->
			<?= $this->Form->create() ?>
			<legend>Connectez-vous</legend>
			<?= $this->Form->input('username', array('label' => false,'div' => false,'class' => 'form-control', 'size' => '70px', 'placeholder' => 'Identifiant', 'required' =>'required','autofocus'=>'autofocus')); ?><br />
			<?= $this->Form->input('password', array('label' => false,'div' => false, 'class' => 'form-control','size' => '70px', 'type'=>'password','placeholder' => 'Mot de passe', 'required' =>'required')); ?><br />
			<p align="center"><?= $this->Form->button('Se connecter', ['class' => 'btn btn-default']) ?></p>
			<?= $this->Form->end() ?>
			<p align="center"><?= $this->Html->link('Mot de passe oublié ?','/users/password') ?></p>	
		</div>
	</div>
	<div class="col-md-3"></div>
</div>