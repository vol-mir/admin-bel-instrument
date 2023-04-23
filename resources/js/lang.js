import Lang from 'laravel-localization';

Lang.addMessages({
    'en': {
        'edit': 'Edit',
        'delete': 'Delete'
    },
    'ru': {
        'edit': 'Изменить',
        'delete': 'Удалить'
    },
});

Lang.setLocale(process.env.MIX_LOCALE);
