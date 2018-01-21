<?php
namespace App\Shell;
use Cake\Console\Shell;
use InstagramAPI\Instagram;
use Telegram\Bot\Api;


class TestShell extends Shell
{
    public $Projects;
    public $Accounts;
    public $Letters;

    public function initialize()
    {
        parent::initialize();
        $this->Projects = $this->loadModel('Projects');
        $this->Accounts = $this->loadModel('Accounts');
        $this->Letters = $this->loadModel('Letters');
    }

    public function main()
    {
        //$this->out('Hello');
        $ig = new Instagram(true, true);
        $ig->login('miyazghayda', 'jayapura');
        $userId = $ig->people->getUserIdForName('miyazghayda');
        $this->out($userId);
    }

    private function sleep10()
    {
        $this->out('sleep randomly for 10 secs');
        sleep(rand(1, 10));
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

    private function getInsertLetter($messageid = 0, $userid = 0, $username = null, $firstname = null, $lastname = null, $takenat = 0, $description = null)
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
        while (true) {
            sleep(5);
            $telegram = new Api('539549347:AAEk1Le8tsc-KvjqKcIrm2RiQ7j2MLO5Yb4');
            //$response = $telegram->getMe();
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
}
