<?php

namespace Miltondw\Poo\models;

use Miltondw\Poo\models\Post;
use Miltondw\Poo\models\IPost;

class ImagePost extends Post implements IPost
{
    public function __construct(private string $message, private string $img)
    {
        parent::__construct($message);
    }
    public function getImage(): string
    {
        return $this->img;
    }
    public function toString(): string
    {
        $info = $this->getId() . "\n";
        $info .= "Message:" . $this->getMessage() . "\n";
        $info .= "Image:" . $this->getImage() . "\n\n";
        $info .= "Likes:" . count($this->getLikes()) . "\n\n";
        return $info;
    }
}
