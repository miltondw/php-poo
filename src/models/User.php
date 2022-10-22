<?php

namespace Miltondw\Poo\models;

use Miltondw\Poo\utils\Uuid;

class User
{
    private string $id;
    private array $posts;
    private array $followers;
    public function __construct(
        private string $username,
        private string $name,
        private string $email,
        private string $password
    ) {
        $this->id = Uuid::generate();
        $this->posts = [];
        $this->followers = [];
    }
    //Methods
    public function publish(Post $post)
    {
        array_push($this->posts, $post);
    }
    public function showPosts()
    {
        foreach ($this->posts as $post) {
            var_dump($post->toString());
        }
    }
    private function hasFollower(User $user)
    {
        $found = array_filter($this->followers, fn (User $follower) => $follower->id === $user->id);
        return count($found) === 1;
    }
    public function addFollower(User $user)
    {
        if (!$this->hasFollower($user)) {
            if ($this->id === $user->id) {
                print_r("You can't add yourself as a follower \n");
            } else {
                array_push($this->followers, $user);
            }
        } else {
            print_r("This user $user->username is already follower \n");
        }
        return $this->followers;
    }
    //Getters
    public function getId(): string
    {
        return $this->id;
    }
    public function getPosts(): array
    {
        return $this->posts;
    }
    public function getFollowers(): array
    {
        return $this->followers;
    }
    public static function showProfile(User $user)
    {
        $profile = "Name: $user->name \n";
        $profile .= "Followers:" . count($user->followers) . "\n";
        $profile .= "Posts:" . count($user->posts) . "\n\n";
        return $profile;
    }
}
