<?php

class SpeSkillTest
{
    /**
     * Find narcissistic value of a number
     *
     * @param  int  $narcis
     * @return bool
     */
    public static function narcissistic(int $narcis): bool
    {
        $array = str_split($narcis);
        $pow = count($array);

        $number = array_sum(
            array_map(function (int $number) use ($pow) {
                return pow($number, $pow);
            }, $array)
        );

        return $narcis === $number;
    }

    /**
     * Search for parity number
     *
     * @param  array  $parities
     * @return int|bool
     */
    public static function parity(array $parities)/* : int|bool */
    {
        $mapped = array_map(function ($parity) {
            return abs($parity) % 2;
        }, $parities);

        $count = array_count_values($mapped);

        if (! in_array(1, $count)) {
            return false;
        }

        $parity = array_search(1, $count);

        return $parities[array_search($parity, $mapped)];
    }

    /**
     * Find the needle in a haystack
     *
     * @param  array  $haystacks
     * @param  string  $needle
     * @return int|bool
     */
    public static function findNeedle(array $haystacks, string $needle)/* : int|bool */
    {
        foreach ($haystacks as $key => $haystack) {
            if ($haystack === $needle) {
                return $key;
            }
        }

        return false;
    }

    /**
     * Blue ocean reverse
     *
     * @param  array  $haystacks
     * @param  array  $needles
     * @return array
     */
    public static function blueOcean(array $haystacks, array $needles): array
    {
        foreach ($needles as $key => $needle) {
            $haystacks = array_filter($haystacks, function ($var) use ($needle) {
                return $var != $needle;
            });
        }

        return array_values($haystacks);
    }
}

// Testing
SpeSkillTest::narcissistic(153);
SpeSkillTest::narcissistic(111);

SpeSkillTest::parity([2, 4, 0, 100, 4, 11, 2602, 36]);
SpeSkillTest::parity([160, 3, 1719, 19, 11, 13, -21]);
SpeSkillTest::parity([11, 13, 15, 19, 9, 13, -21]);

SpeSkillTest::findNeedle(['red', 'blue', 'yellow', 'black', 'grey'], 'blue');

SpeSkillTest::blueOcean([1, 2, 3, 4, 6, 10], [1]);
SpeSkillTest::blueOcean([1, 5, 5, 5, 5, 3], [5]);
