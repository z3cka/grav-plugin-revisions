<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

class RevisionsPlugin extends Plugin
{
  public static function getSubscribedEvents() {
    return [
        'onPageContentRaw' => ['onPageContentRaw', 0],
    ];
  }
  public function onPageContentRaw() {
    // create revisions directory if it does not exist
    if (file_exists($this->grav['page']->path() .'/revisions')) {
      $this->grav['debugger']->addMessage("revisions folder exists!");
    } else {
      mkdir($this->grav['page']->path() .'/revisions', 0770);
    }
    // create new revision if content is different than latest revision or does not exist
    // get list of files in revisions directory ignoring files with leading dot
    $revisions = preg_grep('/^([^.])/', scandir($this->grav['page']->path() .'/revisions'));
    // if empty create timestamped copy of file
    if (count($revisions) < 1) {
      copy($this->grav['page']->path() .'/'. $this->grav['page']->name(), $this->grav['page']->path() . '/revisions/' . $this->grav['page']->name() . '.rev.' . date("Ymd-Gi"));
    } else {
      // compare contents of page with latest revision
      $rev = file_get_contents($this->grav['page']->path() . '/revisions/' . end($revisions));
      $current = file_get_contents($this->grav['page']->path() . '/' . $this->grav['page']->name());
      if ($rev == $current ) {
        $this->grav['debugger']->addMessage("these are the same! no new revision shall be made.");
      } else {
        copy($this->grav['page']->path() .'/'. $this->grav['page']->name(), $this->grav['page']->path() . '/revisions/' . $this->grav['page']->name() . '.rev.' . date("Ymd-Gi"));
      }
    }
  }
}