XeroPHP
-----------------------

[![Build Status](https://travis-ci.org/calcinai/xero-php.svg?branch=master)](https://travis-ci.org/calcinai/xero-php)
[![Latest Stable Version](https://poser.pugx.org/calcinai/xero-php/v/stable)](https://packagist.org/packages/calcinai/xero-php)
[![Total Downloads](https://poser.pugx.org/calcinai/xero-php/downloads)](https://packagist.org/packages/calcinai/xero-php)

A client library for the [Xero API](<http://developer.xero.com>), including an OAuth interface and ORM-like abstraction.
 
This is loosely based on the functional flow of XeroAPI/XeroOAuth-PHP, but is split logically into more of an OO design.

This library has been tested with Private, Public and Partner applications.

### Model Generation

All the models were historically generated from the Xero developer docs. This has become too hard to maintain, as there is some key data missing in some cases. If you spot something wrong, feel free to make a PR.

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
