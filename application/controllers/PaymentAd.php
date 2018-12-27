<?php

require_once '/var/www/html/back-end-ta.local/public_html/bin/external.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaymentAd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran_iklan');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('payment_ad/index');
        $this->load->view('template/footer');
    }

    public function read()
    {
        $data['data']=$this->M_pembayaran_iklan->get_all();

        $this->load->view('template/header');
        $this->load->view('payment_ad/read', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $row = $this->M_pembayaran_iklan->get_by_id($id);
        $data = [];
        if ($row) {
            $data = [
                'id' => $row->id,
                'publisher_name' => $row->publisher_name,
                'total_show' => $row->total_show,
                'payment_status' => $row->payment_status,
                'total_payment' => $row->total_payment
            ];
        }
        $this->load->view('template/header');
        $this->load->view('payment_ad/detail', $data);
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
//            $this->create();
        } else {

            $data["data"] = array(
                'publisher_name' => $this->input->post('publisher_name',TRUE),
                'total_show' => $this->input->post('total_show',TRUE),
                'payment_status' => $this->input->post('payment_status',TRUE),
                'total_payment' => $this->input->post('total_payment',TRUE),
            );

            if (is_int($this->M_pembayaran_iklan->insert($data))) {

            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('PaymentUser'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('publisher_name', 'publisher_name', 'trim|required');
        $this->form_validation->set_rules('total_show', 'total_show', 'trim|required');
        $this->form_validation->set_rules('payment_status', 'payment_status', 'trim|required');
        $this->form_validation->set_rules('total_payment', 'total_payment', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}