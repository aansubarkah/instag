<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 *
 */
class ProjectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'user_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'account_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'plan_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'days' => ['type' => 'integer', 'length' => 10, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'started' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'ended' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => null, 'precision' => null],
        'active' => ['type' => 'boolean', 'length' => null, 'default' => 1, 'null' => true, 'comment' => null, 'precision' => null],
        'daystounfollow' => ['type' => 'integer', 'length' => 10, 'default' => '7', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'unliketoban' => ['type' => 'integer', 'length' => 10, 'default' => '2', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'followbyhashtag' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Ikuti akun dengan hashtag', 'precision' => null],
        'followbyidol' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Ikuti pengikut idola', 'precision' => null],
        'likebyhashtag' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Like jika hashtag sesuai', 'precision' => null],
        'likebyidol' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Like post milik follower panutan', 'precision' => null],
        'maximumlike' => ['type' => 'integer', 'length' => 10, 'default' => '1000', 'null' => true, 'comment' => 'Maksimal like tiap hari', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'maximumfollow' => ['type' => 'integer', 'length' => 10, 'default' => '200', 'null' => true, 'comment' => 'Maksimal follow tiap hari', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'commentbyhashtag' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Komentar jika hashtag sesuai', 'precision' => null],
        'commentbyidol' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Komentari post follower idol', 'precision' => null],
        'maximumcomment' => ['type' => 'integer', 'length' => 10, 'default' => '200', 'null' => true, 'comment' => 'Maksimal komentar tiap hari', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'proxy_id' => ['type' => 'integer', 'length' => 10, 'default' => '1', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'followbycomment' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Ikuti akun yang berkomentar pada akun idola', 'precision' => null],
        'likebycomment' => ['type' => 'boolean', 'length' => null, 'default' => 0, 'null' => true, 'comment' => 'Like post milik komentator panutan', 'precision' => null],
        'telegramid' => ['type' => 'biginteger', 'length' => 20, 'default' => '0', 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
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
            'user_id' => 1,
            'account_id' => 1,
            'plan_id' => 1,
            'days' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'started' => 1516496014,
            'ended' => 1516496014,
            'created' => 1516496014,
            'modified' => 1516496014,
            'status' => 1,
            'active' => 1,
            'daystounfollow' => 1,
            'unliketoban' => 1,
            'followbyhashtag' => 1,
            'followbyidol' => 1,
            'likebyhashtag' => 1,
            'likebyidol' => 1,
            'maximumlike' => 1,
            'maximumfollow' => 1,
            'commentbyhashtag' => 1,
            'commentbyidol' => 1,
            'maximumcomment' => 1,
            'proxy_id' => 1,
            'followbycomment' => 1,
            'likebycomment' => 1,
            'telegramid' => 1
        ],
    ];
}
