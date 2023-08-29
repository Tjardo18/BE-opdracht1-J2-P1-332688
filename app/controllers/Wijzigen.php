<?php

class Wijzigen extends BaseController
{
    private $wijzigenModel;

    public function __construct()
    {
        $this->wijzigenModel = $this->model('WijzigenModel');
    }

    public function index($id = NULL)
    {
        $result = $this->wijzigenModel->getVoertuig($id);


        $data = [
            'title' => 'Wijzigen voertuiggegevens',
            'instructeur' => $result->InstructeurId,
            'typeVoertuig' => $result->TypeVoertuigId,
            'autoMerk' => $result->Type,
            'bouwjaar' => $result->Bouwjaar,
            'brandstof' => $result->Brandstof,
            'kenteken' => $result->Kenteken
        ];

        $this->view('wijzigen/wijzigen', $data);
    }
}
