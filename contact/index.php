<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/config.php");
    
    if($_SERVER['REQUEST_METHOD'] =='POST'){
       
       if($_POST['address'] != ''){
            $error_message = "essh! you can't be doing that.";
        }else{
            /* if the address is empty:
                    -unset here so, the loop can pass w/o a validation error below.
            */
            unset($_POST['address']);
        }
        
        //creates an email body
        if(!isset($error_message)){
            $email_body='';
            foreach($_POST as $key => $post){
                $post = trim($post);
                if($post != ""){
                    $email_body .= strtoupper($key).": ".$post."\n";
                }else{
                    $fields[] = $key;
                }
            }
        }
        
        //if fields is not empty- you get redirected to errorhandler.php
        if(isset($fields)){
            $error_message = "The following field(s) are not set: <br/><br/>";
            foreach($fields as $field){
                $error_message .= strtoupper($field)." ";
            }
        }
        
        if(!isset($error_message)){
            foreach( $_POST as $value ){
                if( stripos($value,'Content-Type:') !== false ){
                    $error_message = "HMM, There seem to be a problem, please try again later.";
                }
            }
        }
        
        require_once(ROOT_PATH.'inc/phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        
        if((!isset($error_message)) && (!$mail->ValidateAddress($_POST['email']))){
            $error_message = "You must enter in a valid email address";
        }
        
        if(!isset($error_message)){
            if(mail('bejoybkm@yahoo.co.in','Shirt For Mike Contact Form Submission | '. $_POST['name'],$email_body)){
                header('LOCATION:'.BASE_URL.'contact/thanks');
                exit;
            }else{
                $error_message ='There seem to be a problem sending the email.';
            }
        }
        
        /*$mail->SetFrom($_POST['name'],$_POST['email']);
        $mail->AddAddress('bejoybkm@yahoo.co.in','Shirts 4 Mike');
        $mail->Subject = ;
        $mail->MsgHtml($email_body);
        
        if(!$mail->Send()){
            $error ='There seem to be a problem sending the email: '. $mail->ErrorInfo;
            header('LOCATION:errorhandler.php?error='.$error);
            exit;
        }*/
    }
?>

<?php
$pageTitle = 'CONTACT';
$pageSection='contact';
include(ROOT_PATH.'inc/header.php');
?>

<div class="section page">
    <div class="wrapper">
        <h1>CONTACT</h1>
        <?php if(isset($_GET['status']) && $_GET['status']=='thanks'){?>
            <p>Thank you! We&rsquo;ll get in touch with you soon.</p>
        <?php }else{?>
                <?php if(!isset($error_message)){
                            echo "<p>I&rsquo;d love to hear your feed back!</p>";
                        }else{
                            echo "<p class='message'>{$error_message}</p>";
                        }
                ?>
                    <form method="POST" action="<?php echo BASE_URL;?>contact/">
                        <table>
                            <tr>
                                <th>
                                    <label for="name">NAME </label>
                                </th>
                                <td>
                                    <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])){ echo htmlspecialchars($_POST['name']); }?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email">EMAIL </label>
                                </th>
                                <td>
                                    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])){ echo htmlspecialchars($_POST['email']); }?>"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="message">MESSAGE </label>
                                </th>
                                <td>
                                    <textarea type="text" name="message" id="message"><?php if(isset($_POST['message'])){ echo htmlspecialchars($_POST['message']); }?></textarea>
                                </td>
                            </tr>
                            <tr style="display:none;">
                                <th>
                                    <label for="address">Address </label>
                                </th>
                                <td>
                                    <input type="text" name="address" id="address"/>
                                    <p>IF YOU SEE THIS, DON'T FILL IT OUT</p>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="submit"/>
                    </form>
        <?php }?>
    </div>
</div>


<?php
include(ROOT_PATH.'inc/footer.php');
?>