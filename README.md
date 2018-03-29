>http://webdesign.ru.net/article/pravila-oformleniya-fayla-readmemd-na-github.html

# recursivelist

#### Подключение в composer.json.
```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Dmitry19861209/recursivelist.git"
        }
    ],
```
```
"require": {
        ...
        "recursivelist": "dev-master",
        ...
    },
```

#### Тесты, они же примеры.
В терминале из корня выполнить:
```
phpunit --bootstrap vendor/autoload.php tests/RecTest.php
```
