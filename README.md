XeroPHP
-----------------------

[![Build Status](https://travis-ci.org/calcinai/xero-php.svg?branch=master)](https://travis-ci.org/calcinai/xero-php)
[![Latest Stable Version](https://poser.pugx.org/calcinai/xero-php/v/stable)](https://packagist.org/packages/calcinai/xero-php)
[![Total Downloads](https://poser.pugx.org/calcinai/xero-php/downloads)](https://packagist.org/packages/calcinai/xero-php)

A client library for the [Xero API](<http://developer.xero.com>), wrapping Guzzle and ORM-like models.

This library was developed for the traditional Private, Public and Partner applications, but is now based on OAuth 2 scopes.

## Requirements
* PHP 5.6+

## Setup

Using composer:

```bash
composer require calcinai/xero-php
```

## Migration from 1.x/OAuth 1a

There is now only one flow for all applications, which is most similar to the legacy _Public_ application.  All applications now require the
OAuth 2 authorisation flow and specific organisations to be authorised at runtime, rather than creating certificates during app creation.

As there is now only one type of application, you now create a generic `XeroPHP\Application` with your access token and tenantId, from this 
point onward, all your code should remain the same.

## Usage

Before resource requests can be made, the application must be authorised.  The authorisation flow will give you an access token and a 
refresh token.  The access token can be used to retrieve a list of tenants (Xero organisations) which the app is authorised to query, then,
in conjunction with the desired tenantId, you can instantiate a `XeroPHP\Application` to query the API relating to a specific organisation.

For applications that require long-lived access to organisations, the refresh flow will need to be built in to catch and expired access 
token and refresh it.


### Authorization Code Flow

Usage is the same as The League's OAuth client, using `\Calcinai\OAuth2\Client\Provider\Xero` as the provider.

```php
session_start();
 
$provider = new \Calcinai\OAuth2\Client\Provider\Xero([
    'clientId'          => '{xero-client-id}',
    'clientSecret'      => '{xero-client-secret}',
    'redirectUri'       => 'https://example.com/callback-url',
]);
 
if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    // Additional scopes may be required depending on your application
    // additional common scopes are:
    // Add/edit contacts: accounting.contacts
    // Add/edit attachments accounting.attachments
    // Refresh tokens for non-interactive re-authorisation: offline_access
    // See all Xero Scopes https://developer.xero.com/documentation/guides/oauth2/scopes/
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => 'openid email profile accounting.transactions'
    ]);

    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);


    //If you added the openid/profile scopes you can access the authorizing user's identity.
    $identity = $provider->getResourceOwner($token);
    print_r($identity);

    //Get the tenants that this user is authorized to access
    $tenants = $provider->getTenants($token);
    print_r($tenants);
}
```

You can then store the token and use it to make requests against the api to the desired tenants


### Scopes
OAuth scopes, indicating which parts of the Xero organisation you'd like your app to be able to access. The complete list of scopes can be
found [here](https://developer.xero.com/documentation/oauth2/scopes).
 
 ```php
$authUrl = $provider->getAuthorizationUrl([
    'scope' => 'bankfeeds accounting.transactions'
]);
 ```
 
### Refreshing a token
```php
// Requires scope offline_access
$newAccessToken = $provider->getAccessToken('refresh_token', [
    'refresh_token' => $existingAccessToken->getRefreshToken()
]);
```

### Client credentials flow (custom connections)
You can utilise the client credentials grant type by creating a ["Custom Connection"](https://developer.xero.com/documentation/guides/oauth2/custom-connections/). Once you have your client credentials, usage is the same as The League's OAuth client. You can select your scopes when configuring your Custom Connection.

```php
$provider = new \Calcinai\OAuth2\Client\Provider\Xero([
    'clientId'          => '{xero-client-id}',
    'clientSecret'      => '{xero-client-secret}',
]);
$token = $provider->getAccessToken('client_credentials');
$tenants = $provider->getTenants($token);
```

## Interacting with the API

Once you've got a valid access token and tenantId, you can instantiate a `XeroPHP\Application`.  All the examples below refer to models 
in the `XeroPHP\Models\Accounting` namespace. Additionally, there are models for `PayrollAU`, `PayrollUS`, `Files`, and `Assets`.

Refer to the [examples](examples) for more complex usage and nested/related objects.

### Instantiate an Application
Create a XeroPHP instance (sample config included):
```php
$xero = new \XeroPHP\Application($accessToken, $tenantId);
```

### Load a collection
```php
$contacts = $xero->load(Contact::class)->execute();

foreach ($contacts as $contact) {
    print_r($contact);
}
```

### Load a collection with pagination
Load collection of objects, for a single page, and loop through them [(Why?)](<https://developer.xero.com/documentation/auth-and-limits/xero-api-limits#Systemlimits>)
```php
$contacts = $xero->load(Contact::class)->page(1)->execute();

foreach ($contacts as $contact) {
    print_r($contact);
}
```

### Load a collection with WHERE filtering
Search for objects meeting [certain criteria](https://developer.xero.com/documentation/api/invoices#optimised-parameters)
```php
$xero->load(Invoice::class)
    ->where('Status', Invoice::INVOICE_STATUS_AUTHORISED)
    ->where('Type', Invoice::INVOICE_TYPE_ACCREC)
    ->where('Date', 'DateTime(2020,11,25)')
    ->execute();

$xero->load(Invoice::class)
    ->where('Date >= DateTime(2020,11,25)')
    ->where('Date < DateTime(2020,12,25)')
    ->execute();
```

### Load a specific resource
Load resources by their GUID
```php
$contact = $xero->loadByGUID(Contact::class, $guid);
```

### Create a new resource
Populate resource parameters with their setters
```php
$contact = new Contact($xero);

$contact->setName('Test Contact')
    ->setFirstName('Test')
    ->setLastName('Contact')
    ->setEmailAddress('test@example.com');
```

### Saving resources
```php
// Requires scope accounting.contacts to add/edit contacts
$contact->save();
```

If you have created a number of objects of the same type, you can save them all in a batch by passing an array to ```$xero->saveAll()```.

From v1.2.0+, Xero context can be injected directly when creating the objects themselves, which then exposes the ```->save()``` method.  This is necessary for the objects to maintain state with their relations.

### Saving related models

If you are saving several models at once, by default additional model attributes are not updated. This means if you are saving an invoice with a new contact, the contacts `ContactID` is not updated. If you want the related models attributes to be updated you can pass a boolean flag with `true` to the save method.

```php
$invoice = $xero->loadByGUID(Invoice::class, '[GUID]');
$invoice->setContact($contact);
$xero->save($invoice, true);
```

### Attachments
```php
$attachments = $invoice->getAttachments();
foreach ($attachment as $attachment) {
    //Do something with them
    file_put_contents($attachment->getFileName(), $attachment->getContent());
}

//You can also upload attachemnts
// Requires scope accounting.attachments
$attachment = Attachment::createFromLocalFile('/path/to/image.jpg');
$invoice->addAttachment($attachment);
```

To set the `IncludeOnline` flag on the attachment, pass `true` as the second parameter for `->addAttachment()`.

### PDFs
Models that support PDF export will inherit a ```->getPDF()``` method, which returns the raw content of the PDF.  Currently this is limited to Invoices and CreditNotes.

### Unit price precision
The [unit price decimal place precision](https://developer.xero.com/documentation/api-guides/rounding-in-xero) (the `unitdp` parameter) is set via a config option:
```php
$xero->setConfigOption('xero', 'unitdp', 3);
```

## Practice Manager

If requiring the "practicemanager" scope please query models using the following syntax

```php
$clients = $xero->load(\XeroPHP\Models\PracticeManager\Client::class)
            ->setParameter('detailed', true)
            ->setParameter('modifiedsince', date('Y-m-d\TH:i:s', strtotime('- 1 week')))
            ->execute();

foreach ($clients as $client) {
    $name = $client->getName();
}
```

## Webhooks

If you are receiving webhooks from Xero there is `Webhook` class that can help with handling the request and parsing the associated event list.

```php
// Configure the webhook signing key on the application
$application->setConfig(['webhook' => ['signing_key' => 'xyz123']]);
$webhook = new Webhook($application, $request->getContent());

/**
 * @return int
 */
$webhook->getFirstEventSequence();

/**
 * @return int
 */
$webhook->getLastEventSequence();

/**
 * @return \XeroPHP\Webhook\Event[]
 */
$webhook->getEvents();
```

See: [Webhooks documentation](https://developer.xero.com/documentation/webhooks/overview)

### Validating Webhooks

To ensure the webhooks are coming from Xero you must validate the incoming request header that Xero provides.

```php
if (! $webhook->validate($request->headers->get('x-xero-signature'))) {
    throw new Exception('This request did not come from Xero');
}
```

See: [Signature documentation](https://developer.xero.com/documentation/webhooks/configuring-your-server#intent)

## Handling Errors

Your request to Xero may cause an error which you will want to handle. You might run into errors such as:

- `HTTP 400 Bad Request` by sending invalid data, like a malformed email address.
- `HTTP 429 Too Many Requests` by hitting the API to quickly in a short period of time.
- `HTTP 503 Rate Limit Exceeded` by hitting the API to quickly in a short period of time.
- `HTTP 400 Bad Request` by requesting a resource that does not exist.

These are just a couple of examples and you should read the official documentation to find out more about the possible errors.

### Rate Limit Exceptions

Xero returns header values indicating the number of calls remaining before reaching their API lmits.
https://developer.xero.com/documentation/guides/oauth2/limits/

The Application is updated following every request and you can track the number of requests remaining using the Application::getAppRateLimits() method. It returns an array with the following keys and associated integer values.

    'last-api-call' // The int timestamp of the last request made to the Xero API
    'app-min-limit-remaining' // The number of requests remaining for the application as a whole in the current minute. The normal limit is 10,000.
    'tenant-day-limit-remaining' // The number of requests remaining for the individual tenant by the day, limit is 5,000.
    'tenant-min-limit-remaining' // The number of requests remaining for the individual tenant by the minute, limit is 60.

These values can be used to decide if additional requests will throttled or sent to some message queue. For example:

``` php
    // If you know the number of API calls that you intend to make. 
    $myExpectedApiCalls = 50;

    // Before executing a statement, you could check the the rate limits.
    $tenantDailyLimitRemaining = $xero->getTenantDayLimitRemining();

    // If the expected number of API calls is higher than the number remaining for the tenant then do something.
    if($myExpectedApiCalls > tenantDailyLimitRemaining){
       // Send the calls to a queue for processing at another time
       // Or throttle the calls to suit your needs.
    }
```

If the Application exceeds the rate limits Xero will return an HTTP 429 Too Many Requests response. By default, this response is caught and thrown as a RateLimitException.

You can provide a more graceful method of dealing with HTTP 429 responses by using the Guzzle RetryMiddleware. You need to replace the transport client created when instantiating the Application. For example:

```php

// use GuzzleHttp\Client;
// use GuzzleHttp\HandlerStack;
// use GuzzleHttp\Middleware;
// use GuzzleHttp\RetryMiddleware;
// use Psr\Http\Message\RequestInterface;
// use Psr\Http\Message\ResponseInterface;

public function yourApplicationCreationMethod($accessToken, $tenantId): Application {

   // By default the contructor creates a Guzzle Client without any handlers. Pass a third argument 'false' to skip the general client constructor.
   $xero = new Application($accessToken, $tenantId, false);

   // Create a new handler stack
   $stack = HandlerStack::create();

   // Create the MiddleWare callable, in this case with a maximum limit of 5 retries.
   $stack->push($this->getRetryMiddleware(5));

   // Create a new Guzzle Client
   $transport = new Client([
       'headers' => [
           'User-Agent' => sprintf(Application::USER_AGENT_STRING, Helpers::getPackageVersion()),
           'Authorization' => sprintf('Bearer %s', $accessToken),
           'Xero-tenant-id' => $tenantId,
       ],
       'handler' => $stack
   ]);

   // Replace the default Client from the application constructor with our new Client using the RetryMiddleware
   $xero->setTransport($transport);

   return $xero

}

/**
 * Customise the RetryMiddeware to suit your needs. Perhaps creating log messages, or making decisions about when to retry or not.
 */
protected function getRetryMiddleware(int $maxRetries): callable
{
    $decider = function (
        int $retries,
        RequestInterface $request,
        ResponseInterface $response = null
    ) use (
        $maxRetries
    ): bool {
        return
            $retries < $maxRetries
            && null !== $response
            && \XeroPHP\Remote\Response::STATUS_TOO_MANY_REQUESTS === $response->getStatusCode();
    };

    $delay = function (int $retries, ResponseInterface $response): int {
        if (!$response->hasHeader('Retry-After')) {
            return RetryMiddleware::exponentialDelay($retries);
        }

        $retryAfter = $response->getHeaderLine('Retry-After');

        if (!is_numeric($retryAfter)) {
            $retryAfter = (new \DateTime($retryAfter))->getTimestamp() - time();
        }

        return (int)$retryAfter * 1000;
    };

    return Middleware::retry($decider, $delay);
}

```

### Thrown Exceptions

This library will parse the response Xero returns and throw an exception when it hits one of these errors. Below is a table showing the response code and corresponding exception that is thrown:

| HTTP Code | Exception |
| --------- | ------------- |
| 400 Bad Request | `\XeroPHP\Remote\Exception\BadRequestException` |
| 401 Unauthorized | `\XeroPHP\Remote\Exception\UnauthorizedException` |
| 403 Forbidden | `\XeroPHP\Remote\Exception\ForbiddenException` |
| 403 ReportPermissionMissingException | `\XeroPHP\Remote\Exception\ReportPermissionMissingException` |
| 404 Not Found | `\XeroPHP\Remote\Exception\NotFoundException` |
| 429 Too Many Requests | `\XeroPHP\Remote\Exception\RateLimitExceededException` |
| 500 Internal Error | `\XeroPHP\Remote\Exception\InternalErrorException` |
| 501 Not Implemented | `\XeroPHP\Remote\Exception\NotImplementedException` |
| 503 Rate Limit Exceeded | `\XeroPHP\Remote\Exception\RateLimitExceededException` |
| 503 Not Available | `\XeroPHP\Remote\Exception\NotAvailableException` |
| 503 Organisation offline | `\XeroPHP\Remote\Exception\OrganisationOfflineException` |

See: [Response codes and errors documentation](https://developer.xero.com/documentation/api/http-response-codes)

### Handling Exceptions

To catch and handle these exceptions you can wrap the request in a try / catch block and deal with each exception as needed.

```php
try {
    $xero->save($invoice);
} catch (NotFoundException $exception) {
    // handle not found error
} catch (RateLimitExceededException $exception) {
    // handle rate limit error
}
```

See: [Working with exceptions](https://secure.php.net/manual/en/language.exceptions.php)
