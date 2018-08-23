<?php
/**
 *    функция создающая двухмерный ассоциативный массив
 */
require_once "PrimeNumbers.php";
require_once "FirstFormula.php";
require_once "SecondFormula.php";


class SupportingClass
{
    private $newArrayInArray = array();
    private $arrayPriNumb;

    function __construct()
    {

        $prime = new PrimeNumbers();
        $this->arrayPriNumb = $prime->getArrayPrimeNumbers(10, 53);


        $this->createNestedArray();
        $this->searchAreaAndOddNumber();
        $this->searchLessS();

        $this->calculateFirstFormula();
        $this->calculateSecondFormula();
    }

    /**
     *   функция из простого масива в ассоциативный с ключами:a,b,c
     * @return array
     */
    public function createNestedArray()
    {


        $aChar = 'a';
        $variableLocal = 0;

        for ($i = 0; $i <= 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $this->newArrayInArray[$i][$aChar] = $this->arrayPriNumb[$variableLocal];
                $aChar++;
                $variableLocal++;
                if ($aChar == 'd') $aChar = 'a';
            }
        }
        return $this->newArrayInArray;
    }

    /**
     *   функция добавления в массив ключа "s" и нахождение площади трапеции
     *
     *   Так же определение не четного и четного числа площади трапеции
     */

    public function searchAreaAndOddNumber()
    {

        for ($i = 0; $i <= 3; $i++) {
            $s = (($this->newArrayInArray[$i]['a'] + $this->newArrayInArray[$i]['b']) / 2) * $this->newArrayInArray[$i]['c'];

            $this->newArrayInArray[$i]['s'] = $s;

            if ($s % 2 == 0) $this->newArrayInArray[$i]['odd'] = "Chetnoe";
            else   $this->newArrayInArray[$i]['odd'] = "Ne chetnoe";
        }
        return $this->newArrayInArray;
    }

    /**
     *   функция нахождения max площади < 1400
     */
    public function searchLessS()
    {
        $in = -1;

        $timeVar = $this->newArrayInArray[0]['s'];

        do {
            $in++;
            if ($this->newArrayInArray[$in]['s'] < 1400) {
                if ($this->newArrayInArray[$in]['s'] > $timeVar) {
                    $timeVar = $this->newArrayInArray[$in]['s'];

                }
            } else break;
        } while (true);
        echo "Размеры трапеции, у которой максимальная площадь, но не больше 1400 = " . $timeVar;
    }

    function calculateFirstFormula()
    {
        return FirstFormula::formulaOne($this->newArrayInArray);

    }

    function calculateSecondFormula()
    {
        return SecondFormula::formulaTwo($this->calculateFirstFormula());
    }

    public function getValue()
    {

        return $this->calculateSecondFormula();
    }

}

?>