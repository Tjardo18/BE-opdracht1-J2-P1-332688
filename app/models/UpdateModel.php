<?php

class UpdateModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function wijzigen($VoertuigId, $InstructeurId, $typeVoertuig, $autoMerk, $bouwjaar, $brandstof, $kenteken)
    {
        $sql = "UPDATE Voertuig
                SET TypeVoertuigId = $typeVoertuig,
                    Type = '$autoMerk',
                    Bouwjaar = '$bouwjaar',
                    Brandstof = '$brandstof',
                    Kenteken = '$kenteken',
                    DatumGewijzigd = sysdate(6)
                WHERE Id = $VoertuigId;
        
                UPDATE VoertuigInstructeur
                SET InstructeurId = $InstructeurId,
                    DatumGewijzigd = sysdate(6)
                WHERE VoertuigId = $VoertuigId;";
        $this->db->query($sql);

        header("refresh:2;../../voertuig/id/$InstructeurId");

        return $this->db->execute();
    }
}
