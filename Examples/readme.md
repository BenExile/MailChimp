## Configuration

The instructions below describes how to configure [bootstrap.php][] to enable you to run the examples provided in each of the API category folders.

#### Setting Your API Key

If you haven't already, you'll need log into your MailChimp account and [add an API key][]. The generated API key should be an MD5 hash, followed by a hyphen and one of the MailChimp datacenters i.e. 525e1457a8e5c1226d3c4d25caa7758f-us1.

Once you have generated an API key, you can replace the [placeholder][] in bootstrap.php

#### Selecting a HTTP client adapter

This library provides 2 client adapters, [cURL][] and [Stream][]. These are interchangeable and provide the same functionality via different mechanisms. Select the adapter most appropriate to you (i.e. If you don't have cURL installed, use Stream).

This library makes calls over HTTPS by default where possible (OpenSSL is enabled). If you require that your application ONLY makes calls via a secure connection, set [$sslOnly][] to true. Where SSL-only mode is enabled and OpenSSL is not, a \MailChimp\Exception will be thrown.


Next, create your HTTP client ([$client][]):

```
// Use the cURL adapter
$client = new \MailChimp\Client\Curl($apiKey, $sslOnly);

// Use the Stream adapter
$client = new \MailChimp\Client\Stream($apiKey, $sslOnly);
```

#### Instantiate the MailChimp API

This bit is easy. Create an instance of the MailChimp API object ([$mailchimp][]) and pass it the HTTP client:

```
$mailchimp = new \MailChimp\API($client);
```

#### Done!

You can now run the examples :)

## Method Managers

Managers handle the separation of API methods into the [categories][] specified by MailChimp.

#### Calling API Methods

To access the methods provided by a manager you need to request the manager, by name, from the manager factory (\MailChimp\API\getManager()).

```
// Get the Helper manager
$helperManager = $mailchimp->getManager('Helper');
```

Once you have the manager instance, you can call the API methods it provides.

```
// Ping the MailChimp API server
echo $helperManager->ping();
```

[bootstrap.php]: https://github.com/BenTheDesigner/MailChimp/blob/master/Examples/bootstrap.php
[add an API key]: https://admin.mailchimp.com/account/api/
[placeholder]: https://github.com/BenTheDesigner/MailChimp/blob/master/Examples/bootstrap.php#L24
[cURL]: https://github.com/BenTheDesigner/MailChimp/blob/master/MailChimp/Client/Curl.php
[Stream]: https://github.com/BenTheDesigner/MailChimp/blob/master/MailChimp/Client/Stream.php
[$sslOnly]: https://github.com/BenTheDesigner/MailChimp/blob/master/Examples/bootstrap.php#L26
[$client]: https://github.com/BenTheDesigner/MailChimp/blob/master/Examples/bootstrap.php#L27
[$mailchimp]: https://github.com/BenTheDesigner/MailChimp/blob/master/Examples/bootstrap.php#L29
[categories]: http://apidocs.mailchimp.com/api/1.3/#method-&-error-code-docs
