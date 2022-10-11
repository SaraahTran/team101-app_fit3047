<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cate_I = $this->fetchTable('Customers')->find()->toArray();
//        $this->paginate = [
//            'contain' => ['Categories'],
//        ];
//        $items = $this->paginate($this->Items);
        $items = $this->Items->find()->contain(['Categories']);
        $this->set(compact('items','cate_I'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Categories', 'Orders'],
        ]);

        $this->set(compact('item'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $item = $this->Items->newEmptyEntity();
        if ($this->request->is('post')) {

            $item = $this->Items->patchEntity($item, $this->request->getData());
            if($item->quantity_threshold<=0){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
            }
            if($item->item_quantity<=0){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
            }
            if($item->item_price<=0){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
            }
            if($item->item_price>=1000000000){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add', $item->id]);
            }
            if($item->quantity_threshold>=1000000000){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add', $item->id]);
            }
            if($item->item_quantity>=1000000000){
                $this->Flash->error(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add', $item->id]);
            }

            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200])->all();
        $orders = $this->Items->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'categories', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Orders'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());

            if($item->quantity_threshold<=0){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->item_quantity<=0){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->item_price<=0){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->item_price>=100000000){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->quantity_threshold>=1000000000){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'add', $item->id]);
            }
            if($item->item_quantity>=1000000000){
                $this->Flash->error(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'add', $item->id]);
            }

            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->info(__('The item could not be saved. Please, try again.'));
        }
        $categories = $this->Items->Categories->find('list', ['limit' => 200])->all();
        $orders = $this->Items->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('item', 'categories', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }




}
