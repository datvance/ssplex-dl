<?php

namespace datvance;

use Youtubedl\Youtubedl;

class MediaConsumer
{
  /** @var null|\stdClass */
  protected $database = null;

  /** @var \datvance\SSPlex|null */
  protected $ssplex = null;

  public function __construct()
  {
    $this->readDatabase();
    $this->ssplex = new SSPlex();
  }

  public function consume() {

    if(isset($this->database->shows))
    {
      foreach($this->database->shows as $show)
      {
        $this->consumeSeries($show);
      }
    }
  }

  protected function consumeSeries($show)
  {
    //get episodes
    $episodes = $this->ssplex->getEpisodes($show->ssplexid);
    var_dump($episodes);

    //get sources for episode

    //translate source to final_url

    //download with yt-dl
  }

  protected function readDatabase()
  {
    $this->database = json_decode(file_get_contents(dirname(__DIR__) . '/database.json'));
  }

}