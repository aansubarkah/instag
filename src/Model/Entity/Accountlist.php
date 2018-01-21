<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Accountlist Entity
 *
 * @property int $id
 * @property int $account_id
 * @property int $project_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $which
 * @property bool $active
 * @property bool $idol
 * @property bool $vip
 * @property string $nextmaxid
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Fan[] $fans
 * @property \App\Model\Entity\Vassal[] $vassals
 */
class Accountlist extends Entity
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
        'account_id' => true,
        'project_id' => true,
        'created' => true,
        'modified' => true,
        'which' => true,
        'active' => true,
        'idol' => true,
        'vip' => true,
        'nextmaxid' => true,
        'account' => true,
        'project' => true,
        'fans' => true,
        'vassals' => true
    ];
}
