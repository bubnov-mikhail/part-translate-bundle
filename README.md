# partTranslateBundle

## Бандл для Symfony3 добавляет новый фильтр для twig шаблонизатора

* Применяется к строке как фильтр в шаблоне
* Переводит все маркеры в строке, записанные в формате %\S+%

### Установка
----------------------------------
    
    Выполнить:
    ```sh
    composer require bubnov/part-translate-bundle:~3.0
    ```

    Добавить бандл в конфигурацию AppKernel
    ```php
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Bubnov\PartTranslateBundle\BubnovPartTranslateBundle(),
            // ...
        );
    }
    ```

### Использование
-------------------------------------

В twig-шаблоне
    ```twig
    {# Ваш шаблон #}
    Этот маркер требуется перевести: {{ 'markers.tobe.translate' | partTranslate }}
    ```


### Credits

Bundle code is written by Mikhail Bubnov
bubnov.mihail@gmail.com
https://github.com/bubnovKelnik


### License

This bundle is under the MIT license.
