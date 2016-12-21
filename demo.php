<?php
require __DIR__ . '/vendor/autoload.php';

$trans     = new Symfony\Component\Translation\Translator('en');
$validator = new Illuminate\Validation\Factory($trans);

$validation = $validator->make(
    [
        'name'  => 'xuanskyer',
        'email' => 'furthestworld',
        'created_at' => '2a6'
    ],
    [
        'name'  => 'required|max:1',
        'email' => 'required|email',
        'created_at' => 'date'
    ],
    [
        'name' => '不能为空',
        'max' => '超过最大长度限制！',
        'email' => '不能为空或者不是合法email',
        'date' => '非法时间格式！'
    ]
);

if($validation->fails()){
    $messages = $validation->errors();

    var_dump($messages->toArray());
}