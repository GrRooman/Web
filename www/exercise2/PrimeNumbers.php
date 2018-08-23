<?php
/**
 * Class PrimeNumbers
 * Класс реализует вычисление простых чисел,
 * упаковку в массив , а также выдачу количества простых чисел
 * в заданном промежутке
 */


class PrimeNumbers
{

    public function getArrayPrimeNumbers($x, $y)
    {
        $numbArray = array();
        for ($i = $x; $i <= $y; $i++) {
            if ($this->isPrime($i)) {
                $numbArray[] = $i;
            }
        }
        return $numbArray;
    }

    public function getCountPrimeNumbers($x, $y)
    {
        $numbCount = 0;
        for ($i = $x; $i <= $y; $i++) {
            if ($this->isPrime($i)) {
                $numbCount++;
            }
        }
        return $numbCount;
    }

    private function isPrime($x)
    {
        if ($x == 1) return false;
        if ($x == 2) return true;
        if ($x % 2 == 0) return false;
        for ($i = 3; $i * $i <= $x; $i += 2) {
            if ($x % $i == 0) return false;

        }
        return true;
    }
}


?>