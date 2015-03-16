[![Build Status](https://travis-ci.org/void-sector/xml-transform.svg?branch=master)](https://travis-ci.org/void-sector/xml-transform) [![Coverage Status](https://coveralls.io/repos/void-sector/xml-transform/badge.svg?branch=master)](https://coveralls.io/r/void-sector/xml-transform?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/void-sector/xml-transform/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/void-sector/xml-transform/?branch=master)


# XMLTransformer

Usage:

```php
$xmlTransformer = new XMLTransformer();

$xmlTransformer->transform(
    new SimpleXMLElement('<foo><bar>foo</bar></foo>'),
    '../stylesheet.xsl'
);

$transformedXMLString = $xmlTransformer->toString();
// OR
$transformedXMLDocment = $xmlTransformer->toDOMDocument();

```