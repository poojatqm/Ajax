<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'signup']);
    }
    public function index()
    {
        $user = $this->paginate();
        $this->set(compact('user'));
    }
    public function signup()
    {
        $this->viewBuilder()->setLayout('common');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $image = $this->request->getData('user_profile.image');
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            $image->moveTo($targetPath);
            $user['user_profile']->image = $name;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Users has been updated'));
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Users has been updated"
                ));
                exit;
            } else {
                $this->Flash->error(__('Failed to update student data'));
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to update student data"
                ));
                exit;
            }
        }
        $this->set(compact('user'));
    }
    public function login()
    {
        $this->viewBuilder()->setLayout('common');
        $this->loadModel('UserProfiles');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();
            if ($user->user_type == 1) {
                $email = $this->request->getData('email');
                $usertable = TableRegistry::get('Users');
                $findall = $usertable->find('All')->contain('UserProfiles')->where(['email' => $email])->first();
                $session = $this->getRequest()->getSession();
                $session->write('user_details', $findall);
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            } else {
                $this->Flash->success(__('you are not admin'));
                return $this->redirect(['controller' => 'users', 'action' => 'logout']);
            }
            // $entity = $this->Users->get(3);
            // $result = $this->Users->delete($entity);

            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    public function userdata()
    {
        $user = $this->Users->find()->contain(['UserProfiles']);
        $this->set(compact('user'));
    }
    public function userStatus($id = null, $status = null)
    {

        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The status has been changed'));
        }
        return $this->redirect(['action' => 'userdata']);
    }
    public function delete($id = null)
    {
        if ($this->request->is('ajax')) {

            $user = $this->Users->get($id, [
                'contain' => ['UserProfiles'],
            ]);

            if ($this->Users->delete($user)) {

                $this->Flash->success(__('The user has been deleted.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The user has been deleted."
                ));

                exit;
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The user could not be deleted. Please, try again."
                ));

                exit;
            }
        }
    }

    public function viewuser($id = null)
    {
        // $this->viewBuilder()->setLayout('common');
    //     $user = $this->Users->find()->contain('UserProfiles')->where(['id'=>$id]);
    //    dd($user);
        $user = $this->Users->find('all')->contain(['UserProfiles'])->where(['user_id'=>$id]);
        $this->set(compact('user'));
    }


    public function edituser($id = null)
    {
        // $this->viewBuilder()->setLayout('common');
        $user = $this->Users->get($id, [
            'contain' => ['UserProfiles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userdata']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function profile()
    {
        $this->viewBuilder()->setLayout('common');
    }
}
