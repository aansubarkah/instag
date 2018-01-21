<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accountlists Model
 *
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\FansTable|\Cake\ORM\Association\HasMany $Fans
 * @property \App\Model\Table\VassalsTable|\Cake\ORM\Association\HasMany $Vassals
 *
 * @method \App\Model\Entity\Accountlist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Accountlist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Accountlist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Accountlist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Accountlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Accountlist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Accountlist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccountlistsTable extends Table
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

        $this->setTable('accountlists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Fans', [
            'foreignKey' => 'accountlist_id'
        ]);
        $this->hasMany('Vassals', [
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
            ->boolean('which')
            ->allowEmpty('which');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('idol')
            ->allowEmpty('idol');

        $validator
            ->boolean('vip')
            ->allowEmpty('vip');

        $validator
            ->scalar('nextmaxid')
            ->maxLength('nextmaxid', 255)
            ->allowEmpty('nextmaxid');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
