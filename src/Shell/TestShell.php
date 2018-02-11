<?php
namespace App\Shell;
use Cake\Console\Shell;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use InstagramAPI\Instagram;
use InstagramAPI\Signatures;
use Telegram\Bot\Api;
use LucidFrame\Console\ConsoleTable;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Similarity\CosineSimilarity;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;


class TestShell extends Shell
{
    public $Projects;
    public $Accounts;
    public $Accountlists;
    public $Letters;
    public $Messages;
    public $Loves;
    public $Likes;
    public $Targets;
    public $Hashtaglists;
    public $Hashtags;
    public $Posts;
    public $Locations;
    public $Media;
    public $Comments;
    public $Vassals;
    public $Types;
    public $Telegram;
    public $Table;
    public $Tokenizer;
    public $Similarity;

    public function initialize()
    {
        parent::initialize();
        $this->Projects = $this->loadModel('Projects');
        $this->Accounts = $this->loadModel('Accounts');
        $this->Accountlists = $this->loadModel('Accountlists');
        $this->Letters = $this->loadModel('Letters');
        $this->Messages = $this->loadModel('Messages');
        $this->Loves = $this->loadModel('Loves');
        $this->Likes = $this->loadModel('Likes');
        $this->Targets = $this->loadModel('Targets');
        $this->Hashtaglists = $this->loadModel('Hashtaglists');
        $this->Hashtags = $this->loadModel('Hashtags');
        $this->Posts = $this->loadModel('Posts');
        $this->Locations = $this->loadModel('Locations');
        $this->Media = $this->loadModel('Media');
        $this->Comments = $this->loadModel('Comments');
        $this->Vassals = $this->loadModel('Vassals');
        $this->Types = $this->loadModel('Types');
        $this->Telegram = new Api('539549347:AAEk1Le8tsc-KvjqKcIrm2RiQ7j2MLO5Yb4');
        $this->Table = new ConsoleTable();
        $this->Tokenizer = new WhitespaceTokenizer();
        $this->Similarity = new CosineSimilarity();
    }

    public function main()
    {
        //$this->out('Hello');
        $ig = new Instagram(true, true);
        $ig->login('miyazghayda', 'jayapura');
        $userId = $ig->people->getUserIdForName('miyazghayda');
        $this->out($userId);
    }

    private function sleep5()
    {
        $this->out('sleep randomly for 5 secs');
        sleep(rand(1, 5));
    }

    private function sleep10()
    {
        $this->out('sleep randomly for 10 secs');
        sleep(rand(1, 10));
    }

    public function trainingDefault()
    {
        echo 'Create default classifier' . PHP_EOL;

        $hams = $this->Loves->find('all', [
            'conditions' => [
                'unlike' => false,
                'active' => true
            ],
            'order' => ['id' => 'DESC']
        ]);
        $ham_count = $hams->count() - 1;
        $loop = true;
        $data_ham = [];
        $target_ham = [];
        $i = 0;
        $data_target = 256;
        $ham = $hams->toArray();
        while ($loop) {
            if (!in_array($ham[$i]->target_pk, $target_ham)) {
                array_push($target_ham, $ham[$i]['target_pk']);
                array_push($data_ham, $ham[$i]);
            }
            if ($i == $ham_count) $loop = false;
            if (count($target_ham) == $data_target) $loop = false;
            $i++;
        }
        $ham_count = count($target_ham);
        $data_count = count($target_ham);

        $spams = $this->Loves->find('all', [
            'conditions' => [
                'unlike' => true,
                'active' => true
            ],
            'order' => ['id' => 'DESC']
        ]);
        $spam_count = $spams->count() - 1;
        $loop = true;
        $data_spam = [];
        $target_spam = [];
        $i = 0;
        $spam = $spams->toArray();
        while ($loop) {
            if (!in_array($spam[$i]->target_pk, $target_spam)) {
                array_push($target_spam, $spam[$i]['target_pk']);
                array_push($data_spam, $spam[$i]);
            }
            if ($i == $spam_count) $loop = false;
            if (count($target_spam) == $data_target) $loop = false;
            $i++;
        }
        $spam_count = count($target_spam);

        if ($ham_count > $spam_count) $data_count = $spam_count;
        if ($data_count > 0) {
            $i = 0;
            $table1 = new ConsoleTable();
            $table1->setHeaders(['No', 'Username']);
            $table2 = new ConsoleTable();
            $table2->setHeaders(['No', 'Username']);
            $data_train = [];
            for ($i = 0; $i < $data_count; $i++) {
                $table1->addRow([$i, $data_ham[$i]['target_username']]);
                $table2->addRow([$i, $data_spam[$i]['target_username']]);
                // preg_replace replace non alphanumeric with space
                //array_push($data_train, ['ham', preg_replace("/(\W)+/", " ", $data_ham[$i]['caption'])]);
                //array_push($data_train, ['spam', preg_replace("/(\W)+/", " ", $data_spam[$i]['caption'])]);
                array_push($data_train, ['ham', $this->textCleaning($data_ham[$i]['caption'])]);
                array_push($data_train, ['spam', $this->textCleaning($data_spam[$i]['caption'])]);
            }
            // Training
            $tset = new TrainingSet();
            $tok = new WhitespaceTokenizer();
            $ff = new DataAsFeatures();
            foreach ($data_train as $d) {
                $tset->addDocument(
                    $d[0],
                    new TokensDocument($tok->tokenize($d[1]))
                );
            }
            $model = new FeatureBasedNB();
            $model->train($ff, $tset);
            $classifier = new MultinomialNBClassifier($ff, $model);

            // Write classifier
            $classifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . '0';
            $file = new File($classifiersPath, true, 755);
            $file->write(serialize($classifier));
        }
    }


