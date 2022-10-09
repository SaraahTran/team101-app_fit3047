<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
* @property \App\Model\Table\CustomersTable $

 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */




class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Customers', 'Items', 'Invoices', 'Quotes'],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemss = $this->fetchTable('Items')->find()->toArray();

        $customer = $this->fetchTable('Customers')->find()->toArray();
        $order = $this->Orders->newEmptyEntity();

        if ($this->request->is('post')) {
            $requestData = $this->request->getData();

            foreach($requestData['items'] as $key => $data):
                // check to see if any of the arrays have null ids (have not been selected):
                if(empty($data['id'])){
                    // if found, remove from data array
                    unset($requestData['items'][$key]);
                }
            endforeach;
            $productsWithSubtotal = $requestData['items'];
            $order_items = 0;

            foreach($requestData['items'] as $key=>$p){
                $fetchedProduct = $this->Orders->Items->get($p['id']);
                //fetching the price
                $currentS = (int)$fetchedProduct->item_quantity;
                $itemQ = (int) $p['_joinData']['line_quantity'];
                $itemTh = (int)$fetchedProduct->quantity_threshold;
                if($currentS-$itemQ<=0){
                    $this->Flash->info(__('The order could not be create. This item is out of stock.'));

                    return $this->redirect(['action' => 'add', $order->id]);
                }
                if($currentS<=$itemTh){
                    $this->Flash->info(__('The order could not be create. Please, try again.'));

                    return $this->redirect(['action' => 'add', $order->id]);
                }
                if($currentS-$itemQ<=$itemTh){
//send email
                    $mailer = new Mailer('default');
                    // Setup email parameters
                    $mailer
                        ->setEmailFormat('html')
                        ->setTo(Configure::read('OrderMail.to'))
                        ->setFrom(Configure::read('OrderMail.from'))
                        ->setReplyTo(Configure::read('OrderMail.to'))
                        ->setSubject('Inventory Alert from Item ID ' . h($fetchedProduct->id) . " <" . h(Configure::read('OrderMail.to')) . ">")
                        ->viewBuilder()
                        ->disableAutoLayout()
                        ->setTemplate('reminder');

                    // Send data to the email template
                    $mailer->setViewVars([
                        'content' => 'The stock of Item : '.($fetchedProduct->name).' is too low'.','.' '.'please replenish the stock in time.',
                        'full_name' => 'Steve Ingram',
                        'email' => Configure::read('OrderMail.to'),
//                    'created' => $orderSend->created,
                        'created' => time(),
                        'id' => $fetchedProduct->id
                    ]);
                    //Send email
                    $email_result = $mailer->deliver();

                    if ($email_result) {
//                    $orderSend->email_sent = ($email_result) ? true : false;
                        $this->Flash->success(__('The order request has been saved and sent via email.'));
                    } else {
                        $this->Flash->error(__('Email failed to send. Please check the enquiry in the system later. '));
                    }
                    //send email
                }
                if($itemQ == null){
                    $this->Flash->info(__('Invalid input, please enter the quantity of the item.'));
                    return $this->redirect(['action' => 'add', $order->id]);
                }
                if($itemQ <= 0){
                    $this->Flash->info(__('Invalid input, the number of items cannot be less than 0.'));
                    return $this->redirect(['action' => 'add', $order->id]);
                }

                $itemsPrice = (float) $fetchedProduct->item_price;
                //product quantity
                $itemsQty = (int) $p['_joinData']['line_quantity'];
                //calculating the subtotal
                $itemSubtotal = strval($itemsPrice * $itemsQty);
                //inserting the subtotal to joindata
                $productsWithSubtotal[$key]['_joinData']['line_price'] = $itemSubtotal;

                // updating the quantity of product in stock (requires validation)
                // validation 1 - checking to see if current stock is zero
                // validation 2 - checking to see if productQty > currentStock
                $currentStock = $fetchedProduct->item_quantity;
                $newQuantity = (int) $currentStock - $itemsQty;
                $productsWithSubtotal[$key]['item_quantity'] = (int) $newQuantity;
                $order_items += (float)$itemSubtotal;

            }
            $requestData['items'] = $productsWithSubtotal;

            $order = $this->Orders->patchEntity($order, $requestData);
            $order->total = $order_items;

            if ($this->Orders->save($order)) {


                $invoices = $this->fetchTable('Invoices')->newEmptyEntity();
                $invoices->invoice_amount  = $order_items;
                $invoices->order_id  = $order->id;
                $this->fetchTable('Invoices')->save($invoices);


                $quotes = $this->fetchTable('Quotes')->newEmptyEntity();
                $quotes->quote_amount  = $order_items;
                $quotes->order_id  = $order->id;
                $this->fetchTable('Quotes')->save($quotes);


// send email

                    $cust = $this->fetchTable('Customers')->find()->all();

                    $mailer = new Mailer('default');
                    $custID=$order->customer_id;
                foreach($cust as $cust){
                    if($custID == $cust->id){
                        $custName = $cust->cust_name;
                        $custEmail = $cust->cust_email;
                    }

                }


                    // Setup email parameters
                    $mailer
                        ->setEmailFormat('html')
                        ->setTo($custEmail)
                        ->setFrom(Configure::read('OrderMail.from'))
                        ->setReplyTo($custEmail)
                        ->setSubject('New Order from ' . h($custName) . " <" . h($custEmail) . ">")
                        ->viewBuilder()
                        ->disableAutoLayout()
                        ->setTemplate('enquiry');

                    // Send data to the email template
                    $mailer->setViewVars([
                        'content' =>      'Your order has been accepted. The invoice ID of the order is: '.($invoices->id).'.'.'                                           '.'The total amount of your order is: '.($order->total).'$',
                        'full_name' => $custName,
                        'email' => $custEmail,
//                    'created' => $orderSend->created,
                        'created' => $order->date,
                        'id' => $order->id
                    ]);

                    //Send email
                    $email_result = $mailer->deliver();

                    if ($email_result) {
//                    $orderSend->email_sent = ($email_result) ? true : false;
                        $this->Flash->success(__('The order request has been saved and sent via email.'));
                    } else {
                        $this->Flash->info(__('Email failed to send. Please check the enquiry in the system later. '));
                    }

//send email


                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);}
            $this->Flash->info(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200])->all();
        $items = $this->Orders->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'customers', 'items','itemss','customer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemss = $this->fetchTable('Items')->find()->toArray();

        $customer = $this->fetchTable('Customers')->find()->toArray();
        $order = $this->Orders->get($id, [
            'contain' => ['Items'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if($order->total<=0){
                $this->Flash->info(__('The order could not be save. Please, try again.'));

                return $this->redirect(['action' => 'edit', $order->id]);
            }




            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->info(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200])->all();
        $items = $this->Orders->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'customers', 'items','itemss','customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->info(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
