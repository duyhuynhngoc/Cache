# cache for php
Management and working with cache.

Usage
-----
1. Memcache

```
    $app      = 'App'           //Application name, default "App"
    $server   = 'localhost'     //default "localhost"
    $port     = 11211           //default "11211"

    CacheManager::getCacher($app, $server, $port);

Building from master
--------------------

Clone the repository:

git clone https://github.com/duyhuynhngoc/Cache.git

Building from composer
----------------------
    {
      "repositories": [
        {
          "type": "git",
          "url": "https://github.com/duyhuynhngoc"
        }
      ],
      "require": {
        "Cache": "1.0.*"
      }
    }

License
-------

The MIT License (MIT)

Copyright (c) 2015 Duy Huynh

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
