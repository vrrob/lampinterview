<?php

class EmployeesTest extends PHPUnit_Framework_TestCase {
    public function test1() {
        $employees = new Employees();

        $expected = array(
            "Linus Duran: Peon",
            "Brennan Odom: Manager, Human Being",
            "Mary Chandler: Human Being, CEO"
        );

        $string = $employees->toString();
        $lines = array_filter(explode("\n", $string));

        foreach ($lines as $i => $line) {
            $this->assertEquals($expected[$i], $line);
        }
    }
}
