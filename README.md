# Silverstripe Locations

A Location DataObject for Silverstripe. Includes the ability to generate coordinates based on an address. 

![CI](https://github.com/dynamic/silverstripe-locations/workflows/CI/badge.svg)

[![Latest Stable Version](https://poser.pugx.org/dynamic/silverstripe-locations/v/stable)](https://packagist.org/packages/dynamic/silverstripe-locations)
[![Total Downloads](https://poser.pugx.org/dynamic/silverstripe-locations/downloads)](https://packagist.org/packages/dynamic/silverstripe-locations)
[![Latest Unstable Version](https://poser.pugx.org/dynamic/silverstripe-locations/v/unstable)](https://packagist.org/packages/dynamic/silverstripe-locations)
[![License](https://poser.pugx.org/dynamic/silverstripe-locations/license)](https://packagist.org/packages/dynamic/silverstripe-locations)

## Requirements

* dynamic/silverstripe-geocoder: ^3.0
* silverstripe/recipe-cms: ^5.0
* silverstripe/linkfield: ^4.0
* silverstripe/tagfield: ^3.0

## Installation

`composer require dynamic/silverstripe-locations`

## License

See [License](LICENSE.md)

## Usage

Use the Locations Admin to create Location records.

## Configuration

This module uses [dynamic/silverstripe-geocoder](https://github.com/dynamic/silverstripe-geocoder) to generate coordinates for Locations. To enable geocoding, add the following to `mysite.yml`:

```yaml
Dynamic\SilverStripeGeocoder\GoogleGeocoder:
  geocoder_api_key: 'your-key-here'
  map_api_key: 'your-2nd-key-here'
```

For more information about why 2 keys are required, see [Silverstripe Geocoder Documentation](https://github.com/dynamic/silverstripe-geocoder?tab=readme-ov-file#google-api-keys)

## Maintainers

 *  [Dynamic](https://www.dynamicagency.com) (<dev@dynamicagency.com>)

## Bugtracker
Bugs are tracked in the issues section of this repository. Before submitting an issue please read over
existing issues to ensure yours is unique.

If the issue does look like a new bug:

 - Create a new issue
 - Describe the steps required to reproduce your issue, and the expected outcome. Unit tests, screenshots
 and screencasts can help here.
 - Describe your environment as detailed as possible: SilverStripe version, Browser, PHP version,
 Operating System, any installed SilverStripe modules.

Please report security issues to the module maintainers directly. Please don't file security issues in the bugtracker.

## Development and contribution
If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.
