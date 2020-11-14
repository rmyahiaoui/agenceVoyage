<?php
namespace App\Service;

class Utils
{
    public function getLabelType(int $type) {
        $label ='';

        switch($type) {
            case 1:
                $label ='Avion';
                break;
            case 2:
                $label ='Bus';
                break;
            case 3:
                $label ='Train';
                break;
            case 4:
                $label ='Bateau';
                break;
        }
        return $label;
    }

}