<?php

namespace App\Controllers;

use App\Models\CommonModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function create()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                "name" => ["label" => "name", 'rules' => "required"],
                "phone" => ["label" => "phone", 'rules' => "required"],
                "email" => ["label" => "email", 'rules' => "required"],
            ]);
            if ($rules == true) {
                $name = $this->request->getPost("name");
                $phone = $this->request->getPost("phone");
                $email = $this->request->getPost("email");
                $data = [
                    "name" => $name,
                    "phone" => $phone,
                    "email" => $email,
                ];
                $model->insertValue($data);
                echo json_encode(["status" => "Success", "data" => "Data Inserted Successfully", "errors" => []]);
            } else {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                echo json_encode(["status" => "Error", "data" => "Validation Error", "errors" => $errors]);
            }
        }
    }
    public function getData()
    {
        $model = new CommonModel;
        $data['result'] = $model->getAllValue();    
        $selectPage = view("table", $data);
        echo json_encode($selectPage);
    }
    public function deleteData()
    {
        $model = new CommonModel;
        $id = $this->request->getPost('id');        
        $model->deleteValue(["id" => $id]);
        echo json_encode(["status" => "Success", "data" => "Data Deleted Successfully"]);
    }
    public function getDataById()
    {
        $model = new CommonModel;
        $id = $this->request->getPost('id');
        $data = $model->getValue(["id" => $id]);
        echo json_encode($data);
    }
    public function updateData()
    {
        $model = new CommonModel;
        $id = $this->request->getPost('id');
        $data = [
            "name" => $this->request->getPost("name"),
            "phone" => $this->request->getPost("phone"),
            "email" => $this->request->getPost("email")
        ];

        // Update the data
        $model->updateValue(["id" => $id], $data);
        echo json_encode(["status" => "Success", "data" => "Data Updated Successfully"]);
    }

}
