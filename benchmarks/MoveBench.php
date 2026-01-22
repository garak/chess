<?php

declare(strict_types=1);

namespace PChess\Chess\Benchmark;

use PChess\Chess\Chess;
use PhpBench\Attributes\BeforeMethods;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Revs;

#[BeforeMethods(['init'])]
final class MoveBench
{
    private Chess $chess;

    public function init(): void
    {
        $this->chess = new Chess();
    }

    #[Revs(1000)]
    #[Iterations(5)]
    public function benchMove(): void
    {
        $this->chess->move('e4');
    }

    #[Revs(1000)]
    #[Iterations(5)]
    public function benchMoves(): void
    {
        $this->chess->moves();
    }
}
