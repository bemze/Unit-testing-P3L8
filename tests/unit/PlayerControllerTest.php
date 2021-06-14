<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
use Controller\PlayerController;
use Model\Player;
use Repository\PlayerRepository;


class PlayerControllerTest extends TestCase
{

    public function testGetAllJsonReturnsJson()
    {
        // given

        // STUB
        // atjungimas nuo DB su stub
        // $stub = $this->createStub(PlayerRepository::class);
        // $stub->method('getAll')->willReturn(array(new Player('1', "Lebron"), new Player('2', "Jonas")));
        // $playerController = new PlayerController($stub);

        // MOCK
        $mock = $this->getMockBuilder(PlayerRepository::class)->getMock();
        $playerController = new PlayerController($mock);
        // kiek kartu kviestas metodas
        $mock->expects($this->exactly(1))
            ->method('getAll')
            ->willReturn(array(new Player('1', "Lebron"), new Player('2', "Jonas")));


        // when 
        $res = $playerController->getAllJson();
        // then ... turime pakeisti realiais duomenimis iš duomenų bazės!
        assertEquals('[{"id":"1","name":"Lebron"},{"id":"2","name":"Jonas"}]', $res);
    }
    public function testGetAllJsonWithMetaInformation()
    {
        // given
        // MOCK
       
        $mock = $this->getMockBuilder(PlayerRepository::class)->getMock();
        $playerController = new PlayerController($mock);
        // kiek kartu kviestas metodas
        $mock->expects($this->exactly(2))
            ->method('getAll')
            ->willReturn(array(new Player('1', "Lebron"), new Player('2', "Jonas")));


        // when 
        $res = $playerController->getAllJsonWithMetaInformation();
        
        // then 
        assertEquals('[{"id":"1","name":"Lebron"},{"id":"2","name":"Jonas"}], count: 2', $res);
    }
}
