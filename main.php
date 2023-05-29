<!DOCTYPE html>
<html>
<head>
	<title>Продукты</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="main">
        <h1>Продукты</h1>
        <!-- Начало блока с фильтром и сотрировкой -->
        <h3>Фильтры</h3>
        <p>Сортировка по цене:</p>

        <input type="radio" name="costSort" value="up" onclick="sortingGrowth()">По возрастанию</input><br>

        <input type="radio" name="costSort" value="down" onclick="sortingDecrease()">По убыванию</input>

        <p id="prodNameInpP">Фильтрация по названию:
        <input type="text" name="prodName" id="prodNameInp" placeholder="Введите название товара">
        <button id="prodNameInpFind" onclick="findByWord()">Искать</button></p>

        <button onclick="defaultTable()">Сбросить</button>
        <!-- Конец блока с фильтром и сотрировкой -->
<?php
	$conn = mysqli_connect("localhost", "root", "", "task"); //подключение к БД
    $sql = "SELECT * FROM products";
    if ($result = mysqli_query($conn, $sql)) {
        $name = []; //массив для названий товаров
        $cost = []; //массив для цен товаров

        foreach ($result as $row) {
            array_push($name, $row["название товара"]);
            array_push($cost, $row["цена"]);
        }

        echo "
            <table id=productTable>
            <tr>
                <th>Название товара</th>
                <th>Цена</th>
            </tr>";
        // Здесь формируется разметка таблицы. Далее в ячейки добавляется название товара и его цена
        for ($i = 0; $i < count($name); $i++) { 
            echo "<td class=prodName>" . $name[$i] . " </td><td class=prodCost>" . $cost[$i] . "</td></tr>";
        }
        echo "
            </table>";
    }
    else 
        echo mysqli_error($conn);
    
    echo "</div>"; //закрывающий тег главного div'а
    mysqli_close($conn);
?>
    <script src="js/script.js"></script>
</body>
</html>
