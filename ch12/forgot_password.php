<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        include ("php/cmsdb.php");
        $conn->real_escape_string($_POST['email']); // 避免SQL injection
        $result = $conn->query( "SELECT id FROM users WHERE email='$email'");
        if ($result->num_rows > 0){ // 是已註冊的 Email
            // 產生Token
            $token = "qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM1234567890!@$%^&*+";
            $token = str_shuffle($token);
            $token = substr($token, 0, 10);

            // 將token加入此使用者的資料錄
            $conn->query("UPDATE users SET token='$token', 
                expired=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email='$email'");
            
            // 使用PHPMailer寄送重置密碼郵件
            require_once ("PHPMailer/PHPMailer.php");
            require_once ("PHPMailer/Exception.php");
            require_once ("PHPMailer/SMTP.php");

            $mail = new PHPMailer();
            /* 使用 SMTP 方式寄信 */
            $mail->isSMTP();

            /* DEBUG */
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            /* SMTP 伺服器位置 */
            $mail->Host = "smtp.gmail.com";
            /* 安全認證開啟 */
            $mail->SMTPAuth = true;
            /* 設定SMTP的通訊埠 */
            $mail->Port = 587; // Gmail是465或587

            //Set the encryption mechanism to use - STARTTLS or SMTPS
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            /* 寄信者的SMTP帳號 */
            $mail->Username =  "ctlin2@gmail.com"; // $cms_gmailname;
            /* 寄信者的SMTP密碼 */
            $mail->Password = "hkfafzoibjharqxq"; // 二段式驗證密碼（16字)

            /* 寄信者電子郵件 */
            $mail->From = "ctlin2@gmail.com";
            /* 寄信者名稱 */
            $mail->FromName = "Chin—Tsai Lin";
            /* 收件者的電子郵件 */
            $mail->addAddress($email, "客倌");
            /* 回信的電子郵件 */
            $mail->addReplyTo("ctlin2@gmail.com", "Chin-Tsai Lin");
            /* 信件主旨 */
            $mail->Subject = "重置密碼";
            /* 設定斷行字數 */
            // $mail->WordWrap = 50;

            /* 設定信件字元編碼格式 */
            $mail->CharSet = "utf-8";
            /* 使用MIME定義的信件編碼格式 */
            $mail->Encoding = "base64";
            /* 信件格式為HTML語法 */
            $mail->isHTML(true);
            $mail->Body = htmlspecialchars("
            Hi, 
            為了要重置您在全能PHP網站的密碼，請點擊如下鏈結：
            'http://4070e999.ctlin.ml/ch12/reset_password.php?email=$email&token=$token'
            4070e999敬上");

            if ($mail->send()){
                // 回應 AJAX 狀態代碼與訊息
                exit(json_encode(array("status" => 1, 
                    "msg" => '重置密碼鏈結已送出，Please check your email！'))); 
            } else {
                exit(json_encode(array("status" => 0, 
                    "msg" => '郵件伺服器出了一些問題，請稍後重試！'.$mailer->ErrorInfo))); 
            }

            // 回應 AJAX 狀態代碼與訊息
            exit(json_encode(array("status" => 1, "msg" => '重置密碼鏈結已送出，Please check your email！'))); 
        }
        else {
            // 回應 AJAX 狀態代碼與訊息
            exit(json_encode(array("status" => 0, "msg" => 'This email is not regiestered，請檢查您輸入的email！'))); 
        }
    }
?>

<?php require("php/layout_head.php"); ?>

<!-- 版身開始 -->
<div class="bodyArea">
    <!-- 重設密碼 -->
    <div class="mrform">
        <form id="mrReset" class="formsty" method="POST" action="reset".php">
            <li class="mrtit">重設密碼</li>
            <li>電子郵件：<input type="text" name="email" id="email" style="width:95%;"></li>
            <a class="btnmrGet mrformC" id="mrBtnReset">重設密碼</a> 
        </form>
        <p id="response"></p>
    </div><!-- mrformL End -->
    
</div><!-- bodyArea End -->
<!-- 版身結束 -->

<script type="text/javascript">
    var email = $("#email");

    $(document).ready(function(){
        $('#mrBtnReset').on('click', function(){
            if (email.val() != ""){
                email.css('border', '1px solid green');
                $.ajax({
                    url: 'forgot_password.php',  // 回到本頁面
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        email : email.val()
                    },
                    beforeSend: function(){
                        /* 在資料尚未回傳之前，執行JS語法內容檢查 email 欄位值是否有合法 */
                        var isMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                        if (!isMail.test(email.val())){ // 郵件地址格式有誤
                            MsgAlertOn(); 
                            $('.MsgTxt').text('您填的電子郵件格式有誤');
                            $('#email').css("background-color", "#FCE6F2");
                            return false;
                        }
                    },
                    success: function(response, textStatus, jqXHR){
                        var json = $.parseJSON(response);
                        if (json.status == 0){
                            MsgAlertOn(); 
                            $('.MsgTxt').text(json.msg);
                            //$('#response').text(json.msg).css('color', "red");
                        }
                        else {
                            MsgAlertOn(); 
                            $('.MsgTxt').text(json.msg);
                            // $('#response').text(json.msg).css('color', "green");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log("An error occurred: " + errorThrown);
                    }
                });
            } else {
                email.css('border', '1px solid red');
            }
        });
    });

</script>

<?php require("php/layout_footer.php"); ?>