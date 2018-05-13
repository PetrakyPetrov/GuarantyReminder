<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Network\Session;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
 
 /**
 * @backupGlobals disabled
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index(){

        $this->paginate = [
            'contain' => ['Users', 'Categories', 'Manufacturers', 'Shops'],
            'limit'=>10
            
        ];
        $data = TableRegistry::get('Products')->find()->where(['user_id' => $this->request->session()->read('Auth.User.id')]);
        
        $products = $this->paginate($data);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users', 'Categories', 'Manufacturers', 'Shops']
        ]);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $user_id = $this->request->session()->read('Auth.User.id');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            $upload_image=$_FILES["myimage"]["name"];  //image name
            $folder1 = getcwd(); // folder name where image will be store
            $folder = str_replace("\\","/",$folder1).'/img/uploads/';
            move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);
            $img_path = '/webroot/img/uploads/'.$_FILES["myimage"]["name"];
            $product['img'] = Router::url('/', true).$img_path;
            $startDate = $product['start_date'];
            $endDate = $product['end_date'];
            $d1 = strtotime($startDate);
            $d2 = strtotime($endDate);
            $min_date = min($d1, $d2);
            $max_date = max($d1, $d2);
            $numberOfMonths = 0;
            while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $numberOfMonths++;
            }
            
            $product['warranty_months'] = $numberOfMonths; 
            $product['days_left'] = 0; 
            $product['is_expired'] = 0; 

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
				print_r($product->errors());
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
		$categories = TableRegistry::get('Categories')->find('list', ['limit' => 200]);
		$manufacturers = TableRegistry::get('Manufacturers')->find('list', ['limit' => 200]);
		$shops = TableRegistry::get('Shops')->find('list', ['limit' => 200]);

        $this->set('user_id', $user_id);
        $this->set(compact('product', 'users', 'categories', 'manufacturers', 'shops'));
        $this->set('_serialize', ['product']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
		$categories = TableRegistry::get('Categories')->find('list', ['limit' => 200]);
		$manufacturers = TableRegistry::get('Manufacturers')->find('list', ['limit' => 200]);
		$shops = TableRegistry::get('Shops')->find('list', ['limit' => 200]);
		
        $this->set(compact('product', 'users', 'categories', 'manufacturers', 'shops'));
        $this->set('_serialize', ['product']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function search(){
				
        $this->request->session()->delete('Form.data');
		$this->autoRender = false ;
		
					//print_r($this->request->data);
		if(!empty($this->request->data)) {
			
			$this->paginate = [
				'contain' => ['Users', 'Categories', 'Manufacturers', 'Shops']
			];
										
			$data = TableRegistry::get('Products')->find()->where(['products.name like' => '%'.$this->request->data['name'].'%', 'user_id' => $this->request->session()->read('Auth.User.id')]); 
			$products = $this->paginate($data);
			
			$this->set(compact('products'));
			$this->set('_serialize', ['products']);
			
			$this->request->data['name'] = '';
			
			$this->render('/products/index');
			
			

		}else{
			
			$this->redirect(['action' => 'index']);
		} 
	}
	
}