<?php

class Cart extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {

        $this->data += array(
            'temp' => 'site/cart/index',
            'title'=>'Trang giỏ hàng 4MENSHOP Thương hiệu thời trang nam giá rẻ',
            'cart' => $this->cart->contents(),
            'total' => $this->cart->total()
        );
        $this->load->view('site/shared/layout', $this->data);
    }

    function add($id, $qty = 1) {
        $this->load->model('product_model');

        $product = $this->product_model->get_info($id);
        $cart = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $product->Price,
            'name' => $product->ProductName,
            'option' => array(
                'image' => $product->Image
            )
        );
        $this->cart->insert($cart);
        redirect(base_url('gio-hang.html'));
    }

    public function update($id, $qty) {
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value) {
            if ($value['id'] == $id) {
                $data = array(
                    'rowid' => $key,
                    'qty' => $qty
                );
                //cap nhat lai gio hang
                $this->cart->update($data);
                break;
            }
        }
    }

    function update_ajax() {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        echo format_price($qty * $price);
        $this->update($id, $qty);
    }
   public function load_cart_total() {
        echo format_price($this->cart->total());
    }
    public function delete($id) {
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value) {
            if ($value['id'] == $id) {
                $data = array(
                    'rowid' => $key,
                    'qty' => 0,
                );
                $this->cart->update($data);
                break;
            }
        }
        redirect(base_url('cart'));
    }

}
?>

