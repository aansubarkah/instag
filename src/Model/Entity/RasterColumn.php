<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RasterColumn Entity
 *
 * @property string $r_table_catalog
 * @property string $r_table_schema
 * @property string $r_table_name
 * @property string $r_raster_column
 * @property int $srid
 * @property float $scale_x
 * @property float $scale_y
 * @property int $blocksize_x
 * @property int $blocksize_y
 * @property bool $same_alignment
 * @property bool $regular_blocking
 * @property int $num_bands
 * @property string $pixel_types
 * @property string $nodata_values
 * @property string $out_db
 * @property string $extent
 * @property bool $spatial_index
 */
class RasterColumn extends Entity
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
        'r_table_catalog' => true,
        'r_table_schema' => true,
        'r_table_name' => true,
        'r_raster_column' => true,
        'srid' => true,
        'scale_x' => true,
        'scale_y' => true,
        'blocksize_x' => true,
        'blocksize_y' => true,
        'same_alignment' => true,
        'regular_blocking' => true,
        'num_bands' => true,
        'pixel_types' => true,
        'nodata_values' => true,
        'out_db' => true,
        'extent' => true,
        'spatial_index' => true
    ];
}
