<?php
namespace App\Service;

class Utils
{
    public function getLabelType(int $type = 1) {
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
            default:
                $label ='Avion';
            break;
        }
        return $label;
    }

}