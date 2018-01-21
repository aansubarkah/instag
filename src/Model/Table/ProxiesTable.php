<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proxies Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\Proxy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proxy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Proxy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proxy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proxy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proxy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proxy findOrCreate($search, callable $callback = null, $options = [])
 */
class ProxiesTable extends Table
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

        $this->setTable('proxies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Projects', [
            'foreignKey' => 'proxy_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        return $validator;
    }
}
