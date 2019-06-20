<?php


namespace floor12\youtube;

use Yii;

class YoutubeProcessor
{
    const PATTERN = '/\{\{youtube:(.+)\}\}/';

    /**
     * @param string $str
     * @return string
     */
    public static function process(string $str)
    {
        if (preg_match_all(self::PATTERN, $str, $matches))
            foreach ($matches[0] as $key => $widgetString) {
                $str = str_replace($widgetString, YoutubeWidget::widget(['videoId' => $matches[1][$key]]), $str);
            }

        return $str;
    }
}