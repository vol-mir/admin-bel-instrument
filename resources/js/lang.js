import Lang from 'laravel-localization';

Lang.addMessages({
    'en': {
        'edit': 'Edit',
        'delete': 'Delete',
        'delete_message_success': 'Item deleted successfully',
        'delete_message_error': 'Item deleted error',
        "a1": "A1",
        "mts": "MTS",
        "life": "Life",
        "city": "City",
    },
    'ru': {
        'edit': 'Изменить',
        'delete': 'Удалить',
        'delete_message_success': 'Запись успешна удалена',
        'delete_message_error': 'При удалении записи произошла ошибка',
        "a1": "A1",
        "mts": "МТС",
        "life": "Life",
        "city": "Город",
    },
});

Lang.setLocale(process.env.MIX_LOCALE);
