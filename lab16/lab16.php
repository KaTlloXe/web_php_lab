<?php
    $C = array(
        array(11.3, -7.2, 4.1),
        array(-8.4, -3.2, 1.7),
        array(8.3, 18.4, 13.7)
    );
    
    $max_positive_element = null;
    $max_positive_coordinates = null;
    $new_matrix = array();
    $negative_elements = array();
    $negative_product = 1;
    $positive_sum = 0;
    
    // Знайдемо максимальний додатний елемент та його координати
    foreach ($C as $row_index => $row) {
        foreach ($row as $col_index => $element) {
            if ($element > 0) {
                if ($max_positive_element === null || $element > $max_positive_element) {
                    $max_positive_element = $element;
                    $max_positive_coordinates = array($row_index, $col_index);
                }
            }
        }
    }
    
    // Обчислимо нову матрицю та знайдемо відємні елементи та їх добуток
    foreach ($C as $row_index => $row) {
        $new_row = array();
        foreach ($row as $col_index => $element) {
            $new_value = $element - $max_positive_element;
            $new_row[] = $new_value;
    
            if ($new_value < 0) {
                $negative_elements[] = $new_value;
                $negative_product *= $new_value;
            } elseif ($new_value > 0) {
                $positive_sum += $new_value;
            }
        }
        $new_matrix[] = $new_row;
    }
    
    // Обчислимо корінь квадратний
    $square_root = sqrt($positive_sum);
    
    // Виведемо результати
    echo "Максимальний додатний елемент: $max_positive_element\n";
    echo "Координати максимального додатнього елемента: (" . $max_positive_coordinates[0] . ", " . $max_positive_coordinates[1] . ")\n";
    echo "Нова матриця:\n";
    foreach ($new_matrix as $row) {
        echo implode(", ", $row) . "\n";
    }
    echo "Кількість від'ємних елементів у новій матриці: " . count($negative_elements) . "\n";
    echo "Добуток від'ємних елементів у новій матриці: $negative_product\n";
    echo "Сума додатних елементів у новій матриці: $positive_sum\n";
    echo "Корінь квадратний з суми додатних елементів: $square_root\n";
?>