<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loves Model
 *
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $Accounts
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\BelongsTo $Posts
 * @property \App\Model\Table\TargetsTable|\Cake\ORM\Association\BelongsTo $Targets
 * @property \App\Model\Table\LocationsTable|\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\BelongsTo $Comments
 *
 * @method \App\Model\Entity\Love get($primaryKey, $options = [])
 * @method \App\Model\Entity\Love newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Love[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Love|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Love patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Love[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Love findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LovesTable extends Table
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

        $this->setTable('loves');
        $this->setDisplayField('name');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id'
        ]);
        $this->belongsTo('Targets', [
            'foreignKey' => 'target_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Comments', [
            'foreignKey' => 'comment_id'
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
            ->boolean('unlike')
            ->allowEmpty('unlike');

        $validator
            ->boolean('who')
            ->allowEmpty('who');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

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

        $validator
            ->allowEmpty('post_pk');

        $validator
            ->allowEmpty('takenat');

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
            ->allowEmpty('location_pk');

        $validator
            ->decimal('lat')
            ->allowEmpty('lat');

        $validator
            ->decimal('lng')
            ->allowEmpty('lng');

        $validator
            ->scalar('address')
            ->allowEmpty('address');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->scalar('shortname')
            ->maxLength('shortname', 255)
            ->allowEmpty('shortname');

        $validator
            ->scalar('caption')
            ->allowEmpty('caption');

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
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['post_id'], 'Posts'));
        $rules->add($rules->existsIn(['target_id'], 'Targets'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['comment_id'], 'Comments'));

        return $rules;
    }
}
