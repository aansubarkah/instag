<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\PlansTable|\Cake\ORM\Association\BelongsTo $Plans
 * @property \App\Model\Table\ProxiesTable|\Cake\ORM\Association\BelongsTo $Proxies
 * @property \App\Model\Table\AccountlistsTable|\Cake\ORM\Association\HasMany $Accountlists
 * @property \App\Model\Table\FansTable|\Cake\ORM\Association\HasMany $Fans
 * @property \App\Model\Table\HashtaglistsTable|\Cake\ORM\Association\HasMany $Hashtaglists
 * @property \App\Model\Table\HatesTable|\Cake\ORM\Association\HasMany $Hates
 * @property \App\Model\Table\ProposalsTable|\Cake\ORM\Association\HasMany $Proposals
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id'
        ]);
        $this->belongsTo('Proxies', [
            'foreignKey' => 'proxy_id'
        ]);
        $this->hasMany('Accountlists', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Fans', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Hashtaglists', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Hates', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Proposals', [
            'foreignKey' => 'project_id'
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
            ->integer('days')
            ->allowEmpty('days');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->dateTime('started')
            ->allowEmpty('started');

        $validator
            ->dateTime('ended')
            ->allowEmpty('ended');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->integer('daystounfollow')
            ->allowEmpty('daystounfollow');

        $validator
            ->integer('unliketoban')
            ->allowEmpty('unliketoban');

        $validator
            ->boolean('followbyhashtag')
            ->allowEmpty('followbyhashtag');

        $validator
            ->boolean('followbyidol')
            ->allowEmpty('followbyidol');

        $validator
            ->boolean('likebyhashtag')
            ->allowEmpty('likebyhashtag');

        $validator
            ->boolean('likebyidol')
            ->allowEmpty('likebyidol');

        $validator
            ->integer('maximumlike')
            ->allowEmpty('maximumlike');

        $validator
            ->integer('maximumfollow')
            ->allowEmpty('maximumfollow');

        $validator
            ->boolean('commentbyhashtag')
            ->allowEmpty('commentbyhashtag');

        $validator
            ->boolean('commentbyidol')
            ->allowEmpty('commentbyidol');

        $validator
            ->integer('maximumcomment')
            ->allowEmpty('maximumcomment');

        $validator
            ->boolean('followbycomment')
            ->allowEmpty('followbycomment');

        $validator
            ->boolean('likebycomment')
            ->allowEmpty('likebycomment');

        $validator
            ->allowEmpty('telegramid');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));
        $rules->add($rules->existsIn(['proxy_id'], 'Proxies'));

        return $rules;
    }
}
