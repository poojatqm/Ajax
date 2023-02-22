<?php

namespace App\Controller;

class PropertiesController extends AppController
{
    public function add()
    {
        $this->loadModel('PropertyCategories');
        $categories = $this->paginate($this->PropertyCategories);
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('ajax')) {
            // dd($this->request->getData());
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $image = $this->request->getData('image_file');
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            $image->moveTo($targetPath);
            $property->image = $name;
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('Property has been updated'));
                echo json_encode(array(
                    "status" => 1,
                    "message" => "Property has been updated"
                ));
                exit;
            } else {
                $this->Flash->error(__('Failed to update property'));
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Failed to update property"
                ));
                exit;
            }
        }
        $this->set(compact('property', 'categories'));
    }

    public function index()
    {
        $properties = $this->Properties->find()->contain(['PropertyCategories']);
        $this->set(compact('properties'));
    }
    public function active($id=null)
    {
        $properties = $this->Properties->find()->contain(['PropertyCategories'])->where(['category_id'=>$id])->all();

        // foreach($properties as $show){
        //     echo $show->status;
        // }
        // die;
        // dd($properties);
        
        
        $this->set(compact('properties','id'));
    }
    public function inactive($id = null)
    {

        
        //$property = $this->Properties->get($id);
        $property = $this->Properties->find()->where(['category_id'=>$id])->all();

        foreach($property as $property){
            $property->status = 0;
            $this->Properties->save($property);
        }
        
        
        return $this->redirect(['controller' => 'property-categories', 'action' => 'categoryStatus',$id,1]);
    }

    public function propertyDetail($id = null){
        $this->loadModel('PropertyCategories');
        $id = $_GET['id'];
        $property = $this->Properties->get($id,[
            'contain'=>['PropertyCategories'],
        ]);
        echo json_encode($property);
        exit;
    }


    public function editModal($id = null)
    {
        $this->Model = $this->loadModel('PropertyCategories');
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            // print_r($data);
            // die;
            $fileName2 = $this->request->getData("imagedd");
            $id = $this->request->getData("iddd");
            $property = $this->Properties->get($id, [
                'contain' => ['PropertyCategories'],
            ]);
            $productImage = $this->request->getData('image');
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $fileSize = $productImage->getSize();
            $data["image"] = $fileName;
            $property = $this->Properties->patchEntity($property, $data);
            if ($this->Properties->save($property)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The User has been saved.",
                ));
                exit;
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The User  could not be saved. Please, try again.",
            ));
            exit;
        }
        
        $this->set(compact('property'));
    }



    public function propertyStatus($id = null, $status = null)
    {

        $this->request->allowMethod(['post']);
        $property = $this->Properties->get($id);
        if ($status == 1) {
            $property->status = 0;
        } else {
            $property->status = 1;
        }
        if ($this->Properties->save($property)) {
            $this->Flash->success(__('The status has been changed'));
        }
        return $this->redirect(['controller' => 'properties', 'action' => 'index']);
    }

    public function view($id = null)
    {
        // $this->viewBuilder()->setLayout('common');
        $property =  $this->Properties->get($id, [
            'contain' => ['PropertyCategories'],
        ]);

        $this->set(compact('property'));
    }

    public function delete($id = null)
    {
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getData('id');
            $property_status = $this->request->getData('property_status');

            $property = $this->Properties->get($id);
          
            if($property_status == 1){
                $property->property_status = 0;
            }else{
                $property->property_status = 1;

            }

            if($this->Properties->save($property)){
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The property has been deleted."
                ));
            
            }
        }


    }

    public function edit($id = null)
    {
        // $this->viewBuilder()->setLayout('common');
        $this->loadModel('PropertyCategories');
        $categories = $this->paginate($this->PropertyCategories);
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('property', 'categories'));
    }

    public function editproperty($id = null)
    { 
        // $this->viewBuilder()->setLayout('common');
        $this->loadModel('PropertyCategories');
         
        $categories = $this->paginate($this->PropertyCategories);
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            pr($property);
        if ($this->Properties->save($property)) {
           
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
    
        $this->set(compact('property', 'categories'));
    }
}
