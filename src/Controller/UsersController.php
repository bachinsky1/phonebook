<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }

    //  public function index()
    //  {
    //     $this->set('users', $this->Users->find('all'));
    // }

    // public function view($id)
    // {
    //     $user = $this->Users->get($id);
    //     $this->set(compact('user'));
    // }

    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->set('authUser', $this->Auth->user());
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Неправильный логин или пароль'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Пользователь добавлен.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Не удалось добавить пользователя'));
        }
        $this->set('user', $user);
    }
}
