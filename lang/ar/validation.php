<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error includes used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these includes here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other :value.',
    'active_url' => ':attribute ليس عنوان URL صالح.',
    'after' => ':attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخ بعد أو يساوي :date.',
    'alpha' => ':attribute قد يحتوي فقط على أحرف.',
    'alpha_dash' => ':attribute قد يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => ':attribute قد يحتوي فقط على أحرف وأرقام.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'ascii' => ':attribute قد يحتوي فقط على أحرف ASCII أحادية البايت.',
    'before' => ':attribute يجب أن يكون تاريخ قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخ قبل أو يساوي :date.',
    'between' => [
        'array' => ':attribute يجب أن يكون بين :min و :max عنصر.',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string' => ':attribute يجب أن يكون بين :min و :max حرف.',
    ],
    'boolean' => ':attribute يجب أن يكون صحيح أو خطأ.',
    'can' => ':attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'تأكيد :attribute لا يتطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute ليس تاريخ صالح.',
    'date_equals' => ':attribute يجب أن يكون تاريخ يساوي :date.',
    'date_format' => ':attribute لا يتطابق مع التنسيق :format.',
    'decimal' => ':attribute يجب أن يكون :decimal منازل عشرية.',
    'declined' => ':attribute يجب رفضه.',
    'declined_if' => ':attribute يجب رفضه عندما يكون :other :value.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يكون :digits أرقام.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => ':attribute أبعاد صورة غير صالحة.',
    'distinct' => ':attribute له قيمة مكررة.',
    'doesnt_end_with' => ':attribute قد لا ينتهي بأحد: :values.',
    'doesnt_start_with' => ':attribute قد لا يبدأ بأحد: :values.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد: :values.',
    'enum' => ':attribute المحدد غير صالح.',
    'exists' => ':attribute المحدد غير صالح.',
    'extensions' => ':attribute يجب أن يكون أحد الامتدادات التالية: :values.',
    'file' => ':attribute يجب أن يكون ملف.',
    'filled' => ':attribute يجب أن يكون له قيمة.',
    'gt' => [
        'array' => ':attribute يجب أن يكون أكثر من :value عنصر.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'string' => ':attribute يجب أن يكون أكثر من :value حرف.',
    ],
    'gte' => [
        'array' => ':attribute يجب أن يكون :value عنصر أو أكثر.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون :value حرف أو أكثر.',
    ],
    'hex_color' => ':attribute يجب أن يكون لون hex صالح.',
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute المحدد غير صالح.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => ':attribute يجب أن يكون رقم صحيح.',
    'ip' => ':attribute يجب أن يكون عنوان IP صالح.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صالح.',
    'json' => ':attribute يجب أن يكون نص JSON صالح.',
    'lowercase' => ':attribute يجب أن يكون أحرف صغيرة.',
    'lt' => [
        'array' => ':attribute يجب أن يكون أقل من :value عنصر.',
        'file' => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'string' => ':attribute يجب أن يكون أقل من :value حرف.',
    ],
    'lte' => [
        'array' => ':attribute يجب أن يكون :value عنصر أو أقل.',
        'file' => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون :value حرف أو أقل.',
    ],
    'mac_address' => ':attribute يجب أن يكون عنوان MAC صالح.',
    'max' => [
        'array' => ':attribute قد لا يكون أكثر من :max عنصر.',
        'file' => ':attribute قد لا يكون أكبر من :max كيلوبايت.',
        'numeric' => ':attribute قد لا يكون أكبر من :max.',
        'string' => ':attribute قد لا يكون أكثر من :max حرف.',
    ],
    'max_digits' => ':attribute قد لا يكون أكثر من :max أرقام.',
    'mimes' => ':attribute يجب أن يكون ملف من نوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملف من نوع: :values.',
    'min' => [
        'array' => ':attribute يجب أن يكون :min عنصر على الأقل.',
        'file' => ':attribute يجب أن يكون :min كيلوبايت على الأقل.',
        'numeric' => ':attribute يجب أن يكون :min على الأقل.',
        'string' => ':attribute يجب أن يكون :min حرف على الأقل.',
    ],
    'min_digits' => ':attribute يجب أن يكون :min أرقام على الأقل.',
    'missing' => ':attribute مفقود.',
    'missing_if' => ':attribute مفقود عندما يكون :other :value.',
    'missing_unless' => ':attribute مفقود ما لم يكن :other :value.',
    'missing_with' => ':attribute مفقود عندما يكون :values موجود.',
    'missing_with_all' => ':attribute مفقود عندما تكون :values موجودة.',
    'multiple_of' => ':attribute يجب أن يكون مضاعف :value.',
    'not_in' => ':attribute المحدد غير صالح.',
    'not_regex' => ':attribute التنسيق غير صالح.',
    'numeric' => ':attribute يجب أن يكون رقم.',
    'password' => [
        'letters' => ':attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => ':attribute يجب أن يحتوي على حرف كبير وحرف صغير واحد على الأقل.',
        'numbers' => ':attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => ':attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => ':attribute المحدد ظهر في تسريب بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present' => ':attribute يجب أن يكون موجود.',
    'present_if' => ':attribute يجب أن يكون موجود عندما يكون :other :value.',
    'present_unless' => ':attribute يجب أن يكون موجود ما لم يكن :other :value.',
    'present_with' => ':attribute يجب أن يكون موجود عندما يكون :values موجود.',
    'present_with_all' => ':attribute يجب أن يكون موجود عندما تكون :values موجودة.',
    'prohibited' => ':attribute محظور.',
    'prohibited_if' => ':attribute محظور عندما يكون :other :value.',
    'prohibited_unless' => ':attribute محظور ما لم يكن :other في :values.',
    'prohibits' => ':attribute يمنع :other من أن يكون موجود.',
    'regex' => ':attribute التنسيق غير صالح.',
    'required' => ':attribute مطلوب.',
    'required_array_keys' => ':attribute يجب أن يحتوي على إدخالات لـ: :values.',
    'required_if' => ':attribute مطلوب عندما يكون :other :value.',
    'required_if_accepted' => ':attribute مطلوب عندما يكون :other مقبول.',
    'required_unless' => ':attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => ':attribute مطلوب عندما يكون :values موجود.',
    'required_with_all' => ':attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => ':attribute مطلوب عندما لا يكون :values موجود.',
    'required_without_all' => ':attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون :size.',
        'string' => ':attribute يجب أن يكون :size حرف.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد: :values.',
    'string' => ':attribute يجب أن يكون نص.',
    'timezone' => ':attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => ':attribute الاسم مسجل مسبقاً.',
    'uploaded' => ':attribute فشل في الرفع.',
    'uppercase' => ':attribute يجب أن يكون أحرف كبيرة.',
    'url' => ':attribute التنسيق غير صالح.',
    'ulid' => ':attribute يجب أن يكون ULID صالح.',
    'uuid' => ':attribute يجب أن يكون UUID صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation includes for attributes using the
    | convention "rule.attribute" to name the lines. This makes it quick to
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name.ar' => 'اسم المرحلة الدراسية بالعربية',
        'name.en' => 'اسم المرحلة الدراسية بالإنجليزية',
        'status' => 'حالة المرحلة الدراسية',
        'notes.ar' => 'ملاحظات المرحلة الدراسية بالعربية',
        'notes.en' => 'ملاحظات المرحلة الدراسية بالإنجليزية',
    ],

];