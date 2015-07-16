<?php
namespace App\Model\Table;

use App\Model\Entity\Competition;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competitions Model
 */
class CompetitionsTable extends Table
{
// 	public function isOwnedBy($articleId, $userId)
// 	{
// 		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
// 	}
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('competitions');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('date_competition', 'valid', ['rule' => 'date'])
            ->requirePresence('date_competition', 'create')
            ->notEmpty('date_competition')
            ->allowEmpty('lieu')
            ->add('type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('type', 'create')
            ->notEmpty('type')
            ->requirePresence('description', 'create')
            ->notEmpty('description')
            ->add('selected', 'valid', ['rule' => 'numeric'])
            ->requirePresence('selected', 'create')
            ->notEmpty('selected');

        return $validator;
    }
}