    public function training($accountUsername = null)
    {
        $this->trainingDefault();
        if ($accountUsername == null) {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Projects.active' => true,
                    'Projects.status' => true
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        } else {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Accounts.username' => $accountUsername
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        }

        foreach ($projects as $project) {
            echo 'Create classifier for ' . $project->name . PHP_EOL;

            $hams = $this->Loves->find('all', [
                'conditions' => [
                    'account_pk' => $project->account->pk,
                    'unlike' => false,
                    'active' => true
                ],
                'order' => ['id' => 'DESC']
            ]);
            $ham_count = $hams->count() - 1;
            $loop = true;
            $data_ham = [];
            $target_ham = [];
            $i = 0;
            $data_target = 256;
            $ham = $hams->toArray();
            while ($loop) {
                if (!in_array($ham[$i]->target_pk, $target_ham)) {
                    array_push($target_ham, $ham[$i]['target_pk']);
                    array_push($data_ham, $ham[$i]);
                }
                if ($i == $ham_count) $loop = false;
                if (count($target_ham) == $data_target) $loop = false;
                $i++;
            }
            $ham_count = count($target_ham);
            $data_count = count($target_ham);

            $spams = $this->Loves->find('all', [
                'conditions' => [
                    'account_pk' => $project->account->pk,
                    'unlike' => true,
                    'active' => true
                ],
                'order' => ['id' => 'DESC']
            ]);
            $spam_count = $spams->count() - 1;
            $loop = true;
            $data_spam = [];
            $target_spam = [];
            $i = 0;
            $spam = $spams->toArray();
            while ($loop) {
                if (!in_array($spam[$i]->target_pk, $target_spam)) {
                    array_push($target_spam, $spam[$i]['target_pk']);
                    array_push($data_spam, $spam[$i]);
                }
                if ($i == $spam_count) $loop = false;
                if (count($target_spam) == $data_target) $loop = false;
                $i++;
            }
            $spam_count = count($target_spam);

            if ($ham_count > $spam_count) $data_count = $spam_count;
            if ($data_count > 0) {
                $i = 0;
                $table1 = new ConsoleTable();
                $table1->setHeaders(['No', 'Username']);
                $table2 = new ConsoleTable();
                $table2->setHeaders(['No', 'Username']);
                $data_train = [];
                for ($i = 0; $i < $data_count; $i++) {
                    $table1->addRow([$i, $data_ham[$i]['target_username']]);
                    $table2->addRow([$i, $data_spam[$i]['target_username']]);
                    array_push($data_train, ['ham', $this->textCleaning($data_ham[$i]['caption'])]);
                    array_push($data_train, ['spam', $this->textCleaning($data_spam[$i]['caption'])]);
                    //array_push($data_train, ['ham', preg_replace("/(\W)+/", " ", $data_ham[$i]['caption'])]);
                    //array_push($data_train, ['spam', preg_replace("/(\W)+/", " ", $data_spam[$i]['caption'])]);
                }
                // Training
                $tset = new TrainingSet();
                $tok = new WhitespaceTokenizer();
                $ff = new DataAsFeatures();
                foreach ($data_train as $d) {
                    $tset->addDocument(
                        $d[0],
                        new TokensDocument($tok->tokenize($d[1]))
                    );
                }
                $model = new FeatureBasedNB();
                $model->train($ff, $tset);
                $classifier = new MultinomialNBClassifier($ff, $model);

                // Write classifier
                $classifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . $project->account->pk;
                $file = new File($classifiersPath, true, 755);
                $file->write(serialize($classifier));
            }
        }
    }

    public function testing($accountUsername = null)
    {
        if ($accountUsername != null) {
            $account = $this->Accounts->find('all', [
                'conditions' => ['username' => $accountUsername]
            ]);
            $account = $account->first();
            $classifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . $account->pk;
            $defaultClassifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . '0';

            $file = new File($classifiersPath);
            $fileDefault = new File($defaultClassifiersPath);
            $dataCount = 100;

            if ($file->exists()) {
                $f = $file->read(true, 'r');
                $classifier = unserialize($f);
            } else {
                $f = $fileDefault->read(true, 'r');
                $classifier = unserialize($f);
            }

            $data = $this->Loves->find('all', [
                'conditions' => [
                    'username' => $accountUsername,
                    'active' => true
                ],
                'order' => ['id' => 'ASC'],
                'limit' => $dataCount
            ]);
            $correct = 0;
            $inaccurate = 0;
            $i = 1;

            $tok = new WhitespaceTokenizer();

            foreach ($data as $d) {
                $prediction = $classifier->classify(
                    ['ham', 'spam'],
                    new TokensDocument($tok->tokenize(preg_replace("/(\W)+/", " ", $d->caption)))
                );
                //echo $i . $d->caption . ' ' . $prediction . PHP_EOL;
                if ($d->unlike && $prediction == 'spam') $correct++;
                if (!$d->unlike && $prediction == 'ham') $correct++;
                if ($d->unlike && $prediction == 'ham') $inaccurate++;
                if (!$d->unlike && $prediction == 'spam') $inaccurate++;
                $i++;
            }
            echo 'Accuracy ' . ($correct/$dataCount) * 100 . '%' . PHP_EOL;
            echo 'Error Rate ' . ($inaccurate/$dataCount) * 100 . '%' . PHP_EOL;
        }
    }

    public function unliking($accountUsername = null)
    {
        if ($accountUsername == null) {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Projects.active' => true,
                    'Projects.status' => true
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        } else {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Accounts.username' => $accountUsername
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        }
        foreach ($projects as $project) {
            echo 'Check Unliking by ' . $project->name . PHP_EOL;
            $query = $this->Likes->find('all', [
                'conditions' => [
                    'account_id' => $project->account->id,
                    'DATE(created)' => date('Y-m-d'),
                    'active' => true
                ]
            ]);
            $likeCount = $query->count();
            $likeCount = $likeCount * 3;
            echo 'Like(s) today ' . $likeCount . PHP_EOL;
            if ($likeCount > 0) {
                try {
                    $ig = new Instagram();
                    if ($project['proxy_id'] > 1) {
                        $ig->setProxy('http://' . $project->proxy->name);
                    }
                    try {
                        $ig->login($project->account->username, $project->account->password);
                    } catch (Exception $e) {// try to login to ig
                        $this->out($e);
                    }
                } catch (Exception $e) {// try process to ig
                    $this->out($e);
                }
                $maxId = null;
                $likesCounter = 0;
                $likesPk = [];
                do {
                    $feed = $ig->media->getLikedFeed($maxId);
                    $maxId = $feed->next_max_id;
                    $likesCounter += (int)$feed->num_results;
                    for ($i = 0; $i < $feed->num_results; $i++) {
                        $data = $feed->items[$i];
                        if (!in_array($data->pk, $likesPk)) array_push($likesPk, $data->pk);
                        //print_r($data['image_versions2']['candidates'][0]['url']);
                        //echo $data->image_versions2->candidates[0]->url;
                        //echo PHP_EOL;
                    }// foreach medias liked
                    if ($likesCounter >= $likeCount) $maxId = null;// stop process if all today's like(s) has been downloaded
                    $this->sleep10();
                } while ($maxId !== null);
                // Update all today's like
                $query = $this->Likes->updateAll(
                    [// fields
                        'unlike' => true
                    ],
                    [// conditions
                        'account_id' => $project->account->id,
                        'DATE(created)' => date('Y-m-d'),
                        'active' => true
                    ]
                );
                foreach ($likesPk as $like) {
                    $post_id = 0;
                    $query = $this->Posts->find('all', [
                        'conditions' => [
                            'pk' => $like
                        ]
                    ]);
                    if ($query->count() > 0) {
                        $post = $query->first();
                        $post_id = $post->id;
                        $queryUpdate = $this->Likes->query();
                        $queryUpdate->update()
                                    ->set(['unlike' => false])
                                    ->where(['post_id' => $post_id, 'account_id' => $project->account->id, 'active' => true])
                                    ->execute();
                    }
                }
            }// likeCount > 0
            $this->blacklistingbyhashtag($project->account->username);
        }// foreach projects
    }

