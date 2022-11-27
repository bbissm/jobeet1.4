<?php

/**
 * JobeetJobTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class JobeetJobTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object JobeetJobTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('JobeetJob');
  }

    public function getJobs(Doctrine_Query $q = null)
    {
        if (is_null($q)) {
            $q = $this->createQuery('j');
        }
        $q->orderBy('j.expires_at DESC');

        return $q->execute();
    }

    public function getActiveJobs(Doctrine_Query $q = null)
    {
        if (is_null($q)) {
            $q = $this->createQuery('j');
        }
        $q->andwhere('j.is_activated = 1')
        ->andWhere('j.expires_at > ?', date('Y-m-d H:i:s', time()))
        ->orderBy('j.expires_at DESC');

        return $q->execute();
    }
}
