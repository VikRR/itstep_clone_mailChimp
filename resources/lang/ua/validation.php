<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute має бути прийнятий.',
    'active_url'           => ':attribute неіснуючий URL.',
    'after'                => ':attribute дата має бути раніше :date.',
    'alpha'                => ':attribute має складатися тількі з літер.',
    'alpha_dash'           => ':attribute має складатися тількі з літер, чисел, та дефісу.',
    'alpha_num'            => ':attribute має складатися тількі з літер та чисел.',
    'array'                => ':attribute має бути масивом.',
    'before'               => ':attribute має бути датою до :date.',
    'between'              => [
        'numeric' => ':attribute має бути поміж :min та :max.',
        'file'    => ':attribute має бути поміж :min та :max кілобайт.',
        'string'  => ':attribute має бути поміж :min та :max символів.',
        'array'   => ':attribute має містити поміж :min та :max значень.',
    ],
    'boolean'              => ':attribute поле має бути true або false.',
    'confirmed'            => ':attribute підтвердження не має.',
    'date'                 => ':attribute не відповідні данні.',
    'date_format'          => ':attribute не відповідає формату :format.',
    'different'            => ':attribute та :other не мають співподати.',
    'digits'               => ':attribute має бути :digits цифрою.',
    'digits_between'       => ':attribute має бути поміж :min та :max цифрами.',
    'dimensions'           => ':attribute має розширення, яке не відповідне зображенню.',
    'distinct'             => ':attribute поле має повторювати значення.',
    'email'                => ':attribute має бути корректною email адрессою.',
    'exists'               => 'обраний :attribute не є дійсним.',
    'file'                 => ':attribute має бути файлом.',
    'filled'               => ':attribute обовʼязкове для заповнення.',
    'image'                => ':attribute має бути зображенням.',
    'in'                   => 'обраний :attribute не є дійсним.',
    'in_array'             => ':attribute поле не існує в :other.',
    'integer'              => ':attribute має бути числом.',
    'ip'                   => ':attribute має бути дійсною IP адрессою.',
    'json'                 => ':attribute має бути дійсною JSON строкою.',
    'max'                  => [
        'numeric' => ':attribute має бути не більше :max.',
        'file'    => ':attribute має бути не більше :max кілобайт.',
        'string'  => ':attribute має бути не більше :max символів.',
        'array'   => ':attribute має містити не більше :max значень.',
    ],
    'mimes'                => ':attribute має бути файлом типу: :values.',
    'mimetypes'            => ':attribute має бути файлом типу: :values.',
    'min'                  => [
        'numeric' => ':attribute має бути принаймні :min.',
        'file'    => ':attribute має бути принаймні :min кілобайт.',
        'string'  => ':attribute має бути принаймні :min символів.',
        'array'   => ':attribute має містити принаймні :min значень.',
    ],
    'not_in'               => 'обраний :attribute недійсний.',
    'numeric'              => ':attribute має бути цифрою.',
    'present'              => ':attribute поле має бути присутнім.',
    'regex'                => ':attribute недійсний формат.',
    'required'             => ':attribute поле обовʼязкове для заповлення.',
    'required_if'          => ':attribute поле обовʼязкове для заповлення коли :other відповідає :value.',
    'required_unless'      => ':attribute поле обовʼязкове для заповлення хіба тільки :other є :values.',
    'required_with'        => ':attribute поле обовʼязкове для заповлення коли :values присутнє.',
    'required_with_all'    => ':attribute поле обовʼязкове для заповлення коли :values присутнє.',
    'required_without'     => ':attribute поле обовʼязкове для заповлення коли :values відсутне.',
    'required_without_all' => ':attribute поле обовʼязкове для заповлення коли жодне :values неприсутнє.',
    'same'                 => ':attribute та :other співпадають.',
    'size'                 => [
        'numeric' => ':attribute має бути :size.',
        'file'    => ':attribute має бути :size кілобайт.',
        'string'  => ':attribute має бути :size символів.',
        'array'   => ':attribute повиний містити :size значень.',
    ],
    'string'               => ':attribute має бути строкою.',
    'timezone'             => ':attribute має бути вірною часовою зоною .',
    'unique'               => ':attribute вже прийнято.',
    'uploaded'             => ':attribute не вдалося завантажити.',
    'url'                  => ':attribute не відповідний формат.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
