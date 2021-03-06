<?php

require_once dirname(dirname(__DIR__ )). '/vendor/autoload.php';

$container = new \Illuminate\Container\Container;


// インターフェースを作成
interface GameSoftInterface
{
    public  function getTitle();
}


interface GamePlayerInterface
{
    public  function play();
}

interface TwitterClientInterface
{
    public function post();
}


// GameSoftクラス
Class GameSoft implements GameSoftInterface
{
    private $title;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function sayTitle()
    {
        echo $this->title;
    }
}

// PS4クラス
class Ps4 implements GamePlayerInterface
{
    private $gameSoft;

    public function __construct(GameSoftInterface $gameSoft)
    {
        $this->gameSoft = $gameSoft;
    }

    public function play()
    {
        echo "PS4で{$this->gameSoft->getTitle()}をプレイしたい！！！";
    }
}

class TwitterClient implements TwitterClientInterface
{
    public function post()
    {
        echo "めっちゃ面白いなう！";
    }
}

//クラス作成
class Endo
{
    private $gameSpft;
    private $ps4;
    private $twitter_client;

    public function __construct(GameSoftInterface $gameSpft,GamePlayerInterface $ps4, TwitterClientInterface $twitter_client)
    {
        $this->gameSpft = $gameSpft;
        $this->ps4 = $ps4;
        $this->twitter_client = $twitter_client;
    }

    public function play()
    {
        echo "今日は{$this->gameSpft->getTitle()}を持ってきました！ ";
        echo "{$this->ps4->play()}";
    }

    public function tweet()
    {
        $this->twitter_client->post();
    }
}


// GameSoftインスタンスを作成する
$gameTitle = $container->make('GameSoft',['title' => 'SEKIRO']);
// PS4インスタンスを作成する
$pse4 = $container->make('PS4',['gameSoft' =>$gameTitle]);
// TwitterClientインスタンスを作成する
$tweet = $container->make('TwitterClient');

$container->bind('Endo',function() use ($gameTitle,$pse4,$tweet){
    return new Endo($gameTitle,$pse4,$tweet);
});

$endo = $container->make('Endo');
$endo->play();
$endo->tweet();

//今日はSEKIROを持ってきました！ SEKIROをプレイしたい！！！めっちゃ面白いなう！%
