<?php
declare(strict_types=1);

namespace UnitTestFiles\Test;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../solution.php";

class TransformArrayTest extends TestCase
{
    public function testCaseOne(): void
    {
        $inputArr  = [3,5,6,0,7,0,1];
        $outputArr = [0,3,5,6,7,1,0];

        $this->assertEquals($outputArr, transformedArray($inputArr));
    }

    public function testCaseTwo(): void
    {
        $inputArr  = [5,0,0,6,0,8];
        $outputArr = [0,0,5,6,8,0];

        $this->assertEquals($outputArr, transformedArray($inputArr));
    }

    public function testCaseThree(): void
    {
        $inputArr  = [1,2,3,0,0,0,0];
        $outputArr = [0,0,1,2,3,0,0];

        $this->assertEquals($outputArr, transformedArray($inputArr));
    }

    public function testCaseFour(): void
    {
        $inputArr  = [1,2,3];
        $outputArr = [1,2,3];

        $this->assertEquals($outputArr, transformedArray($inputArr));
    }
}