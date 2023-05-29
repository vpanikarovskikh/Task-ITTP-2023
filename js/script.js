let productTable = document.getElementById("productTable");
let oldRows = Array.from(productTable.rows).slice(1);

// функция сортировки по возрастанию
function sortingGrowth(){
    let sortedRows = Array.from(productTable.rows)
    .slice(1)
    .sort((a, b) => {
        return a.cells[1].innerHTML - b.cells[1].innerHTML;
    }) // в переменной будет массив строк таблицы, отсортированный по цене в порядке возрастания
    productTable.tBodies[0].append(...sortedRows);
}

// функция сортировки по убыванию
function sortingDecrease(){
    let sortedRows = Array.from(productTable.rows)
    .slice(1)
    .sort((a, b) => {
        return b.cells[1].innerHTML - a.cells[1].innerHTML;
    }) // в переменной будет объект, содержащий строки таблицы, 
    // отсортированные по цене в порядке убывания
    productTable.tBodies[0].append(...sortedRows);
}

// функция возвращает таблицу к исходному состоянию
function defaultTable(){ 
    productTable.tBodies[0].append(...oldRows);
    let rButton = document.getElementsByName("costSort"); //объект, содержащий радиокнопки
    rButton[0].checked = false;
    rButton[1].checked = false;
    document.getElementById("prodNameInp").value = "";
    findByWord();
    // очищает поле фильтрации по названию и возвращает таблицу к исходному состоянию
}

// функция фильтрации товаров по названию
function findByWord(){
    let findWord = document.getElementById("prodNameInp").value;
    let findWordRegExp = new RegExp(findWord);

    // цикл очистки таблицы для последующего добавления подходящих товаров
    for (let i = 1; i < productTable.rows.length; i++) {
        productTable.rows[i].style.display = "none";
    }

    // при совпадении названия товара со строкой из поиска, строка товара отображается
    for (let i = 1; i < productTable.rows.length; i++) {
        if (findWordRegExp.test(productTable.rows[i].cells[0].textContent)) {
            productTable.rows[i].style.display = "";
        }
    }
}