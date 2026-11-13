<?php
class ControllerExtensionModuleTdinstagram extends Controller {
    public function index() {
        static $module = 0;
        $this->load->language('extension/module/tdinstagram');
        $this->document->addScript('catalog/view/javascript/themedelights/instafeed.js');
        $data['heading_title'] = $this->language->get('heading_title');
        $data['module_tdinstagram_status']         = $this->config->get('module_tdinstagram_status');
        $data['module_tdinstagram_userid']         = $this->config->get('module_tdinstagram_userid');
        $data['module_tdinstagram_usertoken']      = $this->config->get('module_tdinstagram_usertoken');
        $data['module_tdinstagram_hashtag']        = $this->config->get('module_tdinstagram_hashtag');
        $data['module_tdinstagram_sort']           = $this->config->get('module_tdinstagram_sort');
        $data['module_tdinstagram_size']           = $this->config->get('module_tdinstagram_size');
        $data['module_tdinstagram_noofdisplayimg'] = $this->config->get('module_tdinstagram_noofdisplayimg');
        $data['module_tdinstagram_imglikes']       = $this->config->get('module_tdinstagram_imglikes');
        $data['module_tdinstagram_imgcomments']    = $this->config->get('module_tdinstagram_imgcomments');
        $data['module_tdinstagram_imgcaptions']    = $this->config->get('module_tdinstagram_imgcaptions');
        $data['module_tdinstagram_username']    = $this->config->get('module_tdinstagram_username');
        $data['module'] = $module++;
        return $this->load->view('extension/module/tdinstagram', $data);
    }
}
