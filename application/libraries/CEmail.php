<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEmail {
	protected $ci;
	protected $protocol = 'smtp';

	public function __construct() {
		$this->ci = &get_instance();
		
		$config['mailtype'] = 'html';
		$this->ci->load->library('email',$config);
		include_once APPPATH.'vendor/autoload.php';//
	}

	/**
	 * return to send mail
	 */
	public function moduleForgetPassword($to, $subject, $message, $cc = null, $bcc = null) {
	    return $this->do_mail($to, $cc, $bcc, $subject, $message);
	}

	/**
	 * send email
	 */
	public function do_mail($to, $cc = null, $bcc = null, $subject, $message) {
	    $mail = new PHPMailer\PHPMailer\PHPMailer();
	    try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.thecoconutwater.in';
            $mail->SMTPAuth = true;
            $mail->Username = 'wesa@thecoconutwater.in';
            $mail->Password = 'GblT}=Y3EeI!';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            //Recipients
            $mail->SetFrom('wesa@thecoconutwater.in', 'Wesa');
            $mail->AddReplyTo('wesa@thecoconutwater.in', 'Wesa');
            $mail->AddAddress($to);     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = '';
            $mail->send();
            return true;
        } catch (phpmailerException $e) {
		  echo $e->errorMessage(); //Pretty error messages from PHPMailer
		  return false;
		} catch (Exception $e) {
		  echo $e->getMessage(); //Boring error messages from anything else!
		  return false;
		}
	}

}

/* End of file CEmail.php */
/* Location: ./application/libraries/CEmail.php */
