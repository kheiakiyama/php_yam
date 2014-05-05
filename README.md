php_yam
=======

#About

php_yam is simple Yammer Api Client.

# How To Use?

```php
require 'yam.php';

$client = new Yammer($access_token);
$messages = $client->all_messages(array(
	'threaded' => true,
        'limit' => 10
));
var_dump($messages);
```

# What's AccessToken?
https://developer.yammer.com/authentication/
