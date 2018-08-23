<?php
/**
 *
 */
require_once "ClassOfFunctions.php";


class SecondFormula
{
//f2=((a+b)^c*(a/c)^min(a,b,c))
    public static function formulaTwo($ages)
    {
        for ($i = 0; $i < count($ages); $i++) {
            $a = $ages[$i]['a'];
            $b = $ages[$i]['b'];
            $c = $ages[$i]['c'];

            $f = ClassOfFunctions::getDegrees(($a + $b), $c)
                * ClassOfFunctions::getDegrees(($a / $c), ClassOfFunctions::getMinNumArray($ages[$i]));

            $ages[$i]['f2'] = $f;
        }
        return $ages;
    }

}