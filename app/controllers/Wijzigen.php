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
        $result = $this->wijzigenModel->getNietToegewezen();
        $instructeur = $this->wijzigenModel->getInstructeur($id);

        if ($result == null) {
            $th = "";
            $rows = "<h2>Er zijn geen voertuigen meer om toe te voegen</h2>";
            header("refresh:3;../../voertuig/id/$id");
        } else {
            $th = "<th>Type Voertuig</th>
            <th>Type</th>
            <th>Kenteken</th>
            <th>Bouwjaar</th>
            <th>Brandstof</th>
            <th>Rijbewijscategorie</th>
            <th>Toewijzen</th>
            <th>Wijzigen</th>";

            $result = $this->wijzigenModel->getNietToegewezen();
            $rows = "";
            foreach ($result as $wijzigen) {
                $voertuig = $wijzigen->VoertuigID;

                $rows .= "<tr>
                <td>$wijzigen->TypeVoertuig</td>
                <td>$wijzigen->Type</td>
                <td>$wijzigen->Kenteken</td>
                <td>$wijzigen->Bouwjaar</td>
                <td>$wijzigen->Brandstof</td>
                <td>$wijzigen->Rijbewijscategorie</td>
                <td>
                    <a href='../../create/id/$voertuig?voertuig=$voertuig&instructeur=$id'>
                        <i class='bx bx-plus-medical' style='color:#29fd53'></i>
                    </a>
                </td>
                <td>
                    <a href='#'>
                        <i class='bx bxs-pencil' style='color:#29fd53'></i>
                    </a>
                </td>
                </tr>";
            }
        }


        $data = [
            'title' => 'Wijzigen voertuiggegevens',
            'rows' => $rows,
            'th' => $th
        ];

        $this->view('wijzigen/wijzigen', $data);
    }
}
