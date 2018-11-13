<?php

namespace datvance;

use Buzz\Browser;

class SSPlex
{
  const HOST = 'http://162.243.44.238/';

  /** @var \Buzz\Browser|null  */
  protected $browser = null;

  public function __construct()
  {
    $this->browser = new Browser();
  }

  public function getEpisodes($show_id)
  {
    $url = self::HOST . 'shows/' . $show_id . '/episodes';

    $response = $this->browser->get($url);
    return $response->getContent();
  }

  public function getSources($show_id, $episode_id)
  {
    $url = self::HOST . 'shows/' . $show_id . '/episodes/' . $episode_id . '/sources';

    $response = $this->browser->get($url);
    return $response->getContent();
  }
}