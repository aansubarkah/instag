<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RasterOverview Entity
 *
 * @property string $o_table_catalog
 * @property string $o_table_schema
 * @property string $o_table_name
 * @property string $o_raster_column
 * @property string $r_table_catalog
 * @property string $r_table_schema
 * @property string $r_table_name
 * @property string $r_raster_column
 * @property int $overview_factor
 */
class RasterOverview extends Entity
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
        'o_table_catalog' => true,
        'o_table_schema' => true,
        'o_table_name' => true,
        'o_raster_column' => true,
        'r_table_catalog' => true,
        'r_table_schema' => true,
        'r_table_name' => true,
        'r_raster_column' => true,
        'overview_factor' => true
    ];
}
