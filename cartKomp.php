<?php
// A collection of sample products
$products = json_decode('[
    {"id":200,"name":"Lenovo V130-15IKB","image":{"source":"./pics/komputery/v130.jpg","width":300,"height":230},"colors":{"dark":"Ciemny","black":"Czarny"},"price":"2399.00"},
    {"id":201,"name":"Asus ZenBook BX410UA","image":{"source":"./pics/komputery/asuszenbook.jpg","width":350,"height":230},"colors":{"silver":"Srebrny"},"price":"3399.00"},
    {"id":202,"name":"Dell Inspiron 15 ","image":{"source":"./pics/komputery/dellinspiron15.jpg","width":320,"height":230},"colors":{"dark":"Ciemny"},"price":"1589.00"},
    {"id":203,"name":"HP 250 G7","image":{"source":"./pics/komputery/hp250.jpg","width":350,"height":230},"colors":{"silver":"Silver"},"price":"1777.00"},
    {"id":204,"name":"MSI GL75","image":{"source":"./pics/komputery/msigl75.jpg","width":350,"height":230},"colors":{"red":"Czerwony"},"price":"4799.00"},
    {"id":205,"name":"Lenovo Y540-15IRH","image":{"source":"./pics/komputery/y540.jpg","width":340,"height":230},"colors":{"black":"Czarny"},"price":"3499.00"}]');
$colors = [
	'black'      => 'Black',
	'space-gray' => 'Space Gray',
	'jet-black'  => 'Jet Black',
	'silver'     => 'Silver',
	'gold'       => 'Gold',
	'rose-gold'  => 'Rose Gold',
	'dark'		 => 'Ciemny',
	'red'		 => 'Czerwony',
];
// Page
$a = (isset($_GET['a'])) ? $_GET['a'] : 'home';
require_once 'class.Cart.php';
// Initialize cart object
$cart = new Cart([
	// Maximum item can added to cart, 0 = Unlimited
	'cartMaxItem' => 0,
	// Maximum quantity of a item can be added to cart, 0 = Unlimited
	'itemMaxQuantity' => 5,
	// Do not use cookie, cart items will gone after browser closed
	'useCookie' => false,
]);
// Shopping Cart Page
if ($a == 'cart') {
	$cartContents = '
	<div class="alert alert-warning">
		<i class="fa fa-info-circle"></i> Pusty koszyk.
	</div>';
	// Empty the cart
	if (isset($_POST['empty'])) {
		$cart->clear();
	}
	// Add item
	if (isset($_POST['add'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}
		$cart->add($product->id, $_POST['qty'], [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}
	// Update item
	if (isset($_POST['update'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}
		$cart->update($product->id, $_POST['qty'], [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}
	// Remove item
	if (isset($_POST['remove'])) {
		foreach ($products as $product) {
			if ($_POST['id'] == $product->id) {
				break;
			}
		}
		$cart->remove($product->id, [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
	}
	if (!$cart->isEmpty()) {
		$allItems = $cart->getItems();
		$cartContents = '
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="col-md-7">Product</th>
					<th class="col-md-3 text-center">Quantity</th>
					<th class="col-md-2 text-right">Price</th>
				</tr>
			</thead>
			<tbody>';
		foreach ($allItems as $id => $items) {
			foreach ($items as $item) {
				foreach ($products as $product) {
					if ($id == $product->id) {
						break;
					}
				}
				$cartContents .= '
				<tr>
					<td>' . $product->name . ((isset($item['attributes']['color'])) ? ('<p><strong>Color: </strong>' . $colors[$item['attributes']['color']] . '</p>') : '') . '</td>
					<td class="text-center"><div class="form-group"><input type="number" value="' . $item['quantity'] . '" class="form-control quantity pull-left" style="width:100px"><div class="pull-right"><button class="btn btn-default btn-update" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-refresh"></i> Odśwież</button><button class="btn btn-danger btn-remove" data-id="' . $id . '" data-color="' . ((isset($item['attributes']['color'])) ? $item['attributes']['color'] : '') . '"><i class="fa fa-trash"></i></button></div></div></td>
					<td class="text-right">$' . $item['attributes']['price'] . '</td>
				</tr>';
			}
		}
		$cartContents .= '
			</tbody>
		</table>
		<div class="text-right">
			<h3>Wartość:<br />' . number_format($cart->getAttributeTotal('price'), 2, '.', ',' ) . ' zł</h3>
		</div>
		<p>
			<div class="pull-left">
				<button class="btn btn-danger btn-empty-cart">Wyczyść koszyk</button>
			</div>
			<div class="pull-right text-right">
				<a href="?a=home" class="btn btn-default">Kontynuuj zakupy</a>
				<a href="?a=checkout" class="btn btn-danger">Do kasy</a>
			</div>
		</p>';
	}
}
?>