<?php

namespace App\Parsers;

use PHPHtmlParser\Dom;

class Click108Astro extends AbstractParser
{
    /**
     * @var int
     * @see \App\DailyAstro::MAP_NAMES
     */
    protected $astroId;

    /**
     * @var string format: 2019-01-01
     */
    protected $day;

    /**
     * @var string
     */
    protected $urlFormat = 'http://astro.click108.com.tw/daily_0.php?iAcDay=%s&iAstro=%d';

    /**
     * __construct
     *
     * @param int $astroId
     * @param string $day
     */
    public function __construct(int $astroId, string $day = '2019-01-01')
    {
        parent::__constract();

        $this->astroId = $astroId;
        $this->day = $day;
    }

    public function parse(): array
    {
        $url = sprintf($this->urlFormat, $this->day, $this->astroId);
        $dom = $this->dom->load($url);

        $result = [];
        $content = $dom->find('.TODAY_CONTENT');

        // 整體
        $overallDom = $content->find('span.txt_green');
        $result['overall_star'] = $this->countStar($overallDom->innerHtml);
        $result['overall_content'] = $overallDom->getParent()->nextSibling()->innerHtml;

        // 愛情
        $loveDom = $content->find('span.txt_pink');
        $result['love_star'] = $this->countStar($loveDom->innerHtml);
        $result['love_content'] = $loveDom->getParent()->nextSibling()->innerHtml;

        // 事業
        $careerDom = $content->find('span.txt_blue');
        $result['career_star'] = $this->countStar($careerDom->innerHtml);
        $result['career_content'] = $careerDom->getParent()->nextSibling()->innerHtml;

        // 財運
        $moneyDom = $content->find('span.txt_orange');
        $result['money_star'] = $this->countStar($moneyDom->innerHtml);
        $result['money_content'] = $moneyDom->getParent()->nextSibling()->innerHtml;

        return $result;
    }

    /**
     * countStar 統計星星數
     *
     * @param string $data
     * @return int
     */
    protected function countStar(string $data): int
    {
        return substr_count($data, '★');
    }
}
