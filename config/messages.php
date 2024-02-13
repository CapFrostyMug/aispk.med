<?php

return [
    'personalFiles' => [
        'success' => [
            'store' => 'Анкета успешно создана.',
            'update' => 'Анкета успешно обновлена.',
            'destroy' => 'Анкета успешно удалена.',
        ],
        'error' => [
            'store' => 'Системная ошибка: не удалось создать анкету. Попробуйте еще раз. Перед отправкой формы обязательно перепроверьте поля!',
            'update' => 'Системная ошибка: не удалось обновить анкету. Попробуйте еще раз. Перед отправкой формы обязательно перепроверьте поля!',
            'destroy' => 'Системная ошибка: не удалось удалить анкету. Попробуйте еще раз.',
        ]
    ],

    'manageCategories' => [
        'success' => [
            'store' => 'Запись успешно добавлена.',
            'update' => '',
            'destroy' => 'Запись успешно удалена.',
        ],
        'error' => [
            'store' => 'Системная ошибка: не удалось добавить запись.',
            'update' => '',
            'destroy' => 'Системная ошибка: не удалось удалить запись.',
        ]
    ],

    'manageUsers' => [
        'success' => [
            'store' => 'Пользователь успешно добавлен.',
            'update' => 'Профиль пользователя успешно обновлён.',
            'destroy' => 'Пользователь успешно удален.',
        ],
        'error' => [
            'store' => 'Системная ошибка: не удалось добавить пользователя.',
            'update' => 'Системная ошибка: не удалось обновить профиль пользователя.',
            'destroy' => 'Системная ошибка: не удалось удалить пользователя.',
        ]
    ],
];
