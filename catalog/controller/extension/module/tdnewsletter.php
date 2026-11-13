<?php
class ControllerExtensionModuleTdnewsletter extends Controller
{
    public function index()
    {
        $this->load->language('extension/module/tdnewsletter');
        $this->load->model('extension/module/tdnewsletter');

        $this->model_extension_module_tdnewsletter->createNewslettersubscribe();
        $data['heading_title'] = $this->language->get('heading_title');
        $data['subheading_title'] = $this->language->get('subheading_title');
		$data['newsletter_placeholder'] = $this->language->get('newsletter_placeholder');
        $data['email'] = $this->language->get('email');
        $data['subscribe'] = $this->language->get('subscribe');

        return $this->load->view('extension/module/tdnewsletter', $data);

    }

    public function jsonnewsletter()
    {
		$this->load->language('extension/module/tdnewsletter');
        $this->load->model('extension/module/tdnewsletter');
        $json = array();
        $json['messagestatus'] = $this->model_extension_module_tdnewsletter->NewsletterSubscribes($this->request->post);
        $data['text_success_already']   = $this->language->get('text_success_already');
        $data['text_success_add']        = $this->language->get('text_success_add');
        if ($json['messagestatus'] == 'Email Already Exist') {
            $json['fail'] = $data['text_success_already'];
        } else {
            $json['success'] = $data['text_success_add'];
        }
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

}
