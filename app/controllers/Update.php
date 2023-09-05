<?php

class Update extends BaseController
{
    private $updateModel;

    public function __construct()
    {
        $this->updateModel = $this->model('UpdateModel');
    }

    public function index()
    {

        $VoertuigId = $_GET['voertuig'];
        $InstructeurId = $_GET['instructeur'];

        $this->updateModel->wijzigen($VoertuigId, $InstructeurId);

        $data = [
            'title' => 'Voertuig is gewijzigd'
        ];

        $this->view('update/update', $data);
    }
}
