import Lang from 'laravel-localization';

Lang.addMessages({
    'en': {
        'edit': 'Edit',
        'delete': 'Delete',
        'delete_message_success': 'Item deleted successfully',
        'delete_message_error': 'Item deleted error',
    },
    'ru': {
        'edit': 'Изменить',
        'delete': 'Удалить',
        'delete_message_success': 'Запись успешна удалена',
        'delete_message_error': 'При удалении записи произошла ошибка',
    },
});

Lang.setLocale(process.env.MIX_LOCALE);
