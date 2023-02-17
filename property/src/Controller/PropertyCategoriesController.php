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

        $this->request->allowMethod(['post']);
        $property = $this->PropertyCategories->get($id);

        if ($status == 1) {
            $property->status = 0;
        } else {
            $property->status = 1;
        }
        if ($this->PropertyCategories->save($property)) {
            $this->Flash->success(__('The status has been changed'));
        }
        return $this->redirect(['controller'=>'property-categories','action' => 'index']);
    }


    public function view($id = null)
    {
        // $this->viewBuilder()->setLayout('common');
        $category =  $this->PropertyCategories->get($id, [
            'contain' => [],
        ]);
        
        $this->set(compact('category'));
    }


    public function delete($id = null)
    {
       
        if ($this->request->is('ajax')) {

            $category = $this->PropertyCategories->get($id, [
                'contain' => [],
            ]);
            

            if ($this->PropertyCategories->delete($category)) {

                $this->Flash->success(__('The category has been deleted.'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The category has been deleted."
                ));

                exit;
            } else {
                $this->Flash->error(__('The category could not be deleted. Please, try again.'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The category could not be deleted. Please, try again."
                ));

                exit;
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

    public function editcategory($id = null)
    {
        $category = $this->PropertyCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['ajax'])) {
            $category = $this->PropertyCategories->patchEntity($category, $this->request->getData());
            if ($this->PropertyCategories->save($category )) {

                $this->Flash->success(__('data has been updated'));
    
                echo json_encode(array(
                    "status" => 1,
                    "message" => "data has been updated"
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