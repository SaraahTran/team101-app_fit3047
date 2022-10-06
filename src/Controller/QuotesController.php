<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Quotes Controller
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders'],
        ];
        $quotes = $this->paginate($this->Quotes);

        $this->set(compact('quotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quotes->newEmptyEntity();
        if ($this->request->is('post')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if($quote->quote_amount<=0){
                $this->Flash->info(__('The Quote could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add', $quote->id]);
            }
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $orders = $this->Quotes->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if($quote->quote_amount<=0){
                $this->Flash->info(__('The Quote could not be edit. Please, try again.'));
                return $this->redirect(['action' => 'edit', $quote->id]);
            }
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $orders = $this->Quotes->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quotes->get($id);
        if ($this->Quotes->delete($quote)) {
            $this->Flash->success(__('The quote has been deleted.'));
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
