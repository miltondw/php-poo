<?php

namespace Miltondw\Poo\models;

use Miltondw\Poo\utils\Uuid;

class Post
{
    private string $id;
    private array $likes;

    public function __construct(private string $message)
    {
        $this->id = Uuid::generate();
        $this->likes = [];
    }
    //Methods
    public function checkIfUserLiked(User $user): bool
    {
        $found = array_filter(
            $this->likes,
            fn (Like $like) => $like->getUser()->getId() === $user->getId()
        );
        return count($found) === 1;
    }
    public function addLike(User $user)
    {
        if ($this->checkIfUserLiked($user)) {
            $this->removeLike($user);
        } else {
            $like = new Like($user);
            array_push($this->likes, $like);
        }
    }
    private function removeLike(User $user)
    {
        $this->likes = array_filter(
            $this->likes,
            fn (Like $like) => $like->getUser()->getId() !== $user->getId()
        );
    }
    //Getters
    public function getMessage()
    {
        return $this->message;
    }
    public function getId()
    {
        return "Your id is => $this->id";
    }
    public function getLikes(): array
    {
        return $this->likes;
    }
}
