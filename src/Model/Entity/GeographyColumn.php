<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GeographyColumn Entity
 *
 * @property string $f_table_catalog
 * @property string $f_table_schema
 * @property string $f_table_name
 * @property string $f_geography_column
 * @property int $coord_dimension
 * @property int $srid
 * @property string $type
 */
class GeographyColumn extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'f_table_catalog' => true,
        'f_table_schema' => true,
        'f_table_name' => true,
        'f_geography_column' => true,
        'coord_dimension' => true,
        'srid' => true,
        'type' => true
    ];
}
