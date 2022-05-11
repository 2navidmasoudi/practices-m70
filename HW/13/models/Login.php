<?php

namespace app\models;

use app\core\DbModel;

class Login extends DbModel
{
    public string $username = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';

    public function tableName(): string
    {
        // TODO: table name that has the specific type
        return "";
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            // 'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ['username', 'password'];
    }

    public function get()
    {
        // todo
    }
}
