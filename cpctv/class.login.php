
<?php
require_once '../assets/vendor/autoload.php';
use GuzzleHttp\Client;
class Login
{
    public $form_url = 'http://forum.ngocrongonline.com/app/login.php';
    public $post_url = 'http://forum.ngocrongonline.com/app/index.php?do=login';
    public $nickname;
    public $avatar_url;
    public $dom;
	public $msg;

    public function __construct($username, $password, $server) {
        $client = new Client(['cookies' => true]);
        $response = $client->request('GET', $this->form_url);
        $token = trim($this->parseToken($response->getBody()));
        $response = $client->request('POST', $this->post_url, [
			'allow_redirects' => [
				'track_redirects' => true
			],
            'form_params' => [
                'user' => $username,
                'pass' => $password,
                'checkru' => $token,
                'server' => $server,
                'submit' => 'Đăng nhập',
            ],
            'headers' => [
                'Referer' => $this->post_url
            ]
        ]);
        $html = $response->getBody()->getContents();
        if ($response->getHeaderLine('X-Guzzle-Redirect-Status-History') == 302) {
            preg_match('#<b style=\"color:\#ad4105\">(.*?)<\/b>#', $html, $name);
            preg_match('#http://forum.ngocrongonline.com/avatar/(.*?).png#', $html, $avatar);
            $this->avatar_url = $avatar[0];
            $this->nickname = $name[1];
			$this->dom = $html;
        } else {
            if (preg_match('#không chính xác#', $html, $content)) {
                $this->msg = 'Tài khoản hoặc mật khẩu không chính xác';
            } else if (preg_match('#chọn máy chủ#', $html)) {
                $this->msg = 'Vui lòng chọn máy chủ để đăng acc';
            } else if (preg_match('#tạo nhân vật#', $html)) {
                $this->msg = 'Tài khoản này chưa tạo nhân vật';
            } else if (preg_match('#vi phạm nội quy#', $html)) {
                $this->msg = 'Tài khoản của bạn đang bị khóa';
            } else {
                $this->msg = 'Tài khoản của bạn đang bị khóa';
            }
        }
    }
    
    public function parseToken($content) {
        $doc = new \DOMDocument;
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);
        $xpath = new \DOMXPath($doc);
        $token = $xpath->query('//input[@name="checkru"]/@value')->item(0)->nodeValue;
        return $token;
    }
}