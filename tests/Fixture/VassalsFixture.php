<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VassalsFixture
 *
 */
class VassalsFixture extends TestFixture
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
        'accountlist_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'follow' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Sudah diikuti', 'precision' => null],
        'relevant' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Sesuai dengan tema proyek', 'precision' => null],
        'testrelevant' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Telah diuji relevansi dengan proyek', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'bycomment' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Akun ini berkomentar pada post akun panutan', 'precision' => null],
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
            'accountlist_id' => 1,
            'follow' => 1,
            'relevant' => 1,
            'testrelevant' => 1,
            'created' => 1516496018,
            'modified' => 1516496018,
            'active' => 1,
            'bycomment' => 1
        ],
    ];
}
