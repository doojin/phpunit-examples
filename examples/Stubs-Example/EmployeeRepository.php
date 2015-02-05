<?php

require_once('Employee.php');

class EmployeeRepository
{
    /**
     * @var Employee[]
     */
    private $employees;

    public function init()
    {
        $this->employees[] = new Employee('Dmitry', 'Papka');
        $this->employees[] = new Employee('Sergey', 'Volkov');
        $this->employees[] = new Employee('Evgeny', 'Sidorov');
        $this->employees[] = new Employee('Svetlana', 'Durova');
    }

    /**
     * @param int $id
     * @return Employee
     */
    public function getEmployeeById($id)
    {
        foreach ($this->employees as $employee) {
            if ($employee->getId() == $id) {
                return $employee;
            }
        }
        return null;
    }
}