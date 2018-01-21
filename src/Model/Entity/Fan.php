<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fan Entity
 *
 * @property int $id
 * @property bool $followed
 * @property bool $relevant
 * @property bool $testrelevant
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 * @property int $target_id
 * @property int $target_pk
 * @property string $target_username
 * @property string $target_fullname
 * @property string $target_description
 * @property int $target_age
 * @property int $target_posts
 * @property int $target_followers
 * @property int $target_followings
 * @property bool $target_human
 * @property bool $target_gender
 * @property bool $target_verified
 * @property bool $target_active
 * @property bool $target_testhuman
 * @property bool $target_testgender
 * @property bool $target_testage
 * @property bool $target_closed
 * @property bool $target_validated
 * @property int $accountlist_id
 * @property int $idol_id
 * @property int $idol_pk
 * @property string $idol_username
 * @property string $idol_fullname
 * @property string $idol_description
 * @property int $idol_age
 * @property int $idol_posts
 * @property int $idol_followers
 * @property int $idol_followings
 * @property bool $idol_human
 * @property bool $idol_gender
 * @property bool $idol_verified
 * @property bool $idol_active
 * @property bool $idol_testhuman
 * @property bool $idol_testgender
 * @property bool $idol_testage
 * @property bool $idol_closed
 * @property bool $idol_validated
 * @property int $project_id
 * @property string $project_name
 *
 * @property \App\Model\Entity\Target $target
 * @property \App\Model\Entity\Accountlist $accountlist
 * @property \App\Model\Entity\Idol $idol
 * @property \App\Model\Entity\Project $project
 */
class Fan extends Entity
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
        'followed' => true,
        'relevant' => true,
        'testrelevant' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'target_id' => true,
        'target_pk' => true,
        'target_username' => true,
        'target_fullname' => true,
        'target_description' => true,
        'target_age' => true,
        'target_posts' => true,
        'target_followers' => true,
        'target_followings' => true,
        'target_human' => true,
        'target_gender' => true,
        'target_verified' => true,
        'target_active' => true,
        'target_testhuman' => true,
        'target_testgender' => true,
        'target_testage' => true,
        'target_closed' => true,
        'target_validated' => true,
        'accountlist_id' => true,
        'idol_id' => true,
        'idol_pk' => true,
        'idol_username' => true,
        'idol_fullname' => true,
        'idol_description' => true,
        'idol_age' => true,
        'idol_posts' => true,
        'idol_followers' => true,
        'idol_followings' => true,
        'idol_human' => true,
        'idol_gender' => true,
        'idol_verified' => true,
        'idol_active' => true,
        'idol_testhuman' => true,
        'idol_testgender' => true,
        'idol_testage' => true,
        'idol_closed' => true,
        'idol_validated' => true,
        'project_id' => true,
        'project_name' => true,
        'target' => true,
        'accountlist' => true,
        'idol' => true,
        'project' => true
    ];
}
