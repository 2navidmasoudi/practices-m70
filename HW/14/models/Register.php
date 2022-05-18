<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class Register extends Model
{
    public const STATUS_INACTIVE = 0;

    public string $username = '';
    public string $email = '';
    public string $phone = '';
    public string $type = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function getTable(): string
    {
        return "doctors";
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            // 'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'type' => [self::RULE_REQUIRED],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['username', 'password', 'status'];
    }
}
