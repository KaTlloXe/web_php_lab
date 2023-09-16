<!DOCTYPE html>
<html>
<head>
    <title>Результати обчислень</title>
    <style>
        /* Стилі для вигляду результатів */
        .result-container {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        /* Стилі для блоку з інформацією про розробника */
        .developer-info {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="result-container">
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
        
        // Обчислимо нову матрицю та знайдемо від'ємні елементи та їх добуток
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
        echo "<h2>Результати обчислень:</h2>";
        echo "<div>Максимальний додатний елемент: $max_positive_element</div>";
        echo "<div>Координати максимального додатнього елемента: (" . $max_positive_coordinates[0] . ", " . $max_positive_coordinates[1] . ")</div>";
        echo "<div>Нова матриця:</div>";
        echo "<div>";
        foreach ($new_matrix as $row) {
            echo implode(", ", $row) . "<br>";
        }
        echo "</div>";
        echo "<div>Кількість від'ємних елементів у новій матриці: " . count($negative_elements) . "</div>";
        echo "<div>Добуток від'ємних елементів у новій матриці: $negative_product</div>";
        echo "<div>Сума додатних елементів у новій матриці: $positive_sum</div>";
        echo "<div>Корінь квадратний з суми додатних елементів: $square_root</div>";
        ?>
    </div>
    
    <div class="developer-info">
        <h2>Розробник:</h2>
        <div>Прізвище, ім'я, по батькові: Котлінський Олександр Олексійович</div>
        <div>Група: СН-41</div>
        <div>Дата створення документу: <?php echo date('Y-m-d'); ?></div>
        <div>Поточна дата: <?php echo date('Y-m-d H:i:s'); ?></div>
    </div>
</body>
</html>
