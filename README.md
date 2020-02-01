Тестовое задание Yii2

## Установка

1. клонируем проект с github:

```
git clone https://github.com/disasterovich/test-luxxy.git
```

2. Init application

```
/path/to/php-bin/php /path/to/yii-application/init
```

3. Создаем БД, прописываем свои логин, пароль, имя бд. (в файле /path/to/yii-application/common/config/main-local.php).

4. Переходим в корень проекта и устанавливаем composer пакеты:

```
composer install
```

5. Выполняем миграции:

```
yii migrate
```

6. Настраиваем отображение бэкенда и фронтенда как описано в документации - https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md



