<?php
// require "header.php";
require "class.php";
$json = array('error' => true);
if(isset($_GET['id'])){
    $product = $DB->query('SELECT id FROM produits WHERE id = :id', array('id'  => $_GET['id']));
    if(empty($product)){
        $json['message'] = "Ce produit n'éxiste pas !";
    }
    $panier->add($product[0]->id);
    $json['error'] = false;
    $json['total'] = $panier->total();
    $json['taille'] = $panier->count();
    $json['message'] = 'Le produit a été bien ajouté !';
}else{
    $json['message'] = "Vous n'avez pas ajouter de produit au panier !";
}
echo json_encode($json);
?>
<?php //require "footer.php"; ?> 