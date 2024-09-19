### README - AntiXss Библиотека

`AntiXss` — это библиотека для защиты вашего Laravel-приложения от XSS (межсайтового скриптинга) атак. Она автоматически очищает все входные данные от потенциально опасных элементов с использованием библиотеки **Binput**, предотвращая внедрение вредоносного кода через пользовательские запросы.


### Установка

1. **Установите библиотеку через Composer**:

   Выполните следующую команду для установки библиотеки:

   ```bash
   composer require bobrovva/anti_xss_lib
   ```

2. **Регистрация Middleware**:

   Добавьте `AntiXss` middleware в файл `bootstrap/app.php`. Вы можете зарегистрировать его глобально или для конкретных маршрутов:

```php
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([
            RequestIdMiddleware::class
        ]);

    })
```

### Использование

AntiXss автоматически обрабатывает все входные данные, когда он зарегистрирован в цепочке middleware. Вам не нужно вручную фильтровать каждый запрос или данные формы.

**Пример работы библиотеки**:

Пользователь отправляет потенциально опасный запрос с XSS-атакой:

   ```http
   POST /submit-form
   {
     "name": "<script>alert('XSS');</script>",
     "email": "user@example.com"
   }
   // Получим ["name" => "", "email" => "user@example.com"]
   ```


### Заключение

`AntiXss` — это удобный и простой способ защитить ваше Laravel-приложение от XSS-атак, автоматически очищая все входные данные. Библиотека предоставляет надежную защиту, обеспечивая безопасность данных при их получении от пользователей.