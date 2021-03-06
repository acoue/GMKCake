<div class="blocblanc">
	<h2>Administration - Utilisateur </h2>
    <h3><?= $user->username ?></h3>
	<div class="blocblancContent">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			<?= $this->Html->link(__('Edition'), ['action' => 'edit', $user->id],['class' => 'btn btn-default']) ?><br /><br />
			<?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['class'=>'btn btn-warning','confirm' => __('Etes-vous sûr de vouloir supprimer l\'utilisateur ?')]) ?><br /><br/>
			<?= $this->Html->link(__('Retour'), ['action' => 'index'],['class' => 'btn btn-info']) ?> 
			</div>
			<div class="col-md-8">  
				<div class="row">
                	<label class="col-md-4 control-label" for="id">Identifiant </label>
                    <div class="col-md-8"><?= $this->Form->input('id', ['label' => false,'id'=>'id',
														   	'div' => false,
															'class' => 'form-control', 
                    										'type' => 'text', 
                    										'value' => h($user->id),
                    										'disabled' => 'disabled']); ?>
                    </div>                          
				</div><br />   
				<div class="row">
                	<label class="col-md-4 control-label" for="name">Username </label>
                    <div class="col-md-8"><?= $this->Form->input('name', ['label' => false,'id'=>'name',
														   	'div' => false,
															'class' => 'form-control', 
                    										'type' => 'text', 
                    										'value' => h($user->username),
                    										'disabled' => 'disabled']); ?>
                    </div>                          
				</div><br />     
				<div class="row">
                	<label class="col-md-4 control-label" for="role">Rôle </label>
                    <div class="col-md-8"><?= $this->Form->input('role', ['label' => false,'id'=>'role',
														   	'div' => false,
															'class' => 'form-control', 
                    										'type' => 'text', 
                    										'value' => h($user->role),
                    										'disabled' => 'disabled']); ?>
                    </div>                          
				</div><br />
			</div>						
			<div class="col-md-1"></div>
		</div>
	</div>
</div>