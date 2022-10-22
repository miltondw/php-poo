<?php
require 'vendor/autoload.php';

use Miltondw\Poo\models\User;
use Miltondw\Poo\models\VideoPost;
use Miltondw\Poo\models\ImagePost;

//Users
$milton = new User("miltondw", "milton", "milton@gmail.com", "1234");
$chirly = new User("chirlydw", "chirly", "chirly@gmail.com", "4321");
$yosel = new User("yoseldw", "yosel", "yosel@gmail.com", "5678");
$leny = new User("lenydw", "leny", "leny@gmail.com", "8765");

//Posts
$miltonPost = new ImagePost("Programing dog", "imagemilton.png");
$chirlyPost = new ImagePost("from the gym", "imagechirly.png");
$yoselPost = new ImagePost("view tv", "imageyosel.png");
$lenyPost = new  ImagePost("chambiando", "imageleny.png");

//Videos
$miltonVideos = new VideoPost("Programing dog", "imagemilton.mp3");
$chirlyVideos = new VideoPost("from the gym", "imagechirly.mp3");
$yoselVideos = new VideoPost("view tv", "imageyosel.mp3");
$lenyVideos = new  VideoPost("chambiando", "imageleny.mp3");

//Publication posts
$milton->publish($miltonPost);
$chirly->publish($chirlyPost);
$yosel->publish($yoselPost);
$leny->publish($lenyPost);

//Likes Posts
$miltonPost->addLike($chirly);
$miltonPost->addLike($leny);

$yoselPost->addLike($leny);
$yoselPost->addLike($yosel);
$yoselPost->addLike($milton);

$lenyPost->addLike($milton);
$lenyPost->addLike($leny);
$lenyPost->addLike($chirly);
$lenyPost->addLike($yosel);

$chirlyPost->addLike($milton);
$chirlyPost->addLike($yosel);
$chirlyPost->addLike($leny);

//Likes Videos
$miltonVideos->addLike($chirly);

$yoselVideos->addLike($leny);
$yoselVideos->addLike($yosel);

$lenyVideos->addLike($milton);
$lenyVideos->addLike($leny);
$lenyVideos->addLike($chirly);

$chirlyVideos->addLike($milton);
$chirlyVideos->addLike($yosel);
$chirlyVideos->addLike($leny);
$chirlyVideos->addLike($chirly);


//Followers
$milton->addFollower($leny);
$milton->addFollower($chirly);
$milton->addFollower($yosel);

$leny->addFollower($milton);
$leny->addFollower($chirly);
$leny->addFollower($yosel);

$yosel->addFollower($leny);
$yosel->addFollower($milton);

$chirly->addFollower($leny);
$chirly->addFollower($milton);
$chirly->addFollower($yosel);

//Profiles
print_r(User::showProfile($milton));
print_r(User::showProfile($leny));
print_r(User::showProfile($chirly));
print_r(User::showProfile($yosel));

//Show posts
print_r($miltonPost->toString());
print_r($yoselPost->toString());
print_r($lenyPost->toString());
print_r($chirlyPost->toString());
//Show Videos
print_r($miltonVideos->toString());
print_r($yoselVideos->toString());
print_r($lenyVideos->toString());
print_r($chirlyVideos->toString());
