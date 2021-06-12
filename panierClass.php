<?php 

class panier{

	private $DB;

	public function __construct($DB) {

		if (!isset($_SESSION)) {
			session_start();
		}

		if (!isset($_SESSION['panier'])) {
			$_SESSION['panier'] = array();
		}

		$this->DB = $DB;

	}

	public function count() {
		return array_sum($_SESSION['panier']);
	}

	public function add($produit_id) {
		if (isset($_SESSION['panier'][$produit_id])) {
			$_SESSION['panier'][$produit_id]++;
		}else{
			$_SESSION['panier'][$produit_id] = 1;
		}
	}

	public function del($product_id) {
		unset($_SESSION['panier'][$produit_id]);
	}

	public function total() {
		$total = 0;
		$mesId = array_keys($_SESSION['panier']);
		if (empty($mesId)) {
			$products = array(); 
		}else{
			$products = $this->DB->query('SELECT id, price FROM produits WHERE id IN ('.implode(',', $mesId).')');
		}
		foreach ($products as $product) {
			$total += $product->price * $_SESSION['panier'][$produit_id];
		}
		return $total;
	}
}

?>