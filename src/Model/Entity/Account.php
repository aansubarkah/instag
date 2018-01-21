<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property int $id
 * @property int $pk
 * @property int $user_id
 * @property string $username
 * @property string $fullname
 * @property string $password
 * @property string $description
 * @property int $age
 * @property int $following
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $human
 * @property bool $gender
 * @property bool $verified
 * @property bool $active
 * @property bool $testhuman
 * @property bool $testgender
 * @property bool $testage
 * @property bool $closed
 * @property bool $validated
 *
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\Follower[] $followers
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Accountlist[] $accountlists
 * @property \App\Model\Entity\Activity[] $activities
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Hate[] $hates
 * @property \App\Model\Entity\Henchman[] $henchmans
 * @property \App\Model\Entity\Like[] $likes
 * @property \App\Model\Entity\Love[] $loves
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Proposal[] $proposals
 * @property \App\Model\Entity\Vassal[] $vassals
 */
class Account extends Entity
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
        'pk' => true,
        'user_id' => true,
        'username' => true,
        'fullname' => true,
        'password' => true,
        'description' => true,
        'age' => true,
        'posts' => true,
        'followers' => true,
        'following' => true,
        'created' => true,
        'modified' => true,
        'human' => true,
        'gender' => true,
        'verified' => true,
        'active' => true,
        'testhuman' => true,
        'testgender' => true,
        'testage' => true,
        'closed' => true,
        'validated' => true,
        'user' => true,
        'accountlists' => true,
        'activities' => true,
        'comments' => true,
        'hates' => true,
        'henchmans' => true,
        'likes' => true,
        'loves' => true,
        'messages' => true,
        'projects' => true,
        'proposals' => true,
        'vassals' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
