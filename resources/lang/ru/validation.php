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

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute несуществующий URL.',
    'after'                => ':attribute дата должна быть ранее :date.',
    'alpha'                => ':attribute должен состоять только из букв.',
    'alpha_dash'           => ':attribute должен состоять только из букв, чисел, и дефиса.',
    'alpha_num'            => ':attribute должен состоять только из букв и чисел.',
    'array'                => ':attribute должен быть масивом.',
    'before'               => ':attribute должен быть датой до :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file'    => ':attribute должен быть между :min и :max килобайт.',
        'string'  => ':attribute должен быть между :min и :max символов.',
        'array'   => ':attribute має містити поміж :min и :max значений.',
    ],
    'boolean'              => ':attribute поле должно быть true или false.',
    'confirmed'            => ':attribute не имеет подтверждения.',
    'date'                 => ':attribute не соответствующие данные.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны совпадать.',
    'digits'               => ':attribute должно быть :digits цифрой.',
    'digits_between'       => ':attribute должен быть между :min и :max цифрами.',
    'dimensions'           => ':attribute расширение не соответствует изображениею.',
    'distinct'             => ':attribute поле должно повторять значение.',
    'email'                => ':attribute должно быть корректным email адресом.',
    'exists'               => 'выбраный :attribute не является действующим.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => ':attribute обязательно для заполнения.',
    'image'                => ':attribute должно быть изображением.',
    'in'                   => 'выбраный :attribute не является действующим.',
    'in_array'             => ':attribute поле не существует в :other.',
    'integer'              => ':attribute должно быть числом.',
    'ip'                   => ':attribute должно быть действительным IP адресом.',
    'json'                 => ':attribute должно быть действительной JSON строкой.',
    'max'                  => [
        'numeric' => ':attribute должно быть не больше :max.',
        'file'    => ':attribute должно быть не больше :max килобайт.',
        'string'  => ':attribute должно быть не больше :max символов.',
        'array'   => ':attribute должно содержать не больше :max значений.',
    ],
    'mimes'                => ':attribute должно быть файлом типа: :values.',
    'mimetypes'            => ':attribute должно быть файлом типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должно быть хотя бы :min.',
        'file'    => ':attribute должно быть хотя бы :min килобайт.',
        'string'  => ':attribute должно быть хотя бы :min символов.',
        'array'   => ':attribute должно содержать хотя бы :min значений.',
    ],
    'not_in'               => 'выбраный :attribute недействительный.',
    'numeric'              => ':attribute должно быть цифрой.',
    'present'              => ':attribute поле должно присутствовать.',
    'regex'                => ':attribute недействительный формат.',
    'required'             => ':attribute поле обязательно для заполнения.',
    'required_if'          => ':attribute поле обязательно для заполнения когда :other соответствует :value.',
    'required_unless'      => ':attribute поле обязательно для заполнения хіба тільки :other є :values.',
    'required_with'        => ':attribute поле обязательно для заполнения когда :values присутствует.',
    'required_with_all'    => ':attribute поле обязательно для заполнения когда :values присутствует.',
    'required_without'     => ':attribute поле обязательно для заполнения когда :values отсутствует.',
    'required_without_all' => ':attribute поле обязательно для заполнения когда не один из :values не присутствует.',
    'same'                 => ':attribute та :other співпадають.',
    'size'                 => [
        'numeric' => ':attribute должно быть :size.',
        'file'    => ':attribute должно быть :size килобайт.',
        'string'  => ':attribute должно быть :size символов.',
        'array'   => ':attribute должно содержать :size значений.',
    ],
    'string'               => ':attribute должно быть строкою.',
    'timezone'             => ':attribute должно быть верной часовой зоной .',
    'unique'               => ':attribute уже принят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => ':attribute не соответствующий формат.',

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
