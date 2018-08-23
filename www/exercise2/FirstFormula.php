<?php
/**
 *
 */
require_once "ClassOfFunctions.php";


class FirstFormula
{


    //f=(a*b^c+(((a/c)^b)%3)     ^min(a,b,c)  )
    public static function formulaOne($ages)
    {
        for ($i = 0; $i < count($ages); $i++) {
            $a = $ages[$i]['a'];
            $b = $ages[$i]['b'];
            $c = $ages[$i]['c'];

            $f = $a * ClassOfFunctions::getDegrees($b, $c)
                + (ClassOfFunctions::getDegrees((ClassOfFunctions::getDegrees(($a / $c), $b) % 3), ClassOfFunctions::getMinNumArray($ages[$i])));

            $ages[$i]['f1'] = $f;

        }
        return $ages;
    }
}