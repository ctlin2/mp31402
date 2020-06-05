<!DOCTYPE html>
<html lang="zh-TW">
    <head>  
        <title>PHP全能網頁設計師</title>
        <meta charset="utf-8">
        <meta name="keywords" content="網頁關鍵字">
        <meta name="description" content="網頁大綱">
        <link rel="stylesheet" href="css/layout.css">
        <!--<script src="js/jquery-3.4.1.min.js"></script>-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/layout.js"></script>
    </head>
    <body>

<!-- 版頭開始 -->
<div class="headArea">
    <div class="head-L">
        <a title="PHP全能網頁設計師" href="./"><img src="images/logo.png"></a>
    </div><!-- head-L end -->
    <div class="head-R">
        <form action="find.php" method="GET">
            <input type="text" name="keyword" size="30">
            <input type="submit" value="送出" name="keywordSend">
        </form>
    </div><!-- head-R end -->
</div><!-- headArea End -->
<!-- 版頭結束 -->

<!-- 按鈕列開始 -->
<div class="headBtnArea">
    <div class="headBtn">
        <li class="Lline"><a title="關於我們" class="btn1" href="about.php">關於我們</a></li>
        <li><a title="產品介紹" class="btn1" href="prolist.php">產品介紹</a></li>
        <li><a title="產品QA" class="btn1" href="qalist.php">產品QA</a></li>
        <li><a title="最新消息" class="btn1" href="news.php">最新消息</a></li>
        <li><a title="加入會員" class="btn1" href="member.php">加入會員</a></li>
        <li><a title="聯絡我們"class="btn1" href="contact.php">聯絡我們</a></li>
    </div><!-- headBtn End -->
</div><!-- headBtnArea End -->
<!-- 按鈕列結束 -->

<!-- 版身開始 -->
<div class="js-tit">隱藏、出現 - 預設值</div>
<div id="div-hideshow1">
    <img src="images/logo-footer.png">
</div>
<div class="js-btndiv">
    <a id="btn-hide1" class="jsbtn">隱藏</a>
    <a id="btn-show1" class="jsbtn">出現</a>
</div>

<div class="js-tit">增加、移除 CSS</div>
<div id="addrecss">
    <img src="images/logo-footer.png">
</div>

<!-- 隨機呈現產品圖片開始 -->
<div class="index-tab">
    <div class="tabtit"><img src="images/tit-index.jpg"></div>
    <div class="tab4s">
        <li class="tab4s-img"><img src="images/temp1.jpg"></li>
        <li class="tab4s-tit">這裡是標題</li>
        <div class="tab4s-txt">
            這裡是隨機呈現產品圖片的文字說明區塊這裡是隨機呈現產品圖片的文字說明區塊
        </div>
        <div class="tab4s-himg">
            <img title="前往" src="images/link-icon.png">
        </div>
    </div><!-- tab4s End -->
    <div class="tab4s">
        <li class="tab4s-img"><img src="images/temp2.jpg"></li>
        <li class="tab4s-tit">這裡是標題</li>
        <div class="tab4s-txt">
            這裡是隨機呈現產品圖片的文字說明區塊這裡是隨機呈現產品圖片的文字說明區塊
        </div>
        <div class="tab4s-himg">
            <img title="前往" src="images/link-icon.png">
        </div>
    </div><!-- tab4s End -->
    <div class="tab4s">
        <li class="tab4s-img"><img src="images/temp3.jpg"></li>
        <li class="tab4s-tit">這裡是標題</li>
        <div class="tab4s-txt">
            這裡是隨機呈現產品圖片的文字說明區塊這裡是隨機呈現產品圖片的文字說明區塊
        </div>
        <div class="tab4s-himg">
            <img title="前往" src="images/link-icon.png">
        </div>
    </div><!-- tab4s End -->
    <div class="tab4s">
        <li class="tab4s-img"><img src="images/temp4.jpg"></li>
        <li class="tab4s-tit">這裡是標題</li>
        <div class="tab4s-txt">
            這裡是隨機呈現產品圖片的文字說明區塊這裡是隨機呈現產品圖片的文字說明區塊
        </div>
        <div class="tab4s-himg">
            <img title="前往" src="images/link-icon.png">
        </div>
    </div><!-- tab4s End -->
</div><!-- index-tab End -->
<!-- 隨機呈現產品圖片結束 -->
<!-- 版身結束 -->

<!-- 版尾開始 -->
<div class="footerArea">
    <div class="footer">
        <li class="footer-L">
            PHP全能網頁設計師 © 2014 All Rights Reserved.<br>
            地址：○○○○○○○○○○○○○○○○○○○○○<br>
            電話：○○○○○○○○○○<br>
            傳真：○○○○○○○○○○<br>
            電子郵件：○○○○○○○○○○
        </li><!-- footer-L End -->
        <li class="footer-R">
            <a title="PHP全能網頁設計師" href="./"><img src="images/logo-footer.png"></a>
        </li><!-- footer-R End -->
    </div><!-- footer End -->
</div><!-- footerArea End -->
<!-- 版尾結束 -->

    </body>
</html>