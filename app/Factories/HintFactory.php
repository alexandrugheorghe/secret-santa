<?php

namespace App\Factories;

use App\Models\Hint;
use App\ValueObjects\HintType;
use Carbon\Carbon;

class HintFactory
{
    const FAKE_CONTENTS = [
        'Your Secret Santa is male',
        'Your Secret Santa joined in March',
        'Your Secret Santa joined 2015',
        'Your Secret Santa\'s birthday in December',
        'Your Secret Santa was last recognised 3 days ago',
        'Your Secret Santa has recently liked a post',
        'Your Secret Santa has recently commented on a post',
        'Your Secret Santa has recently re-recognised someone',
        'Your Secret Santa was not a top performer last month',
        'Your Secret Santa has recently posted on the newsfeed',
        'Your Secret Santa has recently been tagged in a recognition or newsfeed post',
        'Your Secret Santa has recently been tagged in a comment',
        'Your Secret Santa\'s position in the leaderboard is 234',
        'Your Secret Santa was most recognised in April',
        'Your Secret Santa was most recognised in 2016',
        'Your Secret Santa’s last name starts with B',
        'Your Secret Santa’s first name starts with A',
    ];

    public function createRandomHint() : Hint
    {
        return (new Hint())
            ->setContent($this->getRandomFakeContent())
            ->setCreatedAt($this->getRandomDate());
    }

    public function createHint(string $receiverId, string $content, HintType $type, int $revealedAt) : Hint
    {
        return (new Hint())
            ->setReceiverId($receiverId)
            ->setContent($content)
            ->setType($type)
            ->setRevealedAt($revealedAt);
    }

    private function getRandomFakeContent() : string
    {
        return self::FAKE_CONTENTS[array_rand(self::FAKE_CONTENTS)];
    }

    private function getRandomDate() : Carbon
    {
        return Carbon::now()
            ->subWeeks(rand(1, 10))
            ->subDays(rand(1, 10))
            ->subHours(rand(1, 23))
            ->subMinutes(rand(1, 59))
            ->subSeconds(rand(1, 59));
    }
}
