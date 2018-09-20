<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomersCategories Controller
 *
 * @property \App\Model\Table\CustomersCategoriesTable $CustomersCategories
 *
 * @method \App\Model\Entity\CustomersCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Categories']
        ];
        $customersCategories = $this->paginate($this->CustomersCategories);

        $this->set(compact('customersCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Customers Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customersCategory = $this->CustomersCategories->get($id, [
            'contain' => ['Customers', 'Categories']
        ]);

        $this->set('customersCategory', $customersCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customersCategory = $this->CustomersCategories->newEntity();
        if ($this->request->is('post')) {
            $customersCategory = $this->CustomersCategories->patchEntity($customersCategory, $this->request->getData());
            if ($this->CustomersCategories->save($customersCategory)) {
                $this->Flash->success(__('The customers category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers category could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersCategories->Customers->find('list', ['limit' => 200]);
        $categories = $this->CustomersCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('customersCategory', 'customers', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customers Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customersCategory = $this->CustomersCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customersCategory = $this->CustomersCategories->patchEntity($customersCategory, $this->request->getData());
            if ($this->CustomersCategories->save($customersCategory)) {
                $this->Flash->success(__('The customers category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customers category could not be saved. Please, try again.'));
        }
        $customers = $this->CustomersCategories->Customers->find('list', ['limit' => 200]);
        $categories = $this->CustomersCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('customersCategory', 'customers', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customers Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customersCategory = $this->CustomersCategories->get($id);
        if ($this->CustomersCategories->delete($customersCategory)) {
            $this->Flash->success(__('The customers category has been deleted.'));
        } else {
            $this->Flash->error(__('The customers category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }
}
