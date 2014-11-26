XeroPHP
-----------------------
A client implementation of the Xero API (<http://developer.xero.com>), with a cleaner OAuth interface and ORM-like abstraction.


## Background

I hate reinventing the wheel, but this was written out of desperation, as I wasn't comfortable putting the implementation that's recommended by Xero in to production, even after persisting with extending it.

This is loosely based on the functional flow of XeroAPI/XeroOAuth-PHP, but is split logically into more of an OO design.  I initially 

## Main changes
* Variables are named clearly and only defined if actually used
* Methods are only defined in one place
* Project is split into useful components rather than one massive class
* Organised methods so it's more clear what's going on and how to debug
* More robust implementation of signing methods
* Removal of countless semantic issues


This library is still a WIP, I'd love contributions/fixes from anyone that is keen to join the cause!


## Requirements
* PHP 5.3+
* php\_curl extension - ensure a recent version (7.30+)
* php\_openssl extension


## Setup

To follow.

## Usage

To follow.
