<?php

namespace app\models;

use app\core\DbModel;

class Register extends DbModel
{
    public const STATUS_INACTIVE = 0;

    public string $username = '';
    public string $email = '';
    public string $phone = '';
    public string $type = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function tableName(): string
    {
        return "managers";
        // TODO: CHANGE top on $type!
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

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}
