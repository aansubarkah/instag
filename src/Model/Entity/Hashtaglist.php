<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hashtaglist Entity
 *
 * @property int $id
 * @property int $hashtag_id
 * @property int $project_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $which
 * @property bool $active
 *
 * @property \App\Model\Entity\Hashtag $hashtag
 * @property \App\Model\Entity\Project $project
 */
class Hashtaglist extends Entity
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
        'hashtag_id' => true,
        'project_id' => true,
        'created' => true,
        'modified' => true,
        'which' => true,
        'active' => true,
        'hashtag' => true,
        'project' => true
    ];
}
