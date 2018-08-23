<?php

require_once "SupportingClass.php";


$test = new ViewTable;

$test->funcView();

class ViewTable
{


    function funcView()
    {
        $suppClass = new SupportingClass();
        $dataOfArray = $suppClass->getValue();
        echo "<table border>";
        echo "<tr style=\"text-align:center;\">
	<td>#</td>
	<td>a</td>
	<td>b</td>
	<td>c</td>
	<td>s</td>
	<td>Chetnost</td>
	<td>f1</td>
	<td>f2</td>
	</tr>";
        echo "<tr>";

        foreach ($dataOfArray as $keyDatar => $valData) {

            echo "<td>";
            echo $keyDatar + 1;
            echo "</td>";

            foreach ($valData as $key => $value) {
                echo "<td>";
                echo "$value" . "  ";
                echo "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }
}


?>