<?php

namespace Miltondw\Poo\models;

class VideoPost extends Post
{
    public function __construct(private string $message, private string $video)
    {
        parent::__construct($message);
    }

    public function getVideo(): string
    {
        return $this->video;
    }
    public function toString(): string
    {
        $info = $this->getId() . "\n";
        $info .= "Message:" . $this->getMessage() . "\n";
        $info .= "Video:" . $this->getVideo() . "\n\n";
        $info .= "Likes:" . count($this->getLikes()) . "\n\n";
        return $info;
    }
}