    private function blacklistingbyhashtag($accountUsername = null)
    {
        if ($accountUsername == null) {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Projects.active' => true,
                    'Projects.status' => true
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        } else {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Accounts.username' => $accountUsername
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        }
        foreach ($projects as $project) {
            $query = $this->Loves->find();
            $query->where([
                'account_id' => $project->account->id,
                'unlike'=> true,
                'active' => true
            ])
                  ->select([
                  'target_id' => 'target_id'
              ])
              ->group('target_id HAVING COUNT(Loves.target_id) > 1');
            $data = $query->all();
            $i = 1;
            foreach ($data as $d) {
                echo $i . ' ' . $d->target_id . PHP_EOL;
                $i++;
                $this->getInsertAccountlist($d->target_id, $project->id, false, false, false, 0);
            }
        }// foreach projects
    }

    private function getInsertAccountlist($account_id = 0, $project_id = 0, $which = false,
        $idol = false, $vip = false, $nextmaxid = 0)
    {
        $account_id = (int)$account_id;
        $project_id = (int)$project_id;
        $accountlist = $this->Accountlists->find('all', [
            'conditions' => [
                'account_id' => $account_id,
                'project_id' => $project_id,
                'which' => $which,
                'idol' => $idol,
                'vip' => $vip,
                'active' => true
            ]
        ]);
        if ($accountlist->count() > 0) {
            $ret = $accountlist->first();
            return $ret['id'];
        } else {
            $query = $this->Accountlists->query();
            $query->insert(['account_id', 'project_id', 'which', 'idol', 'vip', 'nextmaxid', 'created', 'modified', 'active'])
                  ->values([
                  'account_id' => $account_id,
                  'project_id' => $project_id,
                  'which' => $which,
                  'idol' => $idol,
                  'vip' => $vip,
                  'nextmaxid' => $nextmaxid,
                  'created' => Time::now(),
                  'modified' => Time::now(),
                  'active' => true

              ])
              ->execute();
            $ret = $this->Accountlists->find('all', [
                'account_id' => $account_id,
                'project_id' => $project_id,
                'which' => $which,
                'idol' => $idol,
                'vip' => $vip,
                'active' => true
            ])->first();
            return $ret->id;
        }

    }

