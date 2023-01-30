<?php
require_once "vendor/autoload.php";
require_once "./Admin/function.php";
$fileName='F107.docx';
$phpWord = new  \PhpOffice\PhpWord\PhpWord();
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('forma-F107.docx');
$serch_name=$_POST['search-name'];
$company_name=$_POST['company-name'];
//Здаем массив со значениями наших POST идентификаторов и с помощью foreach
//проходим по ним
$param_product=array("predmet","predmet1","predmet2","predmet3","predmet4","predmet5","predmet6","predmet7","predmet8","predmet9","predmet10","predmet11","predmet12","predmet13","sum_predm","sum_predm1","sum_predm2","sum_predm3","sum_predm4","sum_predm5","sum_predm6","sum_predm7","sum_predm8","sum_predm9","sum_predm10","sum_predm11","sum_predm12","sum_predm13");
foreach ($param_product as $prs) {
    $pr=good_param($_POST[$prs]);
    $templateProcessor->setValue($prs, $pr);

}
$param_products=array("kolich_predm","kolich_predm1","kolich_predm2","kolich_predm3","kolich_predm4","kolich_predm5","kolich_predm6","kolich_predm7","kolich_predm8","kolich_predm9","kolich_predm10","kolich_predm11","kolich_predm12","kolich_predm13");
foreach ($param_products as $iter) {
    $pr=1;
    $pr=good_param($_POST[$iter]);
    $templateProcessor->setValue($iter, $pr);
}
$param_producti=array("kolich_predm","kolich_predm1","kolich_predm2","kolich_predm3","kolich_predm4","kolich_predm5","kolich_predm6","kolich_predm7","kolich_predm8","kolich_predm9","kolich_predm10","kolich_predm11","kolich_predm12","kolich_predm13");
foreach ($param_producti as $its) {
    $kolpredm[$its]=good_param($_POST[$its]);
    $sum_kolich=array_sum($kolpredm);
}
$param_producty=array("sum_predm","sum_predm1","sum_predm2","sum_predm3","sum_predm4","sum_predm5","sum_predm6","sum_predm7","sum_predm8","sum_predm9","sum_predm10","sum_predm11","sum_predm12","sum_predm13");
foreach ($param_producty as $item) {
    $pr=1;
    $pr=good_param($_POST[$item]);
    $templateProcessor->setValue($item, $pr);
}
$param_productu=array("sum_predm","sum_predm1","sum_predm2","sum_predm3","sum_predm4","sum_predm5","sum_predm6","sum_predm7","sum_predm8","sum_predm9","sum_predm10","sum_predm11","sum_predm12","sum_predm13");
foreach ($param_productu as $itey) {
    $pre[$itey]=good_param($_POST[$itey]);
    $sum_predm=array_sum($pre);
}
if (!$_POST)
{
$_POST='';
}

$templateProcessor->setValue('namef107', $serch_name);
$templateProcessor->setValue('company', $company_name);
$templateProcessor->setValue('sum_kolich', $sum_predm);
$templateProcessor->setValue('sum_predmetov', $sum_kolich);
$templateProcessor->saveAs($fileName);
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Заполнить опись вложения почта России Ф-107. Скачать документ в формате Ворд. Распечатать на компьютере.">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./favicon.png" type="image/x-icon">
    <title>Опись вложения ф 107 бланк заполнить онлайн и распечатать</title>
</head>
<body>

<div class="header">
    <div class="container">
        <?php
        require_once 'navigate.php';
        ?>

        <div class="col-lg-12">
            <h1 id="code" class="form-search-header text-center">Бланк описи вложения Ф 107</h1>
            <p class="form-search-paragraph text-center">Заполните форму и нажмите скачать для получения бланка описи Ф 107</p>
        </div>

        <form class="index-form" method="post">
            <table border="1" id="v_table">
                <tbody>
                <tr>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group form-search">
                                <input class="form-control serch-value" name="search-name" type="text" placeholder="Укажите ФИО" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group form-search">
                                <input class="form-control serch-value" name="company-name" type="text" placeholder="Название фирмы" required>
                            </div>
                        </div>
                    </div>
                    <td><input class="form-control serch-value" type="text" name="predmet" placeholder="Наименование" required></td>
                    <td><input class="form-control serch-value" type="text" name="kolich_predm" placeholder="Кол-во" required></td>
                    <td><input class="form-control serch-value" type="text" name="sum_predm"  placeholder="Ценность" required></td>
                </tr>
                <script type="text/javascript">
                    var d = document;
                    var last_id = 0;
                    function add_value_f() {

                        // находим нужную таблицу
                        var tbody = d.getElementById('v_table').getElementsByTagName('tbody')[0];

                        // создаем строку таблицы и добавляем ее
                        var row = d.createElement("tr");
                        tbody.appendChild(row);

                        // создаем ячейки в вышесозданной строке
                        var td1 = d.createElement("td");
                        var td2 = d.createElement("td");
                        var td3 = d.createElement("td");

                        row.appendChild(td1);
                        row.appendChild(td2);
                        row.appendChild(td3);

                        last_id = last_id + 1;

                        // добавляем поля в ячейки
                        td1.innerHTML = '<input type="text" class="form-control serch-value"name="predmet'+last_id+'" placeholder="Наименование">';
                        td2.innerHTML = '<input type="text" class="form-control serch-value"name="kolich_predm'+last_id+'" placeholder="Кол-во">';
                        td3.innerHTML = '<input type="text" class="form-control serch-value"name="sum_predm'+last_id+'" placeholder="Ценность">';
                    }
                </script>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-search-button text-center">
                        <button type="button" name="search" class="btn serch-value-button" onclick="add_value_f()">Добавить строки+</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-search-button text-center">


                        <button type="submit" name="search2" class="btn serch-value-button">1.ЗАПОЛНИТЬ</button>
                    </div>
                </div>
                <script language="JavaScript">
                    <!-- hide
                    function openNewWin(url) {
                        myWin= open(url);
                    }
                    // -->
                </script>
                <?php
                if (isset($_POST['search2'])){?>
                <div class="col-lg-4">
                    <div class="form-search-button text-center">
                        <button type="submit" onclick="openNewWin('/F107.docx')" name="search3" class="btn serch-donwld-button">2.СКАЧАТЬ</button>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="col-lg-4">
                    <div class="form-search-button text-center">
                        <button type="button" name="search4" onclick="openNewWin('/F107-obrazec.docx')" class="btn serch-value-button" >Пустой бланк</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</header>
<section class="post-section">
    <div class="container">
        <div class="col-lg-12">
            <h2 id="param" class="text-center">Блог по заполнению Ф-107</h2>
            <p class="text-center">"Список тем, интересующих пользователей при заполнении или получении описи в отделениях почты РФ."</p>
        </div>
        <div class="card-group">
            <?php
            two_index_post();
            foreach ($index_two_posts as $two){

            ?>
            <div class="card index-post">
                <img src="./images/<?php echo $two ['image']?>" class="card-img-top index-image" alt="<?php echo $two ['image_alt']?>">
                <div class="card-body">
                    <h3> <a href="/post.php?url=<?php echo $two ['url']?>" class="card-title"><?php echo $two ['title']?></h3></a>
                    <p class="card-text"><?php echo mb_strimwidth($two ['description'],0,80,"...");?></p>
                    <p class="card-text"><small class="text-muted"><?php echo "Опубликовано: ".date("d.m.Y",strtotime($two ['date']))?></small></p>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</section>
<section class="info-section">
    <div class="container">
        <div class="col-lg-12">
            <h3 id="faq" class="text-center">Вопросы по теме описи</h3>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="accordion" id="accordionExample1">

                        <h4 class="lg-0">
                            <button class="btn btn-link text-center buton-info" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Что такое опись вложения?
                            </button>
                        </h4>

                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Для чего используется опись вложения Ф-107?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Как правильно заполнять документ?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Куда подавать Ф-107?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Где брать бланк?
                            </button>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="accordion" id="accordionExample">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section"> Опись вложения по форме Ф-107, применяется в тех случаях, когда требуется отправить какие-либо документы или вещи значимой ценности. В документе отражаются все имеющиеся в отправлении предметы. В случае их порчи или кражи, Вы легко сможете доказать факт наличия тех или иных и получить за них компенсацию.</p>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section">В основном в качестве подстраховки от всех возможных случаев, связанных с кражей или порчей при перевозке, находящихся в посылке или письме вещей. </p>
                            </div>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section"> Бланк Ф-107 заполняется отправителем в 2х экземплярах. В документе отражаются все пересылаемые предметы, также указывается их количество и ценность. Если оценить невозможно или Вы не хотите этого делать, то в соответствующем поле ставится прочерк. Опись должна быть написана без помарок. </p>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section"> В отделение почты России. Один экземпляр описи отдается в отделение почты России, а другой остается Вам. Сотрудник обязан сверить указанные в документе предметы, с имеющимися. По завершению проверки ставится печать и подпись с необходимой информацией.</p>
                            </div>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section"> Бланк описи предоставляется самим заявителем. Взять его можно у нас на сайте. Также в форме выше можно предварительно заполнить документ нужной информацией. Таким образом Вам останется только скачать форму Ф-107 в формате Ворд и распечатать. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php
require_once 'footer.php';
?>
</html>