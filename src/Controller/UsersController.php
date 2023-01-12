<?php
declare(strict_types=1);

namespace App\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */



    public function beforeFilter(\Cake\Event\EventInterface $event)
        {
            parent::beforeFilter($event);
            // Configure the login action to not require authentication, preventing
            // the infinite redirect loop issue
            $this->Authentication->addUnauthenticatedActions(['login']);
        }

        public function login()
        {
            $this->request->allowMethod(['get', 'post']);
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                // $email = $this->request->getData('email');
                // $session = $this->getRequest()->getSession();
                // $session = write('email', $email);
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
                // $this->set(compact('result'));
            }
            // display error if user submitted and authentication failed
            if ($this->request->is('post') && !$result->isValid()) {
                $this->Flash->error(__('Invalid email or password'));
           
            }
        }


        public function logout()
        {
            $result = $this->Authentication->getResult();
           
            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                $this->Authentication->logout();
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }

    public function index()
    {
        $key= $this->request->getQuery('key');
        
        if($key){
         $query = $this->Users->find('all')->where(['or'=>['fname like'=>'%'.$key.'%','email like'=>'%'.$key.'%','lname like'=>'%'.$key.'%','phone like'=>'%'.$key.'%']]);
        }else{
            $query = $this->Users;
            // $this->Flash->error(__('record not found'));
         }
        $users = $this->paginate($query);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(!$user->getErrors){
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                if($name)  
                    $image->moveTo($targetPath);
                    $user->image = $name;
                
            }       



            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been register successfully'));

                return $this->redirect(['action' => '']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(!$user->getErrors){
                $image = $this->request->getData('image_change');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                if($name)  
                    $image->moveTo($targetPath);
                    $user->image = $name;
                
            }       
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function deleteAll()
    {
       $this->request->allowMethod(['post', 'delete']);
       $id = $this->request->getData('id');
      if($this->Users->deleteAll(['Users.id IN'=>$id])){
       
        $this->Flash->success(__('The user has been deleted.'));

      }
      return $this->redirect(['action' => 'index']);
    }

    
}
