<?php

namespace App\Controller;

class PropertyCategoriesController extends AppController
{
    public function add() {
        // $this->viewBuilder()->setLayout('common');
       
        $property = $this->PropertyCategories->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $property = $this->PropertyCategories->patchEntity($property, $this->request->getData());
            if ($this->PropertyCategories->save($property)) {
                $this->Flash->success(__('Category has been updated'));
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Category has been updated"
                ));
                exit;
            } else {
                $this->Flash->error(__('Failed to update category'));
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to update category"
                ));
                exit;
            }
        }
        $this->set(compact('property'));
    }


    public function index()
    {
        $categories = $this->PropertyCategories->find();
        $this->set(compact('categories'));
    }


    public function categoryStatus($id = null, $status = null)
    {
        // $property = $this->PropertyCategories->get($id);
        $this->loadModel('Properties');

        //$property = $this->PropertyCategories->find('all')->contain(['Properties'])->where(['id'=>$id])->all();
        
        $property = $this->PropertyCategories->get($id, [
            'contain' => ['Properties'],
        ]);

        //dd($property->status);
        
        //dd($property);
        $proarray = array();
        foreach($property->properties as $show)
        {
            $proarray[] =+ $show->status;
        }
        //dd($proarray);

        if(!in_array(1,$proarray)){
        if ($status == 1) {
            $property->status = 0;
        } else {
            $property->status = 1;
        }
        if ($this->PropertyCategories->save($property)) {
            $this->Flash->success(__('The status has been changed'));
        }
        return $this->redirect(['controller'=>'property-categories','action' => 'index']);
    }else{
        return $this->redirect(['controller'=>'properties','action' => 'active',$id]);
    }
    }


    // public function view($id = null)
    // {
    //     // $this->viewBuilder()->setLayout('common');
    //     $category =  $this->PropertyCategories->get($id, [
    //         'contain' => [],
    //     ]);
        
    //     $this->set(compact('category'));
    // }

    public function viewCategory($id = null){
        $id = $_GET['id'];
        $category = $this->PropertyCategories->get($id,[
            'contain'=>[],
        ]);
        echo json_encode($category);
        exit;
    }


    public function delete($id = null)
    {
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getData('id');
            
            $category_status = $this->request->getData('category_status');
            $category = $this->PropertyCategories->get($id);
           
            if($category_status == 1){
                $category->category_status= 0;
            }else{
                $category->category_status = 1;
            }
            if($this->PropertyCategories->save($category)){
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The category has been deleted."
                ));
            }
        }
    }

    public function edit($id = null)
    {
        
        $category = $this->PropertyCategories->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('category'));
    }


    public function categoryDetail($id = null){
        $id = $_GET['id'];
        $category = $this->PropertyCategories->get($id,[
            'contain'=>[],
        ]);
        echo json_encode($category);
        exit;
    }

    public function editcategory($id = null)
    {
        if ($this->request->is(['ajax'])) {
            $id = $this->request->getData("iddd");
            $category = $this->PropertyCategories->get($id, [
                'contain' => [],
            ]);
            $category = $this->PropertyCategories->patchEntity($category, $this->request->getData());
            if ($this->PropertyCategories->save($category)) {

                $this->Flash->success(__('data has been updated'));
    
                echo json_encode(array(
                    "status" => 1,
                    "message" => "data has been updated",
                ));
                exit;

            } else {
                $this->Flash->error(__('Failed to update data'));
    
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to update data"
                ));
    
                exit;
            }
        }
        $this->set(compact('category'));
    }
}