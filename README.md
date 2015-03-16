[![Build Status](https://travis-ci.org/void-sector/xml-transform.svg?branch=master)](https://travis-ci.org/void-sector/xml-transform) [![Coverage Status](https://coveralls.io/repos/void-sector/xml-transform/badge.svg)](https://coveralls.io/r/void-sector/xml-transform) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/void-sector/xml-transform/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/void-sector/xml-transform/?branch=master)


# XMLTransformer

Usage:

```php
$xmlTransformer = new XMLTransformer();

$transformedDocuemnt = $xmlTransformer->transform(
    new SimpleXMLElement('<foo><bar>foo</bar></foo>'),
    '../stylesheet.xsl'
);
```