<?php

namespace floor12\youtube;

use yii\base\Widget;

/**
 * Class YoutubeWidget
 * @package floor12\youtube
 */
class YoutubeWidget extends Widget
{
    public $videoId;

    /**
     * @inheritDoc
     * @return string
     */
    public function run()
    {
        return $this->render('@vendor/floor12/yii2-youtube-async-widget/youtubeWidgetView.php', ['videoId' => $this->videoId]);
    }

}