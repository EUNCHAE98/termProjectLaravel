<?php

require_once("memberDao.php");
require_once("boardDao.php");
require_once("tools.php");

$bdao = new boardDao();
$mdao = new memberDao();

$msgs = $bdao->getAllBoard("qboard");



?>
<html>
    <head>
    
    <?php
        
        require_once("header.php");
    
    ?>

    </head>


<body>
   
   <?php
        require_once("logo.php");
    
    ?>
        <div class="container">


            <!-- 이건 QnA 입니다~~~ 하는 이미지 -->

            <div class="carousel-inner" style="height:300px">
                <img src="img/back.jpg" style="width:100%;">
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">writer</th>
                        <th scope="col">when</th>
                        <th scope="col">hit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($msgs as $row) :?>
                    <tr>
                        <th scope="row">
                            <?= $row["num"] ?>
                        </th>

                    <td><input type="button" class="btn btn-link" value="<?= $row["title"] ?>" onclick="location.href='view.php?num=<?= $row["num"]?>'"></td>
                        <td>
                            <?= $row["writer"] ?>
                        </td>
                        <td>
                            <?= $row["regtime"] ?>
                        </td>
                        <td>
                            <?= $row["hits"] ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="col-14 d-flex p-2 justify-content-end">
                <input type="button" value="글쓰기" class="btn btn-default" onclick="location.href='write_form.php'">
            </div>
        </div>
    </body>


    </html>
