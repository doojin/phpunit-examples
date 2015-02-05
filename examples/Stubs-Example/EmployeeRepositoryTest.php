<?php

require_once('Employee.php');
require_once('EmployeeRepository.php');


class UserRepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var EmployeeRepository|PHPUnit_Framework_MockObject_MockObject
     */
    private $employeeRepositoryStub = null;

    public function setUp()
    {
        $this->employeeRepositoryStub = $this->getMockBuilder('EmployeeRepository')
            ->setMethods(array('getEmployeeById'))
            ->getMock();
    }

    public function test_ShouldReturnStubbedValue()
    {
        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->with(5)
            ->willReturn(new Employee('Employee', 'With id = 5', 5));

        $expectedEmployee = new Employee('Employee', 'With id = 5', 5);

        $actualEmployee = $this->employeeRepositoryStub->getEmployeeById(5);

        $this->assertEquals($expectedEmployee, $actualEmployee);
    }

    public function test_ShouldReturnDifferentValuesDependingOnMethodsArgument()
    {
        $this->employeeRepositoryStub->expects($this->at(0))
            ->method('getEmployeeById')
            ->with(6)
            ->willReturn(new Employee('Employee', 'With id = 6', 6));

        $this->employeeRepositoryStub->expects($this->at(1))
            ->method('getEmployeeById')
            ->with(7)
            ->willReturn(new Employee('Employee', 'With id = 7', 7));

        $expectedEmployee1 = new Employee('Employee', 'With id = 6', 6);
        $expectedEmployee2 = new Employee('Employee', 'With id = 7', 7);

        $actualEmployee1 = $this->employeeRepositoryStub->getEmployeeById(6);
        $actualEmployee2 = $this->employeeRepositoryStub->getEmployeeById(7);

        $this->assertEquals($expectedEmployee1, $actualEmployee1);
        $this->assertEquals($expectedEmployee2, $actualEmployee2);
    }

    public function test_ShouldReturnMethodsArgument()
    {
        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->willReturnArgument(1);
        $expectedEmployee = new Employee('Dummy', 'Employee', 13);

        $actualEmployee = $this->employeeRepositoryStub->getEmployeeById(15, new Employee('Dummy', 'Employee', 13));

        $this->assertEquals($expectedEmployee, $actualEmployee);
    }

    /**
     * @backupStaticAttributes enabled
     */
    public function test_ShouldReturnValueFromMap()
    {
        $map = array(
            array(1, new Employee('Employee1', 'Employee1')),
            array(2, new Employee('Employee2', 'Employee2')),
            array(3, new Employee('Employee3', 'Employee3'))
        );

        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->willReturnMap($map);

        $expectedEmployee1 = new Employee('Employee1', 'Employee1', 1);
        $expectedEmployee2 = new Employee('Employee2', 'Employee2', 2);
        $expectedEmployee3 = new Employee('Employee3', 'Employee3', 3);
        $expectedEmployee4 = new Employee('Employee2', 'Employee2', 2);

        $this->assertEquals($expectedEmployee1, $this->employeeRepositoryStub->getEmployeeById(1));
        $this->assertEquals($expectedEmployee2, $this->employeeRepositoryStub->getEmployeeById(2));
        $this->assertEquals($expectedEmployee3, $this->employeeRepositoryStub->getEmployeeById(3));
        $this->assertEquals($expectedEmployee4, $this->employeeRepositoryStub->getEmployeeById(2));
    }

    public function test_ShouldReturnValueFromCallback()
    {
        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->willReturnCallback('UserRepositoryTest::customCallback');

        $expectedEmployee1 = new Employee('Employee1', 'Employee1', 1);
        $expectedEmployee2 = new Employee('Employee2', 'Employee2', 2);

        $this->assertEquals($expectedEmployee1, $this->employeeRepositoryStub->getEmployeeById(1));
        $this->assertEquals($expectedEmployee2, $this->employeeRepositoryStub->getEmployeeById(2));
    }


    /**
     * @backupStaticAttributes enabled
     */
    public function test_ShouldReturnValuesInCorrectOrder()
    {
        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->willReturnOnConsecutiveCalls(
                new Employee('Employee1', 'Employee1'),
                new Employee('Employee2', 'Employee2'),
                new Employee('Employee3', 'Employee3')
            );

        $expectedEmployee1 = new Employee('Employee1', 'Employee1', 1);
        $expectedEmployee2 = new Employee('Employee2', 'Employee2', 2);
        $expectedEmployee3 = new Employee('Employee3', 'Employee3', 3);

        $this->assertEquals($expectedEmployee1, $this->employeeRepositoryStub->getEmployeeById(0));
        $this->assertEquals($expectedEmployee2, $this->employeeRepositoryStub->getEmployeeById(0));
        $this->assertEquals($expectedEmployee3, $this->employeeRepositoryStub->getEmployeeById(0));
    }

    /**
     * @expectedException Exception
     * @expectedExceptionCode 5
     * @expectedExceptionMessage Custom message
     */
    public function test_ShouldThrowException()
    {
        $this->employeeRepositoryStub->expects($this->any())
            ->method('getEmployeeById')
            ->willThrowException(new Exception('Custom message', 5));

        $this->employeeRepositoryStub->getEmployeeById(0);
    }

    /**
     * @param int $id
     * @return Employee
     */
    public static function customCallback($id)
    {
        return new Employee('Employee' . $id, 'Employee' . $id, $id);
    }
}