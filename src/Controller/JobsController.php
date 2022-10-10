<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JobsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
//        $this->Authorization->skipAuthorization();
        $jobs = $this->paginate($this->Jobs);

        $this->set(compact('jobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//        $this->Authorization->skipAuthorization();
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('job'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEmptyEntity();
//        $this->Authorization->authorize($job);
//        if ($this->request->is('post')) {
//            $job = $this->Jobs->patchEntity($job, $this->request->getData());
//            if ($this->Jobs->save($job)) {
//                $this->Flash->success(__('The job has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The job could not be saved. Please, try again.'));
//        }
//        $this->set(compact('job'));


//        $this->Authorization->authorize($job);
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());

            if($job->job_price<=0){
                $this->Flash->error(__('The Job could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add']);
            }
            if($job->job_duration<=0){
                $this->Flash->error(__('The Job could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add']);

            }
            if($job->job_duration>=10000000){
                $this->Flash->error(__('The Job could not be create. Please, try again.'));
                return $this->redirect(['action' => 'add']);

            }
            if($job->job_price>=10000000){
                $this->Flash->error(__('The order could not be create. This item is out of stock.'));

                return $this->redirect(['action' => 'add', $job->id]);
            }

            // Changed: Set the user_id from the current user.
//            $job->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
//        $tags = $this->Articles->Tags->find('list')->all();
        $this->set(compact('job'));
    }




    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);
//        $this->Authorization->authorize($job);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());

            if($job->job_price<=0){
                $this->Flash->error(__('The Job could not be edit. Please, try again.'));
                return $this->redirect(['action' => 'edit', $job->id]);
            }
            if($job->job_duration<=0){
                $this->Flash->error(__('The Job could not be edit. Please, try again.'));
                return $this->redirect(['action' => 'edit'], $job->id);

            }
            if($job->job_duration>=10000000){
                $this->Flash->error(__('The Job could not be create. Please, try again.'));
                return $this->redirect(['action' => 'edit']);

            }
            if($job->job_price>=10000000){
                $this->Flash->error(__('The order could not be create. This item is out of stock.'));

                return $this->redirect(['action' => 'edit', $job->id]);
            }



            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));



    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
//        $this->Authorization->authorize($job);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__('The job has been deleted.'));
        } else {
            $this->Flash->error(__('The job could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



/**
 * done method
 */

    public function done($id = null)
    {

        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->get($id);
//        $this->Authorization->authorize($job);
            $job->job_status = 1;
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }
    /**
     * doing method
     */

    public function doing($id = null)
    {

        $job = $this->Jobs->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->get($id);
//        $this->Authorization->authorize($job);
            $job->job_status = 0;
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__('The job has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The job could not be saved. Please, try again.'));
        }
        $this->set(compact('job'));
    }
}


