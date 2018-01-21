<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hates Model
 *
 * @property \App\Model\Table\TargetsTable|\Cake\ORM\Association\BelongsTo $Targets
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Hate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HatesTable extends Table
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

        $this->setTable('hates');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Targets', [
            'foreignKey' => 'target_id'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id');

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
            ->allowEmpty('target_pk');

        $validator
            ->scalar('target_username')
            ->maxLength('target_username', 255)
            ->allowEmpty('target_username');

        $validator
            ->scalar('target_fullname')
            ->maxLength('target_fullname', 255)
            ->allowEmpty('target_fullname');

        $validator
            ->scalar('project_name')
            ->maxLength('project_name', 255)
            ->allowEmpty('project_name');

        $validator
            ->allowEmpty('account_pk');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmpty('username');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 255)
            ->allowEmpty('fullname');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('user_username')
            ->maxLength('user_username', 255)
            ->allowEmpty('user_username');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 255)
            ->allowEmpty('user_name');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['target_id'], 'Targets'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
