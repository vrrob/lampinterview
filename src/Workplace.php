<?php

class Workplace
{
    public $roles = array(
        '1' => 'Peon',
        '2' => 'Manager',
        '3' => 'Human Being',
        '13' => 'CEO'
    );

    public $employees = array(
        array('name' => 'Linus Duran',   'roleIDs' => '1,3'),   // Linus is a low ranking human.
        array('name' => 'Brennan Odom',  'roleIDs' => '2,3'),   // Brennan is a human and a manager.
        array('name' => 'Mary Chandler', 'roleIDs' => '3,13')   // Mary is a human and a CEO.
    );

    /**
     * Takes a comma-separated string of Role IDs and returns an array
     * of Role Names.
     *
     * @return array
     */

    public function getRoleNames($roleIDs)
    {
        $roleNames = [];

        foreach ($this->roles as $roleID => $role) {
            $found = strpos($roleIDs, (string) $roleID);

            if ($found !== false) {
                $roleNames[] = $role;
            }
        }

        return $roleNames;
    }

    /**
     * Returns the list of employees and their associated role names as a human-readable
     * report.
     *
     * @return string
     */

    public function toString()
    {
        $output = "";

        foreach ($this->employees as $employee) {
            $roleNames = $this->getRoleNames($employee['roleIDs']);

            $roleNamesStr = implode(', ', $roleNames);

            $output .= "{$employee['name']}: {$roleNamesStr}\n";
        }

        return $output;
    }
}
