<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Love Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $unlike
 * @property bool $who
 * @property bool $active
 * @property int $account_id
 * @property int $account_pk
 * @property string $username
 * @property string $fullname
 * @property int $user_id
 * @property string $email
 * @property string $user_username
 * @property string $user_name
 * @property int $post_id
 * @property int $post_pk
 * @property int $takenat
 * @property int $target_id
 * @property int $target_pk
 * @property string $target_username
 * @property string $target_fullname
 * @property int $location_id
 * @property int $location_pk
 * @property float $lat
 * @property float $lng
 * @property string $address
 * @property string $name
 * @property string $shortname
 * @property int $comment_id
 * @property string $caption
 *
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Target $target
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Comment $comment
 */
class Love extends Entity
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
        'unlike' => true,
        'who' => true,
        'active' => true,
        'account_id' => true,
        'account_pk' => true,
        'username' => true,
        'fullname' => true,
        'user_id' => true,
        'email' => true,
        'user_username' => true,
        'user_name' => true,
        'post_id' => true,
        'post_pk' => true,
        'takenat' => true,
        'target_id' => true,
        'target_pk' => true,
        'target_username' => true,
        'target_fullname' => true,
        'location_id' => true,
        'location_pk' => true,
        'lat' => true,
        'lng' => true,
        'address' => true,
        'name' => true,
        'shortname' => true,
        'comment_id' => true,
        'caption' => true,
        'account' => true,
        'user' => true,
        'post' => true,
        'target' => true,
        'location' => true,
        'comment' => true
    ];
}
