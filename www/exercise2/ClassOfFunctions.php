<?php
/**
 *     класс с функциями на нахождение степени числа и
 *     минимального числа массива.
 *
 *
 */

class ClassOfFunctions
{
    /**
     * функция нахождения степени
     */

    public static function getDegrees($a, $x)
    {
        $b = 1;
        for ($i = 0; $i < $x; $i++) {
            $b *= $a;
        }
        return $b;
    }

    /**
     * функция нахождения мин.числа массива
     */
    public static function getMinNumArray($arr)
    {
        reset($arr);
        $variab = current($arr);
        foreach ($arr as $val) {
            if ($val < $variab) {
                $variab = $val;
            }
        }
        return $variab;
    }


}


?>