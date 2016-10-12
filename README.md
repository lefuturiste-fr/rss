# rss
Add rss flux in your mvc architecture

This class allows you to generate an RSS feed from a xml file already designed by you: visit example.php

Use this function for your loop.
This function return array (last items)
```php
$rss->getRss(limitStart, limit)
```

Use this function to have the date of the last update flux
This funtion return string
```php
$rss->getLastBuildDate()
```

Use this function