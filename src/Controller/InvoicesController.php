<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Order;
use App\Model\Table\OrdersTable;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cust_I = $this->fetchTable('Customers')->find()->toArray();
        $this->paginate = [
            'contain' => ['Orders'],
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices',"cust_I"));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        $cust_I = $this->fetchTable('Customers')->find()->toArray();
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('invoice','cust_I'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoices->newEmptyEntity();
        if ($this->request->is('post')) {


            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if($invoice->invoice_amount<=0){
                $this->Flash->error(__('The Invoice could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add', $invoice->id]);
            }
            if($invoice->invoice_amount>=10000000){
                $this->Flash->error(__('The Invoice could not be create. Please, try again.'));

                return $this->redirect(['action' => 'add', $invoice->id]);
            }

//            $invoice->invoice_amount = (float)$invoice->order->total;
            if ($this->Invoices->save($invoice)) {

                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());

            if($invoice->invoice_amount<=0){
                $this->Flash->info(__('The Invoice could not be edit. Please, try again.'));
                return $this->redirect(['action' => 'edit', $invoice->id]);
            }
            if($invoice->invoice_amount>=1000000000){
                $this->Flash->error(__('The Invoice could not be edit. Please, try again.'));

                return $this->redirect(['action' => 'edit', $invoice->id]);
            }

            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->info(__('The invoice could not be saved. Please, try again.'));
        }
        $orders = $this->Invoices->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->info(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
