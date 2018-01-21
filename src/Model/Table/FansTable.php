<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fans Model
 *
 * @property \App\Model\Table\TargetsTable|\Cake\ORM\Association\BelongsTo $Targets
 * @property \App\Model\Table\AccountlistsTable|\Cake\ORM\Association\BelongsTo $Accountlists
 * @property \App\Model\Table\IdolsTable|\Cake\ORM\Association\BelongsTo $Idols
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Fan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FansTable extends Table
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

        $this->setTable('fans');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Targets', [
            'foreignKey' => 'target_id'
        ]);
        $this->belongsTo('Accountlists', [
            'foreignKey' => 'accountlist_id'
        ]);
        $this->belongsTo('Idols', [
            'foreignKey' => 'idol_id'
        ]);
        $this->belongsTo('Projects', [
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
            ->allowEmpty('id');

        $validator
            ->boolean('followed')
            ->allowEmpty('followed');

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
            ->scalar('target_description')
            ->allowEmpty('target_description');

        $validator
            ->integer('target_age')
            ->allowEmpty('target_age');

        $validator
            ->integer('target_posts')
            ->allowEmpty('target_posts');

        $validator
            ->integer('target_followers')
            ->allowEmpty('target_followers');

        $validator
            ->integer('target_followings')
            ->allowEmpty('target_followings');

        $validator
            ->boolean('target_human')
            ->allowEmpty('target_human');

        $validator
            ->boolean('target_gender')
            ->allowEmpty('target_gender');

        $validator
            ->boolean('target_verified')
            ->allowEmpty('target_verified');

        $validator
            ->boolean('target_active')
            ->allowEmpty('target_active');

        $validator
            ->boolean('target_testhuman')
            ->allowEmpty('target_testhuman');

        $validator
            ->boolean('target_testgender')
            ->allowEmpty('target_testgender');

        $validator
            ->boolean('target_testage')
            ->allowEmpty('target_testage');

        $validator
            ->boolean('target_closed')
            ->allowEmpty('target_closed');

        $validator
            ->boolean('target_validated')
            ->allowEmpty('target_validated');

        $validator
            ->allowEmpty('idol_pk');

        $validator
            ->scalar('idol_username')
            ->maxLength('idol_username', 255)
            ->allowEmpty('idol_username');

        $validator
            ->scalar('idol_fullname')
            ->maxLength('idol_fullname', 255)
            ->allowEmpty('idol_fullname');

        $validator
            ->scalar('idol_description')
            ->allowEmpty('idol_description');

        $validator
            ->integer('idol_age')
            ->allowEmpty('idol_age');

        $validator
            ->integer('idol_posts')
            ->allowEmpty('idol_posts');

        $validator
            ->integer('idol_followers')
            ->allowEmpty('idol_followers');

        $validator
            ->integer('idol_followings')
            ->allowEmpty('idol_followings');

        $validator
            ->boolean('idol_human')
            ->allowEmpty('idol_human');

        $validator
            ->boolean('idol_gender')
            ->allowEmpty('idol_gender');

        $validator
            ->boolean('idol_verified')
            ->allowEmpty('idol_verified');

        $validator
            ->boolean('idol_active')
            ->allowEmpty('idol_active');

        $validator
            ->boolean('idol_testhuman')
            ->allowEmpty('idol_testhuman');

        $validator
            ->boolean('idol_testgender')
            ->allowEmpty('idol_testgender');

        $validator
            ->boolean('idol_testage')
            ->allowEmpty('idol_testage');

        $validator
            ->boolean('idol_closed')
            ->allowEmpty('idol_closed');

        $validator
            ->boolean('idol_validated')
            ->allowEmpty('idol_validated');

        $validator
            ->scalar('project_name')
            ->maxLength('project_name', 255)
            ->allowEmpty('project_name');

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
        $rules->add($rules->existsIn(['target_id'], 'Targets'));
        $rules->add($rules->existsIn(['accountlist_id'], 'Accountlists'));
        $rules->add($rules->existsIn(['idol_id'], 'Idols'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
