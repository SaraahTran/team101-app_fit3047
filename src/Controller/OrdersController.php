<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @property \App\Model\Table\QuotesTable $Quotes
 * @property \App\Model\Table\InvoicesTable $Invoices
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
        $order = $this->Orders->newEmptyEntity();

        if ($this->request->is('post')) {


            $requestData = $this->request->getData();
//            debug($requestData);
//            exit;
            foreach($requestData['items'] as $key => $data):

                // check to see if any of the arrays have null ids (have not been selected):
                if(empty($data['id'])){
                    // if found, remove from data array
                    unset($requestData['items'][$key]);
                }
            endforeach;
            $productsWithSubtotal = $requestData['items'];
            $order_items = 0;

//iterating through the $requestData array to calculate subtotal for each
//product
            foreach($requestData['items'] as $key=>$p){
                $fetchedProduct = $this->Orders->Items->get($p['id']);
                //fetching the price
                $currentS = (int)$fetchedProduct->item_quantity;
                $itemQ = (int) $p['_joinData']['line_quantity'];
                $itemTh = (int)$fetchedProduct->quantity_threshold;
                if($currentS<=$itemTh){
                    return $this->redirect(['action' => 'add']);

                }
                if($currentS-$itemQ<=$itemTh){
                    return $this->redirect(['action' => 'add']);
                }
                if($itemQ == null){

                    return $this->redirect(['action' => 'add']);
                }
                if($itemQ <= 0){

                    return $this->redirect(['action' => 'add']);
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
                $this->Flash->success(__('The order has been saved.'));
//                $this->addQuote();
//                $this->addInvoice();


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200])->all();
        $items = $this->Orders->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'customers', 'items'));
    }


//    public function addInvoice(){
//        $invoiceTable = $this->getTableLocator()->get('Invoices');
//        $invoice = $invoiceTable->newEmptyEntity();
//        if ($this->request->is('post')) {
//
//
//            $invoice->invoice_amount = $this->Orders->total;
//            $invoice->order_id = $this->Orders->id;
//
//            if ($this->Invoices->save($invoice)) {
//
//                $this->Flash->success(__('The invoice has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
//        }
//        $orders = $this->Invoices->Orders->find('list', ['limit' => 200])->all();
//        $this->set(compact('invoice', 'orders'));
//    }
//
//    public function addQuote(){
//        $quoteTable = $this->getTableLocator()->get('Quotes');
//        $quote = $quoteTable->newEmptyEntity();
//        if ($this->request->is('post')) {
//            $quote->quote_amount = $this->Orders->total;
//            $quote->order_id = $this->Orders->id;
//            if ($this->Quotes->save($quote)) {
//                $this->Flash->success(__('The quote has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
//        }
//        $orders = $this->Quotes->Orders->find('list', ['limit' => 200])->all();
//        $this->set(compact('quote', 'orders'));
//
//
//    }





    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Items'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list', ['limit' => 200])->all();
        $items = $this->Orders->Items->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'customers', 'items'));
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
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
