### Alpha Release

This project is currently in development. It is strongly advised that you do not use it in production.

### Introduction

This repository contains a PHP SDK that provides access to the [MailChimp API][] (version 1.3).
The SDK conforms to the [PSR-0 standard][] for autoloading interoperability and requires PHP >= 5.3.0.
Unless otherwise stated, all components of the SDK are licensed under the [MIT License][].

### Requirements

* PHP >= 5.3.0
* [PHP JSON][]
* [PHP OpenSSL][] (If you wish to make API calls over HTTPS)
* [PHP cURL][] (\MailChimp\Client\Curl)
* [allow_url_fopen][] (\MailChimp\Client\Stream)

### Known Issues

None at this time

### Usage & Examples

Please see the [examples provided][].

[MailChimp API]: http://apidocs.mailchimp.com/api/1.3/
[PSR-0 standard]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
[MIT License]: https://github.com/BenTheDesigner/MailChimp/blob/master/mit-license.md
[PHP OpenSSL]: http://php.net/manual/en/book.openssl.php
[PHP cURL]: http://www.php.net/manual/en/book.curl.php
[allow_url_fopen]: http://php.net/manual/en/filesystem.configuration.php
[examples provided]: https://github.com/BenTheDesigner/MailChimp/tree/master/Examples