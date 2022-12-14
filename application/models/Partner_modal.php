<?php 
class Partner_modal extends CI_Model 
{

	public function sendmailpartner($subject,$htmlBody,$to){

// 		$replysub = "Confirmation Mail by Nuevo Bazzar";

            $this->load->library ( 'email' );
            $config ['protocol'] = 'smtp';
            $config ['smtp_host'] = 'mail.nuevoinformatica.com';
            $config ['smtp_port'] = '587';
            $config ['smtp_user'] = 'abinjose@nuevoinformatica.com';
            $config ['smtp_pass'] = 'abin15';
            $config ['mailtype'] = 'html';
            $config ['charset'] = 'utf-8';
            $config ['wordwrap'] = TRUE;
            $config ['newline'] = "\r\n";
            
           
            
           
           
            $this->email->initialize ( $config );
           
           
            $this->email->from ( 'abinjose@nuevoinformatica.com', 'nuevo' );
            
            $this->email->to ( 'pm@nuevoinformatica.com','nuevo' );
            // $this->email->to ( $to );
            $this->email->reply_to($to);
            
            $this->email->subject ( $subject );
            $this->email->message($htmlBody);
        
//          
            
        
        if($this->email->send()){   
            
            // $this->email->initialize ( $config );
            // $this->email->from ( 'pm@nuevoinformatica.com', 'nuevo' );
            // $this->email->to ( $to );
            // $this->email->reply_to($to);
            // $this->email->subject ( 'Confirmation from Nuevo Bazzar' );
            // $this->email->message('Thank you for your interest.Our Support Team will contact you shortly.');
            
            return 1;
        } else {
            return 0;
            // echo  $this->email->print_debugger();
        }
    }
	


}	