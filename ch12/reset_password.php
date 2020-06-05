<?php
    if (isset($_GET['email']) && isset($_GET['token'])){
        include("php/cmsdb.php");

        $email = $conn->real_escape_string($_GET['email']);
        $token = $conn->real_escape_string($_GET['token']);

        $result = $conn->query("SELECT id FROM users WHERE
         email='{$email}' AND token='{$token}' AND token<>'' AND 
         expired > NOW()");
        
        if ($result->num_rows > 0){
           // 顯示重設密碼表單
           $conn->close();
        } else {
            //echo "$email<br />";
            //echo "$token<br />";
            echo "$result->num_rows";
            $conn->close();
            header("location: forgot_password.php?Msg=2");
            // exit();
        }
    }
    else {
        header("location: login.php");
        exit();
    }
?>

<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <!-- 重設密碼 -->
    <div class="mrform">
        <form id="mrReset" class="formsty">
            <li class="mrtit">重設密碼</li>
            <li>新密碼：<input type="password" id="password" style="width:95%;"></li>
            <li>確認新密碼：<input type="password" id="password2" style="width:95%;"></li>
            <a class="btnmrGet mrformC" id="mrBtnReset">重設密碼</a> 
        </form>
        <input type="hidden" id="email" value="<?php echo $email; ?>">
        <input type="hidden" id="token" value="<?php echo $token; ?>"> 
    </div><!-- mrformL End -->
    
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<script type="text/javascript">
    var password = $("#password");
    var password2 = $("#password2");
    var email = $('#email');
    var token = $('#token');

    $(document).ready(function(){
        $('#mrBtnReset').on('click', function(){
            if (password.val().length > 0 && password.val() != password2.val()){
                MsgAlertOn(); 
                $('.MsgTxt').text("密碼不一致！").css('color', "red");
            }
            else {
                $.ajax({
                    url: 'new_password.php',  // 回到本頁面
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        email : email.val(),
                        token : token.val(),
                        password : password.val()
                    },
                    beforeSend: function(){
                        /* 在資料尚未回傳之前，執行JS語法內容檢查 email 欄位值是否有合法 */
                        var isPassw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,20}$/;
                        if (!isPassw.test(password.val())){ // 密碼不合規定
                            MsgAlertOn(); 
                            $('.MsgTxt').text('密碼長度需為6到20字，至少包含一個數字、符號、英文大寫字母與小寫字母');
                            $('#email').css("background-color", "#FCE6F2");
                            return false;
                        }
                    },
                    success: function(response, textStatus, jqXHR){
                        var json = $.parseJSON(response);
                        if (json.status == 0){
                            MsgAlertOn(); 
                            $('.MsgTxt').text(json.msg).css('color', "red");
                            //$('#response').text(json.msg).css('color', "red");
                        }
                        else {
                            MsgAlertOn(); 
                            $('.MsgTxt').text(json.msg).css('color', "green");
                            // $('#response').text(json.msg).css('color', "green");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log("An error occurred: " + errorThrown);
                    }
                });
            }
        });
    });
</script>

<?php require("php/layout_footer.php"); ?>