<?php

namespace Miltondw\Poo\models;

class Like
{
    public function __construct(private User $user)
    {
    }
    public function getUser()
    {
        return $this->user;
    }
}
