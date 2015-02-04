<?php

require_once('DefaultDatabaseTestCase.php');
require_once('MessageService.php');

class CustomDatabaseTest extends DefaultDatabaseTestCase
{

    /**
     * @var MessageService
     */
    private $messageService = null;

    public function setUp()
    {
        $this->messageService = new MessageService();
        parent::setUp();
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        $compositeDataSet = new PHPUnit_Extensions_Database_DataSet_CompositeDataSet();
        $compositeDataSet->addDataSet($this->createXMLDataSet('examples/Database-Test-Example/users-table.xml'));
        $compositeDataSet->addDataSet($this->createXMLDataSet('examples/Database-Test-Example/messages-table.xml'));
        return $compositeDataSet;
    }


    public function test_RowCountForUserTableShouldBeEqualToThree()
    {
        $this->assertEquals(3, $this->getConnection()->getRowCount('messages'));
    }

    public function test_getMessages_ShouldReturnValidArrayOfMessages()
    {
        $messageService = new MessageService();
        $expected = array(
            new Message('user1', 'user2', 'Hello, User2!'),
            new Message('user1', 'user2', 'Hello, User2 again!'),
            new Message('user2', 'user1', 'Hi, User1!')
        );

        $messages = $messageService->getMessages();

        $this->assertEquals($expected, $messages);
    }
}