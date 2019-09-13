XeroPHP
-----------------------

[![Build Status](https://travis-ci.org/calcinai/xero-php.svg?branch=master)](https://travis-ci.org/calcinai/xero-php)
[![Latest Stable Version](https://poser.pugx.org/calcinai/xero-php/v/stable)](https://packagist.org/packages/calcinai/xero-php)
[![Total Downloads](https://poser.pugx.org/calcinai/xero-php/downloads)](https://packagist.org/packages/calcinai/xero-php)

A client library for the [Xero API](<http://developer.xero.com>), including an OAuth interface and ORM-like abstraction.

This is loosely based on the functional flow of XeroAPI/XeroOAuth-PHP, but is split logically into more of an OO design.

This library has been tested with Private, Public and Partner applications.

## Requirements
* PHP 5.5+
* php\_curl extension - ensure a recent version (7.30+)
* php\_openssl extension

## Setup

Using composer:

```bash
composer require calcinai/xero-php
```

Otherwise just download the package and add it to your autoloader.  Namespaces are PSR-4 compliant.

## Usage

All the examples below refer to models in the `XeroPHP\Models\Accounting` namespace. Additionally, there are models for `PayrollAU`, `PayrollUS`, `Files`, and `Assets`

Create a XeroPHP instance (sample config included):

```php
$xero = new \XeroPHP\Application\PrivateApplication($config);
```

Load a collection of objects and loop through them
```php
$contacts = $xero->load(Contact::class)->execute();

foreach ($contacts as $contact) {
    print_r($contact);
}
```

Load collection of objects, for a single page, and loop through them [(Why?)](<https://developer.xero.com/documentation/auth-and-limits/xero-api-limits#Systemlimits>)
```php
$contacts = $xero->load(Contact::class)->page(1)->execute();

foreach ($contacts as $contact) {
    print_r($contact);
}
```

Search for objects meeting certain criteria
```php
$xero->load(Invoice::class)
    ->where('Status', Invoice::INVOICE_STATUS_AUTHORISED)
    ->where('Type', Invoice::INVOICE_TYPE_ACCREC)
    ->execute();
```

Load something by its GUID
```php
$contact = $xero->loadByGUID(Contact::class, $guid);
```

Or create & populate it
```php
$contact = new Contact($xero);

$contact->setName('Test Contact')
    ->setFirstName('Test')
    ->setLastName('Contact')
    ->setEmailAddress('test@example.com');
```

Save it
```php
$contact->save();
```

If you have created a number of objects of the same type, you can save them all in a batch by passing an array to ```$xero->saveAll()```.

From v1.2.0+, Xero context can be injected directly when creating the objects themselves, which then exposes the ```->save()``` method.  This is necessary for the objects to maintain state with their relations.

Saving related models

If you are saving several models at once, by default additional model attributes are not updated. This means if you are saving an invoice with a new contact, the contacts `ContactID` is not updated. If you want the related models attributes to be updated you can pass a boolean flag with `true` to the save method.

```php
$xero->save($invoice, true);
```

Nested objects
```php
$invoice = $xero->loadByGUID(Invoice::class, '[GUID]');
$invoice->setContact($contact);
```

Attachments
```php
$attachments = $invoice->getAttachments();
foreach ($attachment as $attachment) {
    //Do something with them
    file_put_contents($attachment->getFileName(), $attachment->getContent());
}

//You can also upload attachemnts
$attachment = Attachment::createFromLocalFile('/path/to/image.jpg');
$invoice->addAttachment($attachment);
```

To set the `IncludeOnline` flag on the attachment, pass `true` as the second parameter for `->addAttachment()`.

PDF - Models that support PDF export will inherit a ```->getPDF()``` method, which returns the raw content of the PDF.  Currently this is limited to Invoices and CreditNotes.

Refer to the [examples](examples) for more complex usage and nested/related objects.  There's also [a sample PHP app](https://github.com/XeroAPI/xero-php-sample-app) using this library.

## Webhooks

If you are receiving webhooks from Xero there is `Webhook` class that can help with handling the request and parsing the associated event list.

```php
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

To ensure the webhooks are coming from Xero you should validate the incoming request header that Xero provides.

```php
if (! $webhook->validate($request->headers->get('x-xero-signature'))) {
    throw new Exception('This request did not come from Xero');
}
```

See: [Signature documentation](https://developer.xero.com/documentation/webhooks/configuring-your-server#intent)

## Handling Errors

Your request to Xero may cause an error which you will want to handle. You might run into errors such as:

- `HTTP 400 Bad Request` by sending invalid data, like a malformed email address.
- `HTTP 503 Rate Limit Exceeded` by hitting the API to quickly in a short period of time.
- `HTTP 400 Bad Request` by requesting a resource that does not exist.

These are just a couple of examples and you should read the official documentation to find out more about the possible errors.

### Thrown exceptions

This library will parse the response Xero returns and throw an exception when it hits one of these errors. Below is a table showing the response code and corresponding exception that is thrown:

| HTTP Code | Exception |
| --------- | ------------- |
| 400 Bad Request | `\XeroPHP\Remote\Exception\BadRequestException` |
| 401 Unauthorized | `\XeroPHP\Remote\Exception\UnauthorizedException` |
| 403 Forbidden | `\XeroPHP\Remote\Exception\ForbiddenException` |
| 403 ReportPermissionMissingException | `\XeroPHP\Remote\Exception\ReportPermissionMissingException` |
| 404 Not Found | `\XeroPHP\Remote\Exception\NotFoundException` |
| 500 Internal Error | `\XeroPHP\Remote\Exception\InternalErrorException` |
| 501 Not Implemented | `\XeroPHP\Remote\Exception\NotImplementedException` |
| 503 Rate Limit Exceeded | `\XeroPHP\Remote\Exception\RateLimitExceededException` |
| 503 Not Available | `\XeroPHP\Remote\Exception\NotAvailableException` |
| 503 Organisation offline | `\XeroPHP\Remote\Exception\OrganisationOfflineException` |

See: [Response codes and errors documentation](https://developer.xero.com/documentation/api/http-response-codes)

### Handling exceptions

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