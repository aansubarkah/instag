<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hashtags Model
 *
 * @property \App\Model\Table\HashtaglistsTable|\Cake\ORM\Association\HasMany $Hashtaglists
 *
 * @method \App\Model\Entity\Hashtag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hashtag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hashtag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hashtag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hashtag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hashtag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hashtag findOrCreate($search, callable $callback = null, $options = [])
 */
class HashtagsTable extends Table
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

        $this->setTable('hashtags');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Hashtaglists', [
            'foreignKey' => 'hashtag_id'
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        return $validator;
    }
}
