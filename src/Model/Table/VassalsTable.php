<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vassals Model
 *
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\AccountlistsTable|\Cake\ORM\Association\BelongsTo $Accountlists
 *
 * @method \App\Model\Entity\Vassal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vassal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vassal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vassal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vassal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vassal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vassal findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VassalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('vassals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('Accountlists', [
            'foreignKey' => 'accountlist_id'
        ]);
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
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('follow')
            ->allowEmpty('follow');

        $validator
            ->boolean('relevant')
            ->allowEmpty('relevant');

        $validator
            ->boolean('testrelevant')
            ->allowEmpty('testrelevant');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('bycomment')
            ->allowEmpty('bycomment');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['accountlist_id'], 'Accountlists'));

        return $rules;
    }
}
