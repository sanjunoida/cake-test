<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


/**
 * Folders Controller
 *
 * @property \App\Model\Table\FoldersTable $Folders
 *
 * @method \App\Model\Entity\Folder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoldersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   
	   $user = $this->Auth->user();
		if($user['userrole'] == 'admin'){
			$userFolderCount = $this->Folders->find('all');
			
		}
		else{
 		$userFolderCount = $this->Folders->find('all',array('conditions' => array(
			   'Folders.user_id' => $user['id'])
			   ));
		}
        $this->paginate = [
            'contain' => ['Users']
        ];
        $folders = $this->paginate($userFolderCount);

        $this->set(compact('folders'));
    }

    /**
     * View method
     *
     * @param string|null $id Folder id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $folder = $this->Folders->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('folder', $folder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $folder = $this->Folders->newEntity();
		
		
		if ($this->request->is('post')) {
			//echo "<pre>"; print_r($this->request->getData()); echo "</pre>"; exit;
			//$folder= $this->request->getData();
			//$query = $this->Folders->contain(['Users']);
			//echo "<pre>"; print_r($query); echo "</pre>"; exit;
			
			//$userFolderCount = $this->Folders->find('count,array('conditions' => array('Folders.user_id' => '$auth['User']['id'])));
		    
			
			$userFolderCount = $this->Folders->find('all',array('conditions' => array(
			   'Folders.user_id' => $this->request->data['user_id'])
			   ));
				echo $number = $userFolderCount->count();
            //echo "<pre>"; print_r($userFolderCount); echo "</pre>"; exit;
							
			if($number<11){
			$folderName = $this->request->data['name'];
			$dir = new Folder(WWW_ROOT.$folderName, true, 0755);
			
			
            $folder = $this->Folders->patchEntity($folder, $this->request->getData());
				if ($this->Folders->save($folder)) {
					$this->Flash->success(__('The folder has been saved.'));

					return $this->redirect(['action' => 'index']);
				}
            $this->Flash->error(__('u have already 10 folders hence could not be saved.'));
			}
			}
        $users = $this->Folders->Users->find('list', ['limit' => 200]);
        $this->set(compact('folder', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Folder id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $folder = $this->Folders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $folder = $this->Folders->patchEntity($folder, $this->request->getData());
            if ($this->Folders->save($folder)) {
                $this->Flash->success(__('The folder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The folder could not be saved. Please, try again.'));
        }
        $users = $this->Folders->Users->find('list', ['limit' => 200]);
        $this->set(compact('folder', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Folder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $folder = $this->Folders->get($id);
        if ($this->Folders->delete($folder)) {
            $this->Flash->success(__('The folder has been deleted.'));
        } else {
            $this->Flash->error(__('The folder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
