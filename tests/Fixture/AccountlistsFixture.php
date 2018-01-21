<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccountlistsFixture
 *
 */
class AccountlistsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'account_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'project_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'which' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => '0 blacklist, 1 whitelist', 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'idol' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Akun ini panutan, followernya difollow dan like', 'precision' => null],
        'vip' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Akun ini spesial, pernah membeli misalnya', 'precision' => null],
        'nextmaxid' => ['type' => 'string', 'length' => 255, 'default' => '0', 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'account_id' => 1,
            'project_id' => 1,
            'created' => 1516496006,
            'modified' => 1516496006,
            'which' => 1,
            'active' => 1,
            'idol' => 1,
            'vip' => 1,
            'nextmaxid' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
