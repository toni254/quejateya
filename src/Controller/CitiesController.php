<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries']
        ];
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities'));
        $this->set('_serialize', ['cities']);
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => ['Countries', 'Posts']
        ]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
              $city->user_created = 1;
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('La Valoracion fue Guardada Satisfactoriamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $countries = $this->Cities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('city', 'countries'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            $city->user_modified = 1;
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $countries = $this->Cities->Countries->find('list', ['limit' => 200]);
        $this->set(compact('city', 'countries'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
