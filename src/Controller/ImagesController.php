<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($folder_id)
    {
       		
		$userimageCount = $this->Images->find('all',array('conditions' => array(
			   'Images.folder_id' => $folder_id)
			   ));
			   
        $images = $this->paginate($userimageCount);

        $this->set(compact('images'));
		 //set the variable folder id to use it in the view 
		 $this->set('folder_id', $folder_id);
		 
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('image', $image);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($fid = null)
    {
        $image = $this->Images->newEntity();
        if ($this->request->is('post')) {
			
			 //$this->request->data['approved'] = 'false' ;
			//$dir = new Folder(WWW_ROOT. 'imagess', true, 0755);
			// Start - Controller Code to Handle file Uploading
      //echo $folderid = $this->request->getQuery('folder_id');
       // $abc = $this->request->getData();	echo "<pre>"; 	 print_r($abc); echo "</pre>";    exit;  
		    if (!empty($this->request->data['path']['name'])){
				$fileName = $this->request->data['path']['name'];
				
				$uploadPath="img/";
				$uploadFile= $uploadPath.$fileName;
				if(move_uploaded_file($this->request->data['path']['tmp_name'],$uploadFile))
				{
					$this->request->data['path'] = $fileName;
				}
				
			}
			//end of upload image
			// $abc = $this->request->getData();	echo "<pre>"; 	 print_r($abc); echo "</pre>";  exit;
            $image = $this->Images->patchEntity($image, $this->request->getData());
			
			//echo "<pre>"; 	 print_r($image); echo "</pre>";  exit;
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index',$this->request->data['folder_id']]);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $users = $this->Images->Users->find('list', ['limit' => 200]);
		
        $this->set(compact('image', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
		
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $users = $this->Images->Users->find('list', ['limit' => 200]);
        $this->set(compact('image', 'users'));
    }
    public function approved($id = null){
		
		$image = $this->Images->get($id, [
            'contain' => []
        ]);
		if(($image->approved)!= 'true'){
			$image->approved = 'true';
		}
		else{ $image->approved = 'false';
		}
			if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index',$image->folder_id]);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
		
		
	}
	
	public function deleteSelect(){
	    $this->request->allowMethod(['post', 'delete']);	
		//$abc = $this->request->getData();	echo "<pre>"; 	 print_r($abc); echo "</pre>";    exit;  
		$this->Images->deleteAll(['Images.id IN' => $abc[data]['delete_id']]);
		return $this->redirect(['action' => 'index']);
	}
    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$image->folder_id]);
    }
}