    public function likinghashtag($accountUsername = null)
    {
        if ($accountUsername == null) {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Projects.active' => true,
                    'Projects.status' => true,
                    'Projects.likebyhashtag' => true
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        } else {
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Accounts.username' => $accountUsername
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
        }
        foreach ($projects as $project) {
            echo 'Liking by hashtag(s) for ' . $project->name . PHP_EOL;
            $query = $this->Accountlists->find('all', [
                'conditions' => [
                    'Accountlists.project_id' => $project->id,
                    'Accountlists.which' => false,
                    'Accountlists.active' => true
                ],
                'contain' => ['Accounts']
            ]);
            $targetBlacklistCount = $query->count();
            $targetBlacklist = [];
            foreach ($query as $row) array_push($targetBlacklist, $row->account->pk);

            $query = $this->Hashtaglists->find('all', [
                'conditions' => [
                    'Hashtaglists.project_id' => $project->id,
                    'Hashtaglists.which' => true,
                    'Hashtaglists.active' => true
                ],
                'contain' => ['Hashtags']
            ]);
            $hashtagWhitelistCount = $query->count();
            $hashtagWhitelist = [];
            foreach ($query as $row) array_push($hashtagWhitelist, $row->hashtag->name);

            $query = $this->Hashtaglists->find('all', [
                'conditions' => [
                    'Hashtaglists.project_id' => $project->id,
                    'Hashtaglists.which' => false,
                    'Hashtaglists.active' => true
                ],
                'contain' => ['Hashtags']
            ]);
            $hashtagBlacklistCount = $query->count();
            $hashtagBlacklist = [];
            foreach ($query as $row) array_push($hashtagBlacklist, $row->hashtag->name);

            /*$targetDate = new Date('2017-09-30');
            $query = $this->Likes->find('all', [
                'conditions' => [
                    'account_id' => $project->account->id,
                    'DATE(created)' => $targetDate->format('Y-m-d'),
                    'unlike' => false,
                    'active' => true
                ]
            ]);*/
            $query = $this->Likes->find('all', [
                'conditions' => [
                    'account_id' => $project->account->id,
                    'DATE(created)' => date('Y-m-d'),
                    'unlike' => false,
                    'active' => true
                ]
            ]);
            $likeCount = $query->count();
            echo 'Like(s) today ' . $likeCount . PHP_EOL;
            $likeMax = $project->maximumlike;
            $maximumLikePerBatch = 60;
            $likeThisBatch = 0;
            $likePerHashtag = floor(60 / $hashtagWhitelistCount);

            try {
                $ig = new Instagram();
                if ($project['proxy_id'] > 1) {
                    $ig->setProxy('http://' . $project->proxy->name);
                }
                try {
                    $ig->login($project->account->username, $project->account->password);
                } catch (Exception $e) {
                    $this->out($e);
                }

                foreach ($hashtagWhitelist as $hashtagWhite) {
                    echo 'hashtag ' . $hashtagWhite . PHP_EOL;
                    $rankToken = null;
                    $maxId = null;
                    $hashtagCounter = 1;
                    $overallCounter = 1;
                    do {
                        $feed = $ig->hashtag->getFeed($hashtagWhite, $rankToken, $maxId);
                        //if ($feed->more_available) {
                        $maxId = $feed->next_max_id;
                        //} else {
                        //$maxId = null;
                        //}
                        //$maxId = $feed->next_max_id;
                        //echo $maxId . PHP_EOL;
                        //$filename = $project->account->username . '_' . $hashtagWhite . '_' . $hashtagCounter . '.json';
                        //$this->createFile($filename, json_encode($feed, JSON_PRETTY_PRINT));
                        for ($i = 0; $i < $feed->num_results; $i++) {
                            $data = $feed->items[$i];
                            $process = true;

                            // Check if account never like this post
                            /*$query = $this->Likes->find('all', [
                                'conditions' => [
                                    'Likes.account_id' => $project->account->id,
                                    'Likes.active' => true,
                                    'Posts.pk' => $data->pk
                                ],
                                'contain' => ['Posts']
                            ]);*/
                            $query = $this->Loves->find('all', [
                                'conditions' => [
                                    'Loves.account_id' => $project->account->id,
                                    'Loves.active' => true,
                                    'Loves.post_pk' => $data->pk
                                ]
                            ]);
                            if ($query->count() > 0) {
                                $process = false;
                                //echo $overallCounter . ' Post has liked before, PK ' . $data->pk . PHP_EOL;
                            }

                            // Check if blacklist hashtags exists
                            $caption = '';
                            if (isset($data->caption->text)) $caption = $this->textCleaning($data->caption->text);
                            foreach ($hashtagBlacklist as $hashtagBlack) {
                                if (strpos($caption, $hashtagBlack) !== false) {
                                    $process = false;
                                    //echo $overallCounter . ' Hashtag Blacklist (' . $hashtagBlack . ')' . PHP_EOL . $caption . PHP_EOL;
                                }
                            }

                            // Check if blacklist target
                            if (in_array($data->user->pk, $targetBlacklist)) {
                                $process = false;
                                //echo $overallCounter . ' Target Blacklist' . PHP_EOL;
                                //echo $data->user->username . PHP_EOL;
                            }
                            /*foreach ($targetBlacklist as $targetBlack) {
                                if ($data->user->pk == $targetBlack) $process = false;
                            }*/

                            // Check text classifying
                            $tok = new WhitespaceTokenizer();
                            $classifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers';
                            $classifiersPath = $classifiersPath . DIRECTORY_SEPARATOR . $project->account->pk;
                            $defaultClassifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers';
                            $defaultClassifiersPath = $defaultClassifiersPath . DIRECTORY_SEPARATOR . '0';

                            $file = new File($classifiersPath);
                            $fileDefault = new File($defaultClassifiersPath);
                            if ($file->exists()) {
                                $f = $file->read(true, 'r');
                                $classifier = unserialize($f);
                            } else {
                                $f = $fileDefault->read(true, 'r');
                                $classifier = unserialize($f);
                            }
                            $prediction = $classifier->classify(
                                ['spam', 'ham'],
                                new TokensDocument($tok->tokenize($caption))
                            );
                            if ($prediction == 'spam') {
                                $process = false;
                                echo $overallCounter . ' Caption SPAM' . PHP_EOL;
                                //echo $caption . PHP_EOL;
                            }

                            if ($process) {
                                // Insert Location
                                $location_id = 1;
                                $lat = 0;
                                $lng = 0;
                                if (isset($data->location)) {
                                    $lat = $data->location->lat;
                                    $lng = $data->location->lng;
                                    $location_id = $this->getInsertLocation(
                                        $pk = $data->location->pk,
                                        $lat = $data->location->lat,
                                        $lng = $data->location->lng,
                                        $name = $data->location->name,
                                        $shortname = $data->location->short_name,
                                        $address = $data->location->address
                                    );
                                }
                                // Insert Account
                                $account_id = 1;
                                if (isset($data->user)) {
                                    $account_id = $this->getInsertAccount(
                                        $pk = $data->user->pk,
                                        $username = $data->user->username,
                                        $fullname = $data->user->full_name
                                    );
                                }
                                // Insert Post
                                $post_id = 1;
                                if (isset($data->pk)) {
                                    $post_id = $this->getInsertPost(
                                        $pk = $data->pk,
                                        $lat =  $lat,
                                        $lng = $lng,
                                        $account_id = $account_id,
                                        $location_id = $location_id,
                                        $likes = $data->like_count,
                                        $comments = $data->comment_count,
                                        $takenat = $data->taken_at,
                                        $sourceid = $data->id
                                    );
                                }
                                // Insert Caption
                                if (isset($data->caption->text)) {
                                    $comment_id = $this->getInsertComment(
                                        $post_id = $post_id,
                                        $pk = $data->caption->pk,
                                        $content = $data->caption->text,
                                        $caption = true,
                                        $account_id = $account_id,
                                        $who = true
                                    );
                                }
                                // Insert Media
                                if ($data->image_versions2 !== null) {
                                    $image = $data->image_versions2->candidates[0];
                                    $type_id = 1;
                                } elseif ($data->image_versions2 == null) {
                                    $image = $data->carousel_media[0]->image_versions2->candidates[0];
                                    $type_id = 3;
                                }
                                $this->getInsertMedia(
                                    $post_id = $post_id,
                                    $url = $image->url,
                                    $width = $image->width,
                                    $height = $image->height,
                                    $category = true,
                                    $type_id = $type_id
                                );

                                // Liking
                                $this->sleep5();
                                echo 'Liking ' . $image->url . PHP_EOL;
                                $likeResponse = $ig->media->like($data->id);
                                if ($likeResponse->status == 'ok') {
                                    // Insert Like
                                    $this->getInsertLike(
                                        $post_id = $post_id,
                                        $account_id = $project->account->id,
                                        $unlike = false,
                                        $who = false
                                    );
                                }

                                // Commenting
                                if ($project->commentbyhashtag && $data->location != null) {
                                    // Check if account never comment this post
                                    $query = $this->Comments->find('all', [
                                        'conditions' => [
                                            'Comments.account_id' => $project->account->id,
                                            'Comments.post_id' => $post_id,
                                            'Comments.active' => true
                                        ]
                                    ]);
                                    if ($query->count() < 1) {
                                        $comment = $this->generateComment(
                                            $account_name = $data->user->full_name,
                                            $location_name = $data->location->name,
                                            $location_shortname = $data->location->short_name,
                                            $lat = $data->location->lat,
                                            $lng = $data->location->lng
                                        );
                                        if ($comment != false) {
                                            echo 'Commenting' . PHP_EOL;
                                            $commentResponse = $ig->media->comment($data->id, $comment);
                                            if ($commentResponse->isStatus()) {
                                                // Insert Comment
                                                $this->getInsertComment(
                                                    $post_id = $post_id,
                                                    $pk = 0,
                                                    $content = $comment,
                                                    $caption = false,
                                                    $account_id = $project->account->id,
                                                    $who = false
                                                );
                                            }
                                        }
                                    }
                                }
                                //echo $hashtagCounter . $caption . PHP_EOL;
                                //echo PHP_EOL;
                                $likeCount++; // counter all like per day
                                $hashtagCounter++; // counter each hashtag
                                $likeThisBatch++; // counter like per batch
                            }
                            $overallCounter++;
                        }

                        if ($likeCount >= $likeMax) $maxId = null;
                        if ($hashtagCounter >= $likePerHashtag) $maxId = null;
                        if ($likeThisBatch >= $maximumLikePerBatch) $maxId = null;
                        $this->sleep10();
                        //$overallCounter++;
                    } while ($maxId !== null);
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

    private function textCleaning($text = null)
    {
        $text = strtolower($text);
        // remove url
        $ret = preg_replace('/\b((https?|ftp|file):\/\/|www\.)[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', ' ', $text);
        // remove mention
        $ret = preg_replace('/@([^@]+)/', ' ', $ret);
        // remove non alphanumeric
        //$ret = preg_replace("/(\W)+/", " ", $ret);
        $ret = preg_replace('/[^A-Za-z0-9]/', ' ', $ret);
        // remove extra spaces
        $ret = preg_replace('/\s+/', ' ', $ret);
        //echo $ret . PHP_EOL;
        return $ret;
    }

    public function hashtag($username = null, $password = null)
    {
        $ig = new Instagram();
        $username = 'miyazghayda';
        $password = 'jayapura';
        if (!empty($username)) {
            try {
                $ig->login($username, $password);
                $feed = $ig->hashtag->getFeed('exploreindonesia');
                //print_r($feed);
                echo $feed->num_results . PHP_EOL;
                $tok = new WhitespaceTokenizer();
                //$classifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . $account->pk;
                $defaultClassifiersPath = WWW_ROOT . DIRECTORY_SEPARATOR . 'classifiers' . DIRECTORY_SEPARATOR . '6045121554';

                //$file = new File($classifiersPath);
                $fileDefault = new File($defaultClassifiersPath);

                //if ($file->exists()) {
                //$f = $file->read(true, 'r');
                //$classifier = unserialize($f);
                //} else {
                $f = $fileDefault->read(true, 'r');
                $classifier = unserialize($f);
                //}
                /*$prediction = $classifier->classify(
                    ['ham', 'spam'],
                    new TokensDocument($tok->tokenize($d->caption))
                );*/

                if ($feed->num_results > 0) {
                    //$table = $this->Table;
                    //$table->setHeaders(['No', 'PK', 'Caption']);
                    $co = 1;
                    for ($i = 0; $i < $feed->num_results; $i++) {
                        $data = $feed->items[$i];
                        $prediction = $classifier->classify(
                            ['spam', 'ham'],
                            new TokensDocument($tok->tokenize(preg_replace("/(\W)+/", " ", $data->caption->text)))
                        );
                        if ($prediction == 'ham') {
                            if (isset($data->image_versions2)) {
                                echo $co . preg_replace("/(\W)+/", " ", $data->caption->text) . PHP_EOL;
                                //echo $co . $data->caption->text . ' ' . $prediction  . ' ' . $data->image_versions2->candidates[0]->url. PHP_EOL;
                                $co++;
                            } elseif(isset($data->carousel_media)) {
                                echo $co . preg_replace("/(\W)+/", " ", $data->caption->text) . PHP_EOL;
                                //echo $co . $data->caption->text . ' ' . $prediction  . ' ' . $data->carousel_media[0]->image_versions2->candidates[0]->url. PHP_EOL;
                                $co++;
                                //print_r($data);
                            }
                        }
                        if (isset($data->image_versions2)) {
                            //echo preg_replace("/[^A-Za-z0-9]/", " ", $data->caption->text) . PHP_EOL;
                            //echo $data->image_versions2->candidates[0]->url. PHP_EOL;
                        }

                        //print_r($data);
                        // for full class object, see https://github.com/mgp25/Instagram-API/blob/master/src/Response/Model/Item.php
                        //echo $i . $data->caption->text . ' ' . $prediction  . ' ' . $data->image_versions2->candidates[0]->url. PHP_EOL;
                        //$table->addRow([$i, $data->pk, $data->caption->text]);
                    }
                    //$table->display();
                    //echo $feed->auto_load_more_enabled;
                }
            } catch (Exception $e) {
                echo $e;
            }
        } else {
            echo 'test';
        }
    }

    public function approveInvite($username = null, $password = null)
    {
        //$ig = new Instagram(true, true);
        $ig = new Instagram();
        if (!empty($username)) {
            try {
                $ig->login($username, $password);
                $pending = $ig->people->getPendingFriendships();
                if (count($pending->users) > 0) {
                    for ($i = 0; $i < count($pending->users); $i++) {
                        // sleep for a while
                        //sleep(10);
                        $this->sleep10();
                        $ig->people->approveFriendship($pending->users[$i]->pk);
                        echo $pending->users[$i]->username;
                    }
                }
            } catch (Exception $e) {
                echo $e;
            }
        } else {
            // Process all active projects if it is private account
            $projects = $this->Projects->find('all', [
                'conditions' => [
                    'Projects.active' => true,
                    'Projects.status' => true,
                    'Projects.closed' => true
                ],
                'contain' => ['Proxies', 'Accounts']
            ]);
            $iProject = 1;
            foreach($projects as $value) {
                $text = $iProject . '. Processing ' . $value->name;
                $iProject++;
                $this->out($text);
                try {
                    if ($value->proxy_id > 1) {
                        $ig->setProxy($value->proxy->name);
                    }
                    $ig->login($value->account->username, $value->account->password);
                    $pending = $ig->people->getPendingFriendships();
                    $iApprove = 1;
                    if (count($pending->users) > 0) {
                        for ($i = 0; $i < count($pending->users); $i++) {
                            // sleep for a while so ig wont suspicious
                            $this->sleep10();
                            $text = $iApprove . ' approving ' . $pending->users[$i]->username;
                            $iApprove++;
                            $this->out($text);

                            $ig->people->approveFriendship($pending->users[$i]->pk);
                            echo $pending->users[$i]->username;
                        }
                    }
                } catch (Exception $e) {
                    echo $e;
                }
            }
        }
    }

    private function getInsertComment($post_id = 0, $pk = 0, $content = null, $caption = true, $account_id = 0, $who = true)
    {
        $comment = $this->Comments->find('all', [
            'conditions' => [
                'post_id' => $post_id,
                'pk' => $pk
            ]
        ]);
        if ($comment->count() > 0) {
            $ret = $comment->first();
            return $ret['id'];
        } else {
            $post_id = (int)$post_id;
            $pk = (int)$pk;
            $content = trim($content);
            $account_id = (int)$account_id;
            $query = $this->Comments->query();
            $query->insert(['post_id', 'pk', 'content', 'caption', 'account_id', 'who', 'active'])
                  ->values([
                  'post_id' => $post_id,
                  'pk' => $pk,
                  'content' => $content,
                  'caption' => $caption,
                  'account_id' => $account_id,
                  'who' => $who,
                  'active' => true
              ])
              ->execute();
            $ret = $this->Comments->find('all', ['conditions' => ['pk' => $pk]])->first();
            return $ret->id;
        }
    }

    public function testa()
    {
        print_r($this->calculateDistance($connection = null, $lat = '-7.692279', $lng = '108.538399'));
    }

    private function generateComment($account_name = null, $location_name = null, $location_shortname = null, $lat = 0, $lng = 0)
    {
        $nearestLocation = $this->calculateDistance($connection = null, $lat = $lat, $lng = $lng);
        $nearestLocationName = $nearestLocation['name'];
        $nearestLocationDistance = $nearestLocation['distance'];
        $ret = false;
        $location_shortname = strtolower($location_shortname);
        $location_shortname = str_replace('indonesia', '', $location_shortname);
        $location_shortname = str_replace('bersponsor', '', $location_shortname);

        if (!empty($location_shortname)) {
            $account_name = explode(' ', $account_name);
            if (count($account_name) > 0) {
                $account_firstname = strtolower($account_name[0]);
            } else {
                $account_firstname = '';
            }

            $ret = '';
            if ($nearestLocationDistance < 3) {
                $ret = 'ini dimananya ' . $nearestLocationName . ', kak?';
            } else {
                $ret = 'kalo dari ' . $nearestLocationName . ' naik apa, kak?';
            }

            $rand = rand(1, 4);
            switch ($rand) {
            case 1:
                $ret = 'di ' . $location_shortname . ', kak ' . $account_firstname . '?';
                break;
            case 2:
                $ret = 'ini di ' . $location_shortname . ' ya, kak ' . $account_firstname . '?';
                break;
            case 3:
                $ret = $location_shortname . ' bagus juga ya, kak ' . $account_firstname . '?';
                break;
            case 4:
                $ret = $ret;
                break;
            }
        }
        return $ret;
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     * source https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
     */
    private function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }

    private function calculateDistance($connection = null, $lat = 0, $lng = 0)
    {
        if ($connection == null) $connection = ConnectionManager::get('default');
        //echo 'latitude: ' . $lat . ' longitude: ' . $lng . PHP_EOL;
        $rawQuery = 'SELECT name, lat, lng FROM regencies ORDER BY geom <-> ST_SetSRID(ST_MakePoint(' . (string)$lng . ',' . (string)$lat . '), 4326) LIMIT 1;';
        $query = $connection->execute($rawQuery);
        $ret = $query->fetch('assoc');
        $distance = $this->vincentyGreatCircleDistance($lat, $lng, $ret['lat'], $ret['lng']);
        // Distance in meter
        //return ['name' => $ret['name'], 'distance' => $distance];
        // Distance in km (rounded down)
        return ['name' => strtolower($ret['name']), 'distance' => (int)floor($distance/1000)];
    }

    private function getInsertLike($post_id = 0, $account_id = 0, $unlike = false, $who = false)
    {
        $like = $this->Likes->find('all', [
            'conditions' => ['post_id' => $post_id, 'account_id' => $account_id, 'active' => true]
        ]);
        if ($like->count() > 0) {
            $ret = $like->first();
            return $ret['id'];
        } else {
            $post_id = (int)$post_id;
            $account_id = (int)$account_id;
            $query = $this->Likes->query();
            $query->insert(['post_id', 'account_id', 'created', 'modified', 'unlike', 'who', 'active'])
                  ->values([
                  'post_id' => $post_id,
                  'account_id' => $account_id,
                  'created' => Time::now(),
                  'modified' => Time::now(),
                  'unlike' => $unlike,
                  'who' => $who,
                  'active' => true
              ])
              ->execute();
            $ret = $this->Likes->find('all', ['conditions' => ['post_id' => $post_id, 'account_id' => $account_id]])->first();
            return $ret->id;
        }
    }

    private function getInsertMedia($post_id = 0, $url = null, $width = 0, $height = 0, $category = true, $type_id = 0)
    {
        $media = $this->Media->find('all', [
            'conditions' => ['post_id' => $post_id, 'active' => true]
        ]);
        if ($media->count() > 0) {
            $ret = $media->first();
            return $ret['id'];
        } else {
            $post_id = (int)$post_id;
            $url = trim($url);
            $urls = explode('jpg', $url);
            $url = $urls[0] . 'jpg';
            $width = (int)$width;
            $height = (int)$height;
            $type_id = (int)$type_id;
            $query = $this->Media->query();
            $query->insert(['post_id', 'url', 'width', 'height', 'created', 'modified', 'category', 'active', 'type_id'])
                  ->values([
                  'post_id' => $post_id,
                  'url' => $url,
                  'width' => $width,
                  'height' => $height,
                  'created' => Time::now(),
                  'modified' => Time::now(),
                  'category' => $category,
                  'active' => true,
                  'type_id' => $type_id
              ])
              ->execute();
            $ret = $this->Media->find('all', ['conditions' => ['post_id' => $post_id]])->first();
            return $ret->id;
        }
    }

    private function getInsertPost($pk = 0, $lat = 0, $lng = 0, $account_id = 0, $location_id = 0, $likes = 0, $comments = 0,
        $takenat = 0, $sourceid = null)
    {
        $post = $this->Posts->find('all', [
            'conditions' => [
                'pk' => $pk,
                'active' => true
            ]
        ]);
        if ($post->count() > 0) {
            $ret = $post->first();
            return $ret['id'];
        } else {
            $account_id = (int)$account_id;
            $location_id = (int)$location_id;
            $pk = (int)$pk;
            $lat = (float)$lat;
            $lng = (float)$lng;
            $likes = (int)$likes;
            $comments = (int)$comments;
            $takenat = (int)$takenat;
            $sourceid = trim($sourceid);
            $query = $this->Posts->query();
            $query->insert(['pk', 'account_id', 'location_id', 'lat', 'lng', 'likes', 'comments', 'takenat', 'active', 'created', 'modified', 'sourceid'])
                  ->values([
                  'pk' => $pk,
                  'account_id' => $account_id,
                  'location_id' => $location_id,
                  'lat' => $lat,
                  'lng' => $lng,
                  'likes' => $likes,
                  'comments' => $comments,
                  'takenat' => $takenat,
                  'active' => true,
                  'created' => Time::now(),
                  'modified' => Time::now(),
                  'sourceid' => $sourceid
              ])
              ->execute();
            $ret = $this->Posts->find('all', ['conditions' => ['pk' => $pk]])->first();
            return $ret->id;
        }
    }

    private function getInsertLocation($pk = 0, $lat = 0, $lng = 0, $address = null, $name = null, $shortname = null)
    {
        $location = $this->Locations->find('all', [
            'conditions' => [
                'pk' => $pk,
                'active' => true
            ]
        ]);
        if ($location->count() < 1) {
            $lat = (float)$lat;
            $lng = (float)$lng;
            $address = trim($address);
            $name = trim($name);
            $shortname = trim($shortname);
            $query = $this->Locations->query();
            $query->insert(['pk', 'lat', 'lng', 'address', 'name', 'shortname', 'active'])
                  ->values([
                  'pk' => $pk,
                  'lat' => $lat,
                  'lng' => $lng,
                  'address' => $address,
                  'name' => $name,
                  'shortname' => $shortname,
                  'active' => true
              ])
              ->execute();
            $ret = $this->Locations->find('all', ['conditions' => ['pk' => $pk]])->first();
            return $ret->id;
        } else {
            $ret = $location->first();
            return $ret['id'];
        }
    }

    private function getInsertLetter($messageid = 0, $userid = 0, $username = null,
        $firstname = null, $lastname = null, $takenat = 0, $description = null)
    {
        $letter = $this->Letters->find('all', [
            'conditions' => [
                'Letters.messageid' => $messageid,
                'Letters.active' => true
            ]
        ]);
        if ($letter->count() < 1) {
            $description = trim($description);
            $query = $this->Letters->query();
            $query->insert(['messageid', 'userid', 'username', 'firstname', 'lastname', 'description', 'takenat', 'active', 'lettertype', 'sequence'])
                  ->values([
                  'messageid' => (int)$messageid,
                  'userid' => (int)$userid,
                  'username' => $username,
                  'firstname' => $firstname,
                  'lastname' => $lastname,
                  'description' => $description,
                  'takenat' => (int)$takenat,
                  'lettertype' => 0,
                  'sequence' => 0,
                  'active' => true
              ])
              ->execute();
            return true;
        } else {
            return false;
        }
    }

    public function botRegister()
    {
        /*$apiFile = new File(WWW_ROOT . 'api.txt', false, 0644);
        $apiKey = $apiFile->read();
        $ap = (string)$apiKey;
        $apiFile->close();
        $this->out((string)$ap);
        $telegram = new Api("'$ap'");*/
        $telegram = new Api('539549347:AAEk1Le8tsc-KvjqKcIrm2RiQ7j2MLO5Yb4');
        while (true) {
            sleep(5);
            $response = $telegram->getUpdates();
            if (count($response) > 0) {
                foreach ($response as $value) {
                    $messageid = $value->get('update_id');
                    $userid = $value->get('message')->get('from')->get('id');
                    $username = $value->get('message')->get('from')->get('username');
                    $firstname = $value->get('message')->get('from')->get('first_name');
                    $lastname = $value->get('message')->get('from')->get('last_name');
                    $takenat = $value->get('message')->get('date');
                    $description = trim($value->get('message')->get('text'));

                    // get last message
                    $lastLetter = $this->Letters->find('all', [
                        'conditions' => ['userid' => $userid, 'active' => true],
                        'order' => ['messageid' => 'DESC']
                    ])->first();

                    // insert new message to db
                    $isNew = $this->getInsertLetter($messageid, $userid, $username, $firstname, $lastname, $takenat, $description);

                    // ----------------- registration ------------------------
                    if ($isNew && $description == '/start') {
                        $letter = $this->Letters->query();
                        $letter->update()
                               ->set(['lettertype' => 1, 'sequence' => 1])
                               ->where(['messageid' => $messageid])
                               ->execute();
                        $telegram->sendMessage([
                            'chat_id' => $userid,
                            'text' => 'Masukkan username Akun IG.'
                        ]);
                    } elseif($isNew && strpos($description, '/reply_') !== false) {
                        $letter = $this->Letters->query();
                        $letter->update()
                               ->set(['lettertype' => 2, 'sequence' => 1])
                               ->where(['messageid' => $messageid])
                               ->execute();
                        $id = (int)str_replace('/reply_', '', $description);
                        $message = $this->Messages->find('all', [
                            'conditions' => ['Messages.id' => $id],
                            'contain' => ['Accounts']
                        ])->first();
                        $text = 'Balas DM dari ' . $message['account']['fullname'];
                        $text = $text . ' (@' . $message['account']['username'] . ': ';
                        $text = $text . $message['content'];
                        $text = $text . '  Ketikkan balasan.';
                        $telegram->sendMessage([
                            'chat_id' => $userid,
                            'text' => $text
                        ]);
                        // ----------------- free context  ------------------------
                    } elseif($isNew) {
                        // check if registration  (lettertype = 1) sequence is #1
                        if ($lastLetter['lettertype'] == 1 && $lastLetter['sequence'] == 1) {
                            $letter = $this->Letters->query();
                            $letter->update()
                                   ->set(['lettertype' => 1, 'sequence' => 2])
                                   ->where(['messageid' => $messageid])
                                   ->execute();

                            $telegram->sendMessage([
                                'chat_id' => $userid,
                                'text' => 'Masukkan password Akun IG.'
                            ]);
                            // check if registration  (lettertype = 1) sequence is #2
                        } elseif ($lastLetter['lettertype'] == 1 && $lastLetter['sequence'] == 2) {
                            $letter = $this->Letters->query();
                            $letter->update()
                                   ->set(['lettertype' => 1, 'sequence' => 3])
                                   ->where(['messageid' => $messageid])
                                   ->execute();

                            $project = $this->Projects->find('all', [
                                'conditions' => [
                                    'Projects.active' => true,
                                    'Projects.status' => true,
                                    'Accounts.username' => $lastLetter['description'],
                                    'Accounts.password' => $description
                                ],
                                'contain' => ['Accounts']
                            ]);
                            if ($project->count() < 1) {
                                $telegram->sendMessage([
                                    'chat_id' => $userid,
                                    'text' => 'Username dan password IG tidak dikenali, silahkan ulangi melakukan dengan mengetik /start'
                                ]);
                            } else {
                                $project = $project->first();
                                $proj = $this->Projects->get($project['id']);
                                $proj->telegramid = $userid;
                                $this->Projects->save($proj);
                                $telegram->sendMessage([
                                    'chat_id' => $userid,
                                    'text' => 'Pendaftaran berhasil. Anda akan mendapat informasi jika terdapat Direct Message (DM) baru pada Akun IG ' . $project['account']['username'] . '.'
                                ]);
                            }
                        } elseif($lastLetter['lettertype'] == 2 && $lastLetter['sequence'] == 1) {
                            $letter = $this->Letters->query();
                            $letter->update()
                                   ->set(['lettertype' => 2, 'sequence' => 2])
                                   ->where(['messageid' => $messageid])
                                   ->execute();
                            $id = (int)str_replace('/reply_', '', $lastLetter['description']);
                            $message = $this->Messages->find('all', [
                                'conditions' => ['Messages.id' => $id],
                                'contain' => ['Accounts', 'Targets']
                            ])->first();
                            $project = $this->Projects->find('all', [
                                'conditions' => ['Projects.account_id' => $message['target']['id']],
                                'contain' => ['Accounts', 'Proxies']
                            ])->first();
                            $ig = new Instagram();
                            if ($project['proxy_id'] > 1) {
                                $ig->setProxy('http://' . $project['proxy']['name']);
                            }
                            try {
                                $ig->login($project['account']['username'], $project['account']['password']);
                                $ig->direct->sendText(['thread' => $message['threadid']], trim($description));
                            } catch (Exception $e) {
                                $this->out($e);
                            }
                        } else {
                            $telegram->sendMessage([
                                'chat_id' => $userid,
                                'text' => 'Belum terdapat menu lain.'
                            ]);
                        }
                    }
                }
            }
        }
    }

    private function getInsertAccount($pk = 0, $username = null, $fullname = null)
    {
        $account = $this->Accounts->find('all', [
            'conditions' => ['pk' => $pk]
        ]);
        if ($account->count() > 0) {
            $account = $account->first();
            return $account['id'];
        } else {
            $query = $this->Accounts->query();
            $query->insert(['pk', 'user_id', 'username', 'fullname', 'password', 'description', 'created', 'modified'])
                  ->values([
                  'pk' => $pk,
                  'user_id' => 1,
                  'username' => trim($username),
                  'fullname' => trim($fullname),
                  'password' => 'None',
                  'description' => 'None',
                  'created' => Time::now(),
                  'modified' => Time::now()
              ])
              ->execute();
            $account = $this->Accounts->find('all', ['conditions' => ['pk' => $pk]])->first();
            return $account->id;
        }
    }

    private function getInsertMessage($account_id = 0, $target_id = 0, $threadid = null, $itemid = null, $takenat = 0, $content = null, $cursornewest = null, $cursoroldest = null)
    {
        $message = $this->Messages->find('all', [
            'conditions' => ['threadid' => $threadid, 'itemid' => $itemid]
        ]);
        if ($message->count() > 0) {
            $message = $message->first();
            //return $message->threadid;
            return $message->id;
        } else {
            $query = $this->Messages->query();
            $query->insert(['account_id', 'target_id', 'threadid', 'itemid', 'takenat', 'content', 'read',
                'created', 'modified', 'active', 'cursornewest', 'cursoroldest'])
                  ->values([
                  'account_id' => (int)$account_id,
                  'target_id' => (int)$target_id,
                  'threadid' => trim($threadid),
                  'itemid' => trim($itemid),
                  'takenat' => (int)$takenat,
                  'content' => trim($content),
                  'read' => false,
                  'created' => Time::now(),
                  'modified' => Time::now(),
                  'active' => true,
                  'cursornewest' => trim($cursornewest),
                  'cursoroldest' => trim($cursoroldest)
              ])
              ->execute();
            $message = $this->Messages->find('all', ['conditions' => ['threadid' => $threadid, 'itemid' => $itemid]])->first();
            return $message->id;
        }
    }

    public function botDm()
    {
        $projects = $this->Projects->find('all', [
            'conditions' => [
                'Projects.active' => true,
                'Projects.status' => true,
                'Projects.telegramid !=' => 0
            ],
            'contain' => ['Accounts', 'Proxies']
        ]);
        if ($projects->count() > 0) {
            $ig = new Instagram();
            $projects = $projects->all();
            foreach ($projects as $project) {
                $this->out('Process ' . $project['account']['username']);
                try {
                    if ($project['proxy_id'] > 1) {
                        $ig->setProxy('http://' . $project['proxy']['name']);
                    }
                    $ig->login($project['account']['username'], $project['account']['password']);
                    $pendings = $ig->direct->getPendingInbox();
                    if ($pendings->pending_requests_total > 0) {
                        foreach ($pendings->inbox->threads as $message) {
                            if ($message->last_permanent_item->item_type == 'text') {
                                $content = $message->last_permanent_item->text;
                            } else {
                                $content = 'Bukan teks';
                            }
                            $accountPk = $message->inviter->pk;
                            $accountUsername = $message->inviter->username;
                            $accountFullname = $message->inviter->full_name;
                            $account_id = $this->getInsertAccount($accountPk, $accountUsername, $accountFullname);
                            $target_id = $project['account']['id'];
                            $threadid = trim($message->thread_id);
                            $itemid = trim($message->items[0]->item_id);
                            $takenat = (int)$message->items[0]->timestamp;
                            $cursornewest = trim($message->newest_cursor);
                            $cursoroldest = trim($message->oldest_cursor);
                            $message_id = $this->getInsertMessage($account_id, $target_id, $threadid, $itemid, $takenat,
                                $content, $cursornewest, $cursoroldest);

                            // mark dm, on ig as seen
                            $ig->direct->approvePendingThreads([$message->thread_id]);
                            $ig->direct->markItemSeen($message->thread_id, $message->items[0]->item_id);

                            // send text to telegram
                            $text = 'DM dari ' . $message->inviter->full_name . ' (@' . $message->inviter->username . '):';
                            $text = $text . $content . '  /reply_' . $message_id;

                            $this->Telegram->sendMessage([
                                'chat_id' => $project['telegramid'],
                                'text' => $text
                            ]);
                        }
                    } else {
                        $inbox = $ig->direct->getInbox();
                        if ($inbox->inbox->unseen_count > 0) {
                            $message = $inbox->inbox->threads;
                            for ($i = 0; $i < $inbox->inbox->unseen_count; $i++) {
                                if ($message[$i]->last_permanent_item->item_type == 'text') {
                                    $content = $message[$i]->last_permanent_item->text;
                                } else {
                                    $content = 'Bukan teks';
                                }
                                // if message is not from project's account
                                if ($message[$i]->items[0]->user_id != $project['account']['pk']) {
                                    $accountPk = $message[$i]->inviter->pk;
                                    $accountUsername = $message[$i]->inviter->username;
                                    $accountFullname = $message[$i]->inviter->full_name;
                                    $account_id = $this->getInsertAccount($accountPk, $accountUsername, $accountFullname);
                                    $target_id = $project['account']['id'];
                                    $threadid = trim($message[$i]->thread_id);
                                    $itemid = trim($message[$i]->items[0]->item_id);
                                    $takenat = (int)$message[$i]->items[0]->timestamp;
                                    $cursornewest = trim($message[$i]->newest_cursor);
                                    $cursoroldest = trim($message[$i]->oldest_cursor);
                                    $message_id = $this->getInsertMessage($account_id, $target_id, $threadid, $itemid, $takenat,
                                        $content, $cursornewest, $cursoroldest);

                                    // mark dm, on ig as seen
                                    $ig->direct->markItemSeen($message[$i]->thread_id, $message[$i]->items[0]->item_id);

                                    // send text to telegram
                                    $text = 'DM dari ' . $message[$i]->inviter->full_name . ' (@' . $message[$i]->inviter->username . '):';
                                    $text = $text . $content . '  /reply_' . $message_id;

                                    $this->Telegram->sendMessage([
                                        'chat_id' => $project['telegramid'],
                                        'text' => $text
                                    ]);
                                }
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo $e;
                }
            }
            /*$telegram->sendMessage([
                'chat_id' => $userid,
                'text' => 'Username dan password IG tidak dikenali, silahkan ulangi melakukan dengan mengetik /start'
            ]);*/
        }
    }
}
