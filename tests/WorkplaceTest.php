<?php

use PHPUnit\Framework\TestCase;

class WorkplaceTest extends TestCase
{
    public function testBossNotInsultedByBeingCalledPeon()
    {
        $expected = array(
            "Linus Duran: Peon, Human Being",
            "Brennan Odom: Manager, Human Being",
            "Mary Chandler: Human Being, CEO"
        );

        $workplace = new Workplace();

        $string = $workplace->toString();
        $lines = array_filter(explode("\n", $string));

        foreach ($lines as $i => $line) {
            $this->assertEquals($expected[$i], $line);
        }
    }

    public function testEveryoneIsMultitasking()
    {
        $workplace = new Workplace();

        foreach ($workplace->employees as $employee) {
            $this->assertGreaterThan(
                1,
                count($workplace->getRoleNames($employee['roleIDs']))
            );
        }
    }

    public function testButNobodyIsBitingOffMoreThanTheyCanChew()
    {
        $workplace = new Workplace();

        foreach ($workplace->employees as $employee) {
            $this->assertLessThan(
                3,
                count($workplace->getRoleNames($employee['roleIDs']))
            );
        }
    }
}
