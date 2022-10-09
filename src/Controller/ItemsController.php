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
                $this->Flash->info(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
            }
            if($item->item_quantity<=0){
                $this->Flash->info(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
            }
            if($item->item_price<=0){
                $this->Flash->info(__('The item could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add'], $item->id);
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
                $this->Flash->info(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->item_quantity<=0){
                $this->Flash->info(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
            }
            if($item->item_price<=0){
                $this->Flash->info(__('The item could not be save. Please, try again.'));
                return $this->redirect(['action' => 'edit', $item->id]);
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
        $this->checkItem();
        return $this->redirect(['action' => 'index']);
    }

    /**
     * check stock method
     */

    public function checkItem($id = null)
    {

        $itemm = $this->Items->get($id, [
            'contain' => ['Categories', 'Orders'],
        ]);

//
//                $cust = $this->fetchTable('Customers')->find()->all();
//
        //                $custID=$order->customer_id;
//                foreach($cust as $cust){
//                    if($custID == $cust->id){
//                        $custName = $cust->cust_name;
//                        $custEmail = $cust->cust_email;
//                    }
//
//                }
                $mailer = new Mailer('default');



                // Setup email parameters
                $mailer
                    ->setEmailFormat('html')
                    ->setTo(Configure::read('OrderMail.to'))
                    ->setFrom(Configure::read('OrderMail.from'))
                    ->setReplyTo(Configure::read('OrderMail.to'))
                    ->setSubject('Inventory Alert from Item ID ' . h($itemm->id) . " <" . h(Configure::read('OrderMail.to')) . ">")
                    ->viewBuilder()
                    ->disableAutoLayout()
                    ->setTemplate('enquiry');

                // Send data to the email template
                $mailer->setViewVars([
                    'content' => 'The stock of Item : '.($itemm->name).' is too low'.'please replenish the stock in time.',
                    'full_name' => 'Steve Ingram',
                    'email' => Configure::read('OrderMail.to'),
//                    'created' => $orderSend->created,
                    'created' => time(),
                    'id' => $itemm->id
                ]);

                //Send email
                $email_result = $mailer->deliver();

                if ($email_result) {
//                    $orderSend->email_sent = ($email_result) ? true : false;
                    $this->Flash->success(__('The order request has been saved and sent via email.'));
                } else {
                    $this->Flash->info(__('Email failed to send. Please check the enquiry in the system later. '));
                }


//        return $this->redirect(['action' => 'index']);
    }


}
