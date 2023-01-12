<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\Locator\LocatorAwareTrait;

class TestController extends AppController{

      public function header(){
        // $this->autoRender = false;
        // echo "Hii manish";
    }    
    public function index(){
        // $this->autoRender = false;
        // echo "Hii manish";
    }
    public function formdata() 
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT * FROM userdetails')->fetchAll('assoc');
        print_r($results); 

    }
    public function insert (){

        $user = $this->Userdetails->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Userdetails->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user, ['associated' => ['userdetails']])) { //Save Associated to Profiles table. If table name: user_profiles used UserProfiles
                    $this->Flash->success(__('The user has been saved.'));
        
                    return $this->redirect(['action' => '']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('formdata'));
        } 
        
    }
?>

    
    <!-- // public function insert(){
    //     $user = $this->Users->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $user = $this->Users->patchEntity($user, $this->request->getData());
    //         if ($this->Users->save($user, ['associated' => ['userdetails']])) { //Save Associated to Profiles table. If table name: user_profiles used UserProfiles
    //             $this->Flash->success(__('The user has been saved.'));
    
    //             return $this->redirect(['action' => '']);
    //         }
    //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('formdata'));
    // } -->
