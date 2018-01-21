<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RasterOverviews Model
 *
 * @method \App\Model\Entity\RasterOverview get($primaryKey, $options = [])
 * @method \App\Model\Entity\RasterOverview newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RasterOverview[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RasterOverview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RasterOverview findOrCreate($search, callable $callback = null, $options = [])
 */
class RasterOverviewsTable extends Table
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

        $this->setTable('raster_overviews');
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
            ->scalar('o_table_catalog')
            ->allowEmpty('o_table_catalog');

        $validator
            ->scalar('o_table_schema')
            ->allowEmpty('o_table_schema');

        $validator
            ->scalar('o_table_name')
            ->allowEmpty('o_table_name');

        $validator
            ->scalar('o_raster_column')
            ->allowEmpty('o_raster_column');

        $validator
            ->scalar('r_table_catalog')
            ->allowEmpty('r_table_catalog');

        $validator
            ->scalar('r_table_schema')
            ->allowEmpty('r_table_schema');

        $validator
            ->scalar('r_table_name')
            ->allowEmpty('r_table_name');

        $validator
            ->scalar('r_raster_column')
            ->allowEmpty('r_raster_column');

        $validator
            ->integer('overview_factor')
            ->allowEmpty('overview_factor');

        return $validator;
    }
}
