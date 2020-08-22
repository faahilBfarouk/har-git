<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail extends CI_Controller {

    public function index() {
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->view('sendemail');
    }

    public function send() {
        $subject = 'Contact Request From: ' . $this->input->post("name");
        $service = $this->input->post("service");
        $message = $this->input->post("message");
        $mob = $this->input->post("Ph_Num");
        $all = get_All_Services();
        foreach ($all as $serv) {
            if ($serv["services_id"] == $service)
                $service = $serv['services_name'];
        }
        $bodyText = "Service Requested: " . $service . "<br>";
        $body = $bodyText . 'Message: ' . $message . "<br><\b> Contact" . $mob . "</b>";

        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'mail.codingmagic.net',
            'smtp_port' => 465,
            'smtp_user' => 'sabah@codingmagic.net',
            'smtp_pass' => 'Sabah10178$',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('email', $config);
        $this->load->library('form_validation');

        $this->email->set_newline("\r\n");
        $this->email->from($this->input->post("email"));
        $this->email->to('sabahkc@gmail.com');
        $this->email->subject($subject);

        $config1 = array(
            array(
                'field' => 'Ph_Num',
                'label' => 'Ph_Num',
                'rules' => 'numeric|required',
                'errors' => array(
                    'required' => 'Please enter Mobile number'
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|xss_clean',
                'errors' => array(
                    'required' => 'Please enter Email ID'
                )
            ),
            array(
                'field' => 'message',
                'label' => 'message',
                'rules' => 'required|xss_clean',
                'errors' => array(
                    'required' => 'Please enter Message'
                )
            ),
            array(
                'field' => 'service',
                'label' => 'service',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Please enter Service'
                )
            )
        );

        $this->form_validation->set_rules($config1);

        $this->email->message($body);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
        } else {

            if ($this->email->send()) {

                $this->session->set_flashdata('message', 'Application Sended');
            } else {
                $this->session->set_flashdata('message', 'There is an error in email send');
                //	redirect('sendemail');
            }
            $this->load->view('sendemail');
        }
    }

}

?>
