<?php

class Player
{
    private $name = 'Player';
    private $currentFrame = 1;
    private $frames = [
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => [],
        7 => [],
        8 => [],
        9 => [],
        10 => []
    ];


    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }

    public function score():int
    {
        $total = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0
        ];
        $strikeCount = 0;
        $lastFrameSpare = false;

        foreach ($this->frames AS $i=>$frame) {
            $frameTotal = array_sum($frame);

            if ($i == 10) { // TenthFrame Scoring

                // First roll
                if (isset($frame[0]) && $frame[0] == 10) {

                    // Strike
                    if ($strikeCount > 0) {
                        for ($j=1;$j<=$strikeCount;$j++) {
                            $total[$i-$j] += 10;
                        }
                    }
                }
                $total[$i] += $frame[0] ?? 0;

                if ( ! isset($frame[1]) ) continue;

                if ($strikeCount > 0) {
                    for ($j=1;$j<$strikeCount;$j++) {
                        $total[$i-$j] += $frame[1];
                    }
                }
                $total[$i] += $frame[1] ?? 0;

                // Third Roll
                $total[$i] += $frame[2] ?? 0;
                continue;
            }
            $total[$i] += $frameTotal;
            // Previous Frame Extra's
            if ($strikeCount > 0) {
                for ($j=1;$j<=$strikeCount;$j++) {
                    $total[$i-$j] += $frameTotal;
                }
            }
            if ($lastFrameSpare === true) {
                $total[$i-1] += $frame[0] ?? 0;
                $lastFrameSpare = false;
            }

            if ( $this->isStrike($frame) ) {
                if ($strikeCount < 2) $strikeCount++;
            } else {
                $strikeCount = 0;
            }

            if ($this->isSpare($frame)) {
                $lastFrameSpare = true;
            }

        }
        return array_sum($total);
    }


    public function roll($pins):self
    {
        $this->frames[$this->currentFrame][] = $pins;

        $this->checkFrame($this->currentFrame);

        return $this;
    }

    public function strike():self
    {
        return $this->roll(10);
    }



    protected function checkFrame($currentFrame)
    {
        $frame = $this->frames[$currentFrame];
        if ( $currentFrame == 10) {
            return;
        }
        if (count($frame) == 2 || array_sum($frame) >= 10) {
            $this->currentFrame = ++$currentFrame;
        }
    }


    public function isComplete()
    {

        return false;
    }


    protected function isStrike(array $frame)
    {
        return isset($frame[0]) && $frame[0] == 10;
    }

    protected function isSpare(array $frame)
    {
        return count($frame) == 2 && array_sum($frame) == 10;
    }

}