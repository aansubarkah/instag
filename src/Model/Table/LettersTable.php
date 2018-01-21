<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Letters Model
 *
 * @method \App\Model\Entity\Letter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Letter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Letter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Letter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Letter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Letter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Letter findOrCreate($search, callable $callback = null, $options = [])
 */
class LettersTable extends Table
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

        $this->setTable('letters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmpty('messageid');

        $validator
            ->allowEmpty('userid');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->allowEmpty('username');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 255)
            ->allowEmpty('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 255)
            ->allowEmpty('lastname');

        $validator
            ->allowEmpty('takenat');

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('lettertype');

        $validator
            ->allowEmpty('sequence');

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
        $rules->add($rules->isUnique(['messageid']));

        return $rules;
    }
}
