<?php

require_once '/var/www/html/back-end-ta.local/public_html/bin/external.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PaymentUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran_user');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('payment_user/index');
        $this->load->view('template/footer');
    }

    public function read()
    {
        $data['data']=$this->M_pembayaran_user->get_all();

        $this->load->view('template/header');
        $this->load->view('payment_user/read', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $row = $this->M_pembayaran_user->get_by_id($id);
        $data = [];
        if ($row) {
            $data = [
                'id' => $row->id,
                'email' => $row->email,
                'level' => $row->level,
                'payment_status' => $row->payment_status,
                'total_payment' => $row->total_payment
            ];
        }
        $this->load->view('template/header');
        $this->load->view('payment_user/detail', $data);
        $this->load->view('template/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
//            $this->create();
        } else {

            $data["data"] = array(
                'email' => $this->input->post('email',TRUE),
                'level' => $this->input->post('user_level',TRUE),
                'payment_status' => $this->input->post('payment_status',TRUE),
                'total_payment' => $this->input->post('total_payment',TRUE),
            );

            if (is_int($this->M_pembayaran_user->insert($data))) {
                if ($this->input->post('payment_status',TRUE) == 'paid') {
                    $findUserByEmail = \Pimcore\Model\DataObject\User::getByEmail($this->input->post('email',TRUE), 1);
                    if ($findUserByEmail) {
                        $findLevelByLevelKey = \Pimcore\Model\DataObject\UserLevel::getByLevelKey($this->input->post('user_level',TRUE), 1);
                        if ($findLevelByLevelKey) {
                            $findUserByEmail->setLevel($findLevelByLevelKey);
                            $findUserByEmail->save();
                        }
                    }

                }
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('PaymentUser'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('user_level', 'user_level', 'trim|required');
        $this->form_validation->set_rules('payment_status', 'payment_status', 'trim|required');
        $this->form_validation->set_rules('total_payment', 'total_payment', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}