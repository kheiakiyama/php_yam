<?php

class Yammer
{
	private $access_token;

	public function __construct($access_token) {
		$this->access_token = $access_token;
	}

	private function get($path, $options = array()) {
		$opts = array(
			'http' => array(
				'method' => 'GET',
				'Accept' => 'application/json',
				'User-Agent' => 'php yam',
				'header' => 'Authorization: Bearer ' . $this->access_token,
			)
		);
		$context = stream_context_create($opts);
		$url = 'https://www.yammer.com' . $path . '.json' . (count($options) > 0 ? '?' : '') . http_build_query($options);
		return json_decode(file_get_contents($url, false, $context), true);
	}

	public function get_user($id) {
		return $this->get('/api/v1/users/' . $id);
	}

	public function current_user() {
		return $this->get('/api/v1/users/current');
	}

	public function all_messages($options = array()) {
		return $this->get('/api/v1/messages', $options);
	}

	public function messages_in_thread($id, $options = array()) {
		return $this->get('/api/v1/messages/in_thread/' . $id, $options);
	}

	public function get_thread($id) {
		return $this->get('/api/v1/threads/' . $id);
	}
}

?>