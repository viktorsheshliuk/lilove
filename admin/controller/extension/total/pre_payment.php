<?php

class ControllerExtensionTotalPrePayment extends Controller
{

    private $error = array();

    public function index()
    {
        $this->load->language('extension/total/pre_payment');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate())
        {
            // echo "<pre>";
            // var_dump($_POST);
            //exit();

            $this->model_setting_setting->editSetting('total_pre_payment', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $data['text_summ'] = $this->language->get('text_summ');
        $data['text_summ_help'] = $this->language->get('text_summ_help');

        $data['text_calc_method'] = $this->language->get('text_calc_method');
        $data['text_calc_method_help'] = $this->language->get('text_calc_method_help');

        $data['text_check_status'] = $this->language->get('text_check_status');
        $data['text_check_status_help'] = $this->language->get('text_check_status_help');
        
        $data['text_stock_status'] = $this->language->get('text_stock_status');
        $data['text_stock_status_help'] = $this->language->get('text_stock_status_help');

        $data['text_shipping_methods'] = $this->language->get('text_shipping_methods');
        $data['text_shipping_methods_help'] = $this->language->get('text_shipping_methods_help');

        $data['text_payment_methods'] = $this->language->get('text_payment_methods');
        $data['text_payment_methods_help'] = $this->language->get('text_payment_methods_help');

        $data['entry_calc_method_fixed'] = $this->language->get('entry_calc_method_fixed');
        $data['entry_calc_method_custom'] = $this->language->get('entry_calc_method_custom');

        $data['entry_shipping_prec'] = $this->language->get('entry_shipping_prec');
        $data['entry_coupon_prec'] = $this->language->get('entry_coupon_prec');
        $data['entry_subtotal_prec'] = $this->language->get('entry_subtotal_prec');
        $data['entry_reward_prec'] = $this->language->get('entry_reward_prec');
        $data['entry_total_prec'] = $this->language->get('entry_total_prec');

        $data['entry_from_summ'] = $this->language->get('entry_from_summ');
        $data['entry_to_summ'] = $this->language->get('entry_to_summ');

        $data['entry_description'] = $this->language->get('entry_description');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning']))
        {
            $data['error_warning'] = $this->error['warning'];
        } else
        {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/total/pre_payment', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/total/pre_payment', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=total', true);

        if (isset($this->request->post['total_pre_payment_status']))
            $data['total_pre_payment_status'] = $this->request->post['total_pre_payment_status'];
        else
            $data['total_pre_payment_status'] = $this->config->get('total_pre_payment_status');


        if (isset($this->request->post['total_pre_payment_sort_order']))
            $data['total_pre_payment_sort_order'] = $this->request->post['total_pre_payment_sort_order'];
        else if ($this->config->get('total_pre_payment_sort_order'))
            $data['total_pre_payment_sort_order'] = $this->config->get('total_pre_payment_sort_order');
        else
            $data['total_pre_payment_sort_order'] = 100;

        if (isset($this->request->post['total_pre_payment_from_summ']))
            $data['total_pre_payment_from_summ'] = $this->request->post['total_pre_payment_from_summ'];
        else
            $data['total_pre_payment_from_summ'] = $this->config->get('total_pre_payment_from_summ');

        if (isset($this->request->post['total_pre_payment_to_summ']))
            $data['total_pre_payment_to_summ'] = $this->request->post['total_pre_payment_to_summ'];
        else
            $data['total_pre_payment_to_summ'] = $this->config->get('total_pre_payment_to_summ');




        if (isset($this->request->post['total_pre_payment_calc_method']))
            $data['total_pre_payment_calc_method'] = $this->request->post['total_pre_payment_calc_method'];
        else if ($this->config->get('total_pre_payment_calc_method'))
            $data['total_pre_payment_calc_method'] = $this->config->get('total_pre_payment_calc_method');
        else
            $data['total_pre_payment_calc_method'] = 'fixed';


        if (isset($this->request->post['total_pre_payment_fixed_val']))
            $data['total_pre_payment_fixed_val'] = $this->request->post['total_pre_payment_fixed_val'];
        else
            $data['total_pre_payment_fixed_val'] = $this->config->get('total_pre_payment_fixed_val');



        if (isset($this->request->post['total_pre_payment_shipping_prec']))
            $data['total_pre_payment_shipping_prec'] = $this->request->post['total_pre_payment_shipping_prec'];
        else
            $data['total_pre_payment_shipping_prec'] = $this->config->get('total_pre_payment_shipping_prec');



        if (isset($this->request->post['total_pre_payment_coupon_prec']))
            $data['total_pre_payment_coupon_prec'] = $this->request->post['total_pre_payment_coupon_prec'];
        else
            $data['total_pre_payment_coupon_prec'] = $this->config->get('total_pre_payment_coupon_prec');


        if (isset($this->request->post['total_pre_payment_reward_prec']))
            $data['total_pre_payment_reward_prec'] = $this->request->post['total_pre_payment_reward_prec'];
        else
            $data['total_pre_payment_reward_prec'] = $this->config->get('total_pre_payment_reward_prec');


        if (isset($this->request->post['total_pre_payment_subtotal_prec']))
            $data['total_pre_payment_subtotal_prec'] = $this->request->post['total_pre_payment_subtotal_prec'];
        else
            $data['total_pre_payment_subtotal_prec'] = $this->config->get('total_pre_payment_subtotal_prec');


        if (isset($this->request->post['total_pre_payment_total_prec']))
            $data['total_pre_payment_total_prec'] = $this->request->post['total_pre_payment_total_prec'];
        else
            $data['total_pre_payment_total_prec'] = $this->config->get('total_pre_payment_total_prec');

            // Статусы
            if (isset($this->request->post['total_pre_payment_stock_status']))
            $data['total_pre_payment_stock_status'] = $this->request->post['total_pre_payment_stock_status'];
        else if ($this->config->get('total_pre_payment_stock_status'))
            $data['total_pre_payment_stock_status'] = $this->config->get('total_pre_payment_stock_status');
        else
            $data['total_pre_payment_stock_status'] = array();

        if (isset($this->request->post['total_pre_payment_shipping_method']))
            $data['total_pre_payment_shipping_method'] = $this->request->post['total_pre_payment_shipping_method'];
        else if ($this->config->get('total_pre_payment_shipping_method'))
            $data['total_pre_payment_shipping_method'] = $this->config->get('total_pre_payment_shipping_method');
        else
            $data['total_pre_payment_shipping_method'] = array();

        if (isset($this->request->post['total_pre_payment_payment_method']))
            $data['total_pre_payment_payment_method'] = $this->request->post['total_pre_payment_payment_method'];
        else if ($this->config->get('total_pre_payment_payment_method'))
            $data['total_pre_payment_payment_method'] = $this->config->get('total_pre_payment_payment_method');
        else
            $data['total_pre_payment_payment_method'] = array();

        if (isset($this->request->post['total_pre_payment_descr']))
            $data['total_pre_payment_descr'] = $this->request->post['total_pre_payment_descr'];
        else
            $data['total_pre_payment_descr'] = $this->config->get('total_pre_payment_descr');

            if (isset($this->request->post['total_pre_payment_descr_check']))
            $data['total_pre_payment_descr_check'] = $this->request->post['total_pre_payment_descr_check'];
        else
            $data['total_pre_payment_descr_check'] = $this->config->get('total_pre_payment_descr_check');
            
        // Статусы

        $this->load->model('extension/total/pre_payment');

        // Получам все статусы товаров
        $all_stock_status = $this->model_extension_total_pre_payment->getAllStockStatus(); 

        foreach ($all_stock_status as $stock_status) 
        {
            $data['stock_status'][] = array(
                'name' => $stock_status['name'],
                'code' => $stock_status['stock_status_id'] . '_' . $stock_status['stock_status_id'],
                'status' => $this->config->get('total_pre_payment_stock_status') ? 'text_enabled' : 'text_disabled',
            );
        }  
        // Статусы END


        $files = glob(DIR_APPLICATION . 'controller/{extension/shipping,shipping}/*.php', GLOB_BRACE);
        if ($files)
        {
            foreach ($files as $file)
            {
                $extension = basename($file, '.php');


                $this->load->language('extension/shipping/' . $extension);
//Новая почта объединяет 3 вида доставки в 1 и из-за этого не срабатывает проверка на проверку выбранного метода доставки (код метода доставки)
                if (($this->language->get('heading_title') == 'Новая почта API')||($this->language->get('heading_title') == 'Нова пошта API')){
                    $data['shipping_methods'][] = array(
                        'name' => 'Новая почта курьер',
                        'code' => 'novaposhta.doors',
                        'status' => $this->config->get($extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                    );
                     $data['shipping_methods'][] = array(
                        'name' => 'Новая почта на отделение',
                        'code' => 'novaposhta.department',
                        'status' => $this->config->get($extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                    );
                     $data['shipping_methods'][] = array(
                        'name' => 'Новая почта на почтомат',
                        'code' => 'novaposhta.poshtomat',
                        'status' => $this->config->get($extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                    ); 
                } else {    
                    $data['shipping_methods'][] = array(
                        'name' => $this->language->get('heading_title'),
                        'code' => $extension . '.' . $extension,
                        'status' => $this->config->get($extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                    );
                }
            }
        }

        $files = glob(DIR_APPLICATION . 'controller/{extension/payment,payment}/*.php', GLOB_BRACE);
        if ($files)
        {
            foreach ($files as $file)
            {
                $extension = basename($file, '.php');
                $this->load->language('extension/payment/' . $extension);

                $data['payment_methods'][] = array(
                    'name' => $this->language->get('heading_title'),
                    'code' => $extension,
                    'status' => $this->config->get($extension . '_status') ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
                );
            }
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/total/pre_payment', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/total/pre_payment'))
        {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        if ($this->request->post['total_pre_payment_calc_method'] != 'fixed' && $this->request->post['total_pre_payment_calc_method'] != 'custom_formule')
            $this->error['warning'] = $this->language->get('error_calc_method');

        return !$this->error;
    }

}