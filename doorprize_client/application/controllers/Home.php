<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private $id;
	public function __construct()
	{
		parent::__construct();
		session_false();
		$this->load->model('point_model', 'point');
		$this->load->model('doorprize_model', 'doorprize');
		$this->load->model('gift_model', 'gift');
		$this->load->model('product_model', 'product');
		$this->load->model('transaction_model', 'transaction');
		$this->id = $this->data_session->get_session()['id'];
	}
	public function index()
	{
		$data = [
			'point' => $this->point->getWhere($this->id),
			'doorprizes' => $this->doorprize->get(),
			'doorprizeGrand' => $this->doorprize->getGrand()
		];
		$this->load->view('layout/header');
		$this->load->view('home/index', $data);
		$this->load->view('layout/footer');
	}
	public function doorprize()
	{
		$data['my_gift'] = $this->gift->getWhere($this->id);
		$this->load->view('layout/header');
		$this->load->view('layout/sidenav');
		$this->load->view('home/doorprize', $data);
		$this->load->view('layout/footer');
	}
	public function exchange($doorprize_id)
	{
		$insert = $this->gift->insert($doorprize_id, 2);
		if ($insert === false) {
			echo "<script>
			alert('Sorry your point not enough')
			window.location.href='" . base_url('home/index') . "'</script>";
		} else {
			$data['my_gift'] = $this->gift->getWhere($this->id);
			var_dump($data['my_gift']);
			die;
			$this->load->view('layout/header');
			$this->load->view('home/doorprize', $data);
			$this->load->view('layout/footer');
		}
	}
	public function logout()
	{
		$params = array('user_id');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
	public function product()
	{
		$products = $this->product->get();
		var_dump($products);
		die;
		$this->load->view('layout/header');
		$this->load->view('home/product', $products);
		$this->load->view('layout/footer');
	}
	public function transaction()
	{
		$data['transactions'] = $this->transaction->getWhere($this->id);
		$this->load->view('layout/header');
		$this->load->view('layout/sidenav');
		$this->load->view('home/transaction', $data);
		$this->load->view('layout/footer');
	}
}
