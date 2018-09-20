<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Xml;
use Cake\ORM\TableRegistry;

class ServiceController extends AppController
{
   
    public function initialize()
    {
        parent::initialize();
        
    }

    public function export()
    {
        $xmlArray = [
                        'root' => [
                            'customers' => [
                                'customer' => TableRegistry::get('Customers')->find('all')->toArray()
                            ],
                            'categories' => [
                                'category' => TableRegistry::get('Categories')->find('all')->toArray()
                            ],
                            'customers_categories' => [
                                'customer_category' => TableRegistry::get('CustomersCategories')->find('all')->toArray()
                            ],
                        ]
                    ];
        
        $xmlString = Xml::build($xmlArray)->asXML();

        $this->response->getBody()
                        ->write($xmlString);

        $this->response = $this->response
                            ->withType('xml')
                            ->withDownload('data.xml');
                            
        return $this->response;
    }

    public function import()
    {
        if ($this->request->is('post')) {

            $file = $this->request->data['file'];
            $file['name'] =  time() . '-' . str_replace(' ', '_', $file['name']); 

            if (move_uploaded_file($file['tmp_name'],  $file['name'])) {
                $xml = Xml::build($file['name']);
                 
                $categoriesTable = TableRegistry::get('Categories');
                
                foreach ($xml->categories->category as $key => $value) {
                    $entity = $categoriesTable->newEntity((array)$value, ['validate' => false]);
                    $categoriesTable->save($entity);
                }

                $customersTable = TableRegistry::get('Customers');

                foreach ($xml->customers->customer as $key => $value) {
                    $entity = $customersTable->newEntity((array)$value, ['validate' => false]);
                    $customersTable->save($entity);
                }

                $customersCategories = TableRegistry::get('CustomersCategories');
                
                foreach ($xml->customers_categories->customer_category as $key => $value) {
                    $entity = $customersCategories->newEntity((array)$value, ['validate' => false]);
                    $customersCategories->save($entity);
                }

                $this->Flash->success(__('Файл импортирован'));
                //debug($xml);
            } else {
                $this->Flash->error(__('Не удалось импортировать файл'));
            }

            unlink($file['name']);
        }
    }

    public function clear()
    {
        
        if (TableRegistry::get('CustomersCategories')->deleteAll(['id > '=> 0])) {
            $this->Flash->success(__('Таблица CustomersCategories очищена'));
        } else {
            $this->Flash->error(__('Не удалось очистить CustomersCategories'));
        }

        if(TableRegistry::get('Customers')->deleteAll(['id > '=> 0])) {
            $this->Flash->success(__('Таблица Customers очищена'));
        } else {
            $this->Flash->error(__('Не удалось очистить Customers'));
        }

        if(TableRegistry::get('Categories')->deleteAll(['id > '=> 0])) {
            $this->Flash->success(__('Таблица Categories очищена'));
        } else {
            $this->Flash->error(__('Не удалось очистить Categories'));
        }
        
        return $this->redirect(
            ['controller' => 'Customers', 'action' => 'index']
        );
    }

    public function isAuthorized($user)
    {
        return parent::isAuthorized($user);
    }

}