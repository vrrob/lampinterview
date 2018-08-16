<?php

class Employees {
    public $roles = array(
        '1' => 'Peon',
        '2' => 'Manager',
        '3' => 'Human Being',
        '13' => 'CEO'
    );

    public $employees = array(
        array('Name' => 'Linus Duran',   'RoleIDs' => '1'),     // Linus is just a peon.
        array('Name' => 'Brennan Odom',  'RoleIDs' => '2,3'),   // Brennan is a human and a manager.
        array('Name' => 'Mary Chandler', 'RoleIDs' => '3,13')   // Mary is a human and a CEO.
    );

    // Takes a comma-separated string of Role IDs and returns an array
    // of Role Names.

    public function getRoleNames($roleIDs) {
        foreach ($this->roles as $roleID => $role) {
            $found = strpos($roleIDs, (string) $roleID);

            if ($found !== false) {
                $roleNames[] = $role;
            }
        }

        return $roleNames;
    }

    // Returns the list of employees and their associated role names in a human-readable
    // format.

    public function toString() {
        $output = "";

        foreach ($this->employees as $employee) {
            $roleNames = $this->getRoleNames($employee['RoleIDs']);

            $roleNamesStr = implode(', ', $roleNames);

            $output .= "{$employee['Name']}: {$roleNamesStr}\n";
        }

        return $output;
    }
}

