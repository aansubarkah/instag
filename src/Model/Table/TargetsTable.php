<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Targets Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FansTable|\Cake\ORM\Association\HasMany $Fans
 * @property \App\Model\Table\FollowersTable|\Cake\ORM\Association\HasMany $Followers
 * @property \App\Model\Table\HatesTable|\Cake\ORM\Association\HasMany $Hates
 * @property \App\Model\Table\HenchmansTable|\Cake\ORM\Association\HasMany $Henchmans
 * @property \App\Model\Table\LovesTable|\Cake\ORM\Association\HasMany $Loves
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Target get($primaryKey, $options = [])
 * @method \App\Model\Entity\Target newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Target[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Target|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Target patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Target[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Target findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TargetsTable extends Table
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

        $this->setTable('targets');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Fans', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Followers', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Hates', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Henchmans', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Loves', [
            'foreignKey' => 'target_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'target_id'
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
            ->allowEmpty('pk');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmpty('username');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 255)
            ->allowEmpty('fullname');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmpty('password');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->integer('age')
            ->allowEmpty('age');

        $validator
            ->integer('posts')
            ->allowEmpty('posts');

        $validator
            ->integer('followers')
            ->allowEmpty('followers');

        $validator
            ->integer('following')
            ->allowEmpty('following');

        $validator
            ->boolean('human')
            ->allowEmpty('human');

        $validator
            ->boolean('gender')
            ->allowEmpty('gender');

        $validator
            ->boolean('verified')
            ->allowEmpty('verified');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->boolean('testhuman')
            ->allowEmpty('testhuman');

        $validator
            ->boolean('testgender')
            ->allowEmpty('testgender');

        $validator
            ->boolean('testage')
            ->allowEmpty('testage');

        $validator
            ->boolean('closed')
            ->allowEmpty('closed');

        $validator
            ->boolean('validated')
            ->allowEmpty('validated');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
