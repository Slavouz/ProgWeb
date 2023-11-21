<?php

function generator($n)
{
    for ($i = 1; $i < $n + 1; $i++) {
        if ($i % 3 == 0) {
            echo "Hello";
        } 
        if ($i % 5 == 0) {
            echo "World";
        } 
        if($i % 5 != 0 & $i % 3 != 0) {
            echo $i;
        }
        echo "<br/>";
    }
}

generator(15);