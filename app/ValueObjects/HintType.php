<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class HintType
{
    const GENDER = 1;
    const JOINED_IN_MONTH = 2;
    const JOINED_IN_YEAR = 3;
    const POSITION_IN_LEADERBOARD = 4;
    const HAS_PROFILE_PICTURE = 5;
    const FIRST_NAME_STARTS_WITH = 6;
    const LAST_NAME_STARTS_WITH = 7;
    const BIRTHDAY = 8;

    /**
     * @var int
     */
    private $value;

    /**
     * @var array
     */
    private $allowedValues = [
        self::GENDER,
        self::JOINED_IN_MONTH,
        self::JOINED_IN_YEAR,
        self::POSITION_IN_LEADERBOARD,
        self::HAS_PROFILE_PICTURE,
        self::FIRST_NAME_STARTS_WITH,
        self::LAST_NAME_STARTS_WITH,
        self::BIRTHDAY
    ];

    private function __construct(int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function validate(int $value) : self
    {
        if (in_array($value, $this->allowedValues) === false) {
            throw new InvalidArgumentException();
        }

        return $this;
    }

    public static function gender()
    {
        return new self(self::GENDER);
    }

    public static function joinedInMonth()
    {
        return new self(self::JOINED_IN_MONTH);
    }

    public static function joinedInYear()
    {
        return new self(self::JOINED_IN_YEAR);
    }

    public static function positionInLeaderboard()
    {
        return new self(self::POSITION_IN_LEADERBOARD);
    }

    public static function hasProfilePicture()
    {
        return new self(self::HAS_PROFILE_PICTURE);
    }

    public static function firstNameStartsWith()
    {
        return new self(self::FIRST_NAME_STARTS_WITH);
    }

    public static function lastNameStartsWith()
    {
        return new self(self::LAST_NAME_STARTS_WITH);
    }

    public static function birthday()
    {
        return new self(self::BIRTHDAY);
    }

    public function __toString()
    {
        return (string) $this->value;
    }
}
