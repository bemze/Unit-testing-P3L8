<?php

namespace Controller;

use Repository\PlayerRepository;

class PlayerController
{
    private $playerRepository;
    public function __construct(PlayerRepository $er)
    {
        $this->playerRepository = $er;
    }
    public function getAll()
    {
    }
    public function getAllById()
    {
    }

    public function getAllJsonWithMetaInformation()
    {
        $count = count($this->playerRepository->getAll());
        return json_encode($this->playerRepository->getAll()) . ", count: " . $count;
    }
    public function getAllJson(): string
    {
        return json_encode($this->playerRepository->getAll());
    }
}
