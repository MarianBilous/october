<?php namespace Acme\Blog\Components;

use Cms\Classes\ComponentBase;
use Validator;
use ValidationException;

class Captcha extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Captcha Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onGetResponse()
    {
        traceLog(post('g-recaptcha-response'));

        $data = array(
            'secret'   => '6Lc3ZHgaAAAAAM1BXhjnZ9sXyZ0nDF191AvKEYtL',
            'response' => post('g-recaptcha-response'),
        );

        $result = '';

        try {
            $verify = curl_init();
            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($verify, CURLOPT_POST, true);
            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($verify);
            $result = json_decode($response)->success;
            
        } catch (\Exception $e) {
            $result = false;
        }

        traceLog($result);
    }
}
