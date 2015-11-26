XeroPHP
-----------------------

[![Build Status](https://travis-ci.org/calcinai/xero-php.svg?branch=master)](https://travis-ci.org/calcinai/xero-php)

A client implementation of the [Xero API](<http://developer.xero.com>), with a cleaner OAuth interface and ORM-like abstraction.

## Background

I hate reinventing the wheel, but this was written out of desperation. I wasn't comfortable putting the implementation that's recommended by Xero in to production, even after persisting with extending it.

This is loosely based on the functional flow of XeroAPI/XeroOAuth-PHP, but is split logically into more of an OO design.

## Main changes
* Variables are named clearly and only defined if actually used
* Methods are only defined in one place
* Project is split into useful components rather than one massive class
* Organised methods so it's more clear what's going on and how to debug
* More robust implementation of signing methods
* Removal of countless semantic issues

This library has been tested with Private, Public and Partner apps but is still a WIP, I'd love contributions/fixes from anyone that is keen to join the cause!

### Model Generation

Any files in the XeroPHP/Models directory are system generated.  Ideally, these shouldn't be modified directly, as it will be difficult to track/update.  Instead, if you notice something wrong with them, have a look at the ```generate/``` folder.  This contains the generation code, which actually just scrapes <http://developer.xero.com/documentation/> and parses out model/property/relation information.

## Requirements
* PHP 5.4+
* php\_curl extension - ensure a recent version (7.30+)
* php\_openssl extension

## Setup

Using composer:

```json
  "require": {
  	"calcinai/xero-php": "1.2.*"
  }
```

Otherwise just download the package and add it to your autoloader.  Namespaces are PSR-4 compliant.

## Usage

Create a XeroPHP instance (sample config included):

```php
$xero = new \XeroPHP\Application\PrivateApplication($config);
```

Load a collection of objects and loop through them
```php
$contacts = $xero->load('Accounting\\Contact')->execute();
foreach ($contacts as $contact) {
    print_r($contact);
}
```

Load collection of objects, for a single page, and loop through them [(Why?)](<http://developer.xero.com/documentation/getting-started/xero-api-limits/#title10>)
```php
$contacts = $xero->load('Accounting\\Contact')->page(1)->execute();
foreach ($contacts as $contact) {
    print_r($contact);
}
```

Search for objects meeting certain criteria
```php
$xero->load('Accounting\\Invoices')
	->where('Status', \XeroPHP\Models\Accounting\Invoice::INVOICE_STATUS_AUTHORISED)
	->where('Type', \XeroPHP\Models\Accounting\Invoice::INVOICE_TYPE_ACCREC)
	->execute();
```
or
```php
$xero->load('Accounting\\Invoices')->where('
	Status=="' . \XeroPHP\Models\Accounting\Invoice::INVOICE_STATUS_AUTHORISED . '" AND
	Type=="' . \XeroPHP\Models\Accounting\Invoice::INVOICE_TYPE_ACCREC . '"
')->execute();
```

Load something by its GUID
```php
$contact = $xero->loadByGUID('Accounting\\Contact', [GUID]);
```

Or create & populate it
```php
$contact = new \XeroPHP\Models\Accounting\Contact($xero);
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
$invoice = $xero->loadByGUID('Accounting\\Invoice', '[GUID]');
$invoice->setContact($contact);
```

Attachments
```php
$attachments = $invoice->getAttachments();
foreach($attachment as $attachment){
	//Do something with them
    file_put_contents($attachment->getFileName(), $attachment->getContent());
}

//You can also upload attachemnts
$attachment = \XeroPHP\Models\Accounting\Attachment::createFromLocalFile('/path/to/image.jpg');
$invoice->addAttachment($attachment);
```

PDF - Models that support PDF export will inherit a ```->getPDF()``` method, which returns the raw content of the PDF.  Currently this is limited to Invoices and CreditNotes.

Refer to the [examples](examples) for more complex usage and nested/related objects.
