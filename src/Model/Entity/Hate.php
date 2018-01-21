<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hate Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $which
 * @property bool $active
 * @property bool $idol
 * @property bool $vip
 * @property int $target_id
 * @property int $target_pk
 * @property string $target_username
 * @property string $target_fullname
 * @property int $project_id
 * @property string $project_name
 * @property int $account_id
 * @property int $account_pk
 * @property string $username
 * @property string $fullname
 * @property int $user_id
 * @property string $email
 * @property string $user_username
 * @property string $user_name
 *
 * @property \App\Model\Entity\Target $target
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\User $user
 */
class Hate extends Entity
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
        'id' => true,
        'created' => true,
        'modified' => true,
        'which' => true,
        'active' => true,
        'idol' => true,
        'vip' => true,
        'target_id' => true,
        'target_pk' => true,
        'target_username' => true,
        'target_fullname' => true,
        'project_id' => true,
        'project_name' => true,
        'account_id' => true,
        'account_pk' => true,
        'username' => true,
        'fullname' => true,
        'user_id' => true,
        'email' => true,
        'user_username' => true,
        'user_name' => true,
        'target' => true,
        'project' => true,
        'account' => true,
        'user' => true
    ];
}
