<?php


namespace floor12\youtube;


use yii\base\Widget;

class YoutubeWidget extends Widget
{
    public $videoId;

    public function run()
    {
        return $this->render('.youtubeWidget.php', ['videoId' => $this->videoId]);
    }

}