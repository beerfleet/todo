<?php

namespace TodoBundle\Entity\Repo;

use Doctrine\ORM\EntityRepository;

class TodoRepository extends EntityRepository {
  public function updateFinishedStateOfId($id, $state) {
    return $this->getEntityManager()
      ->createQuery("UPDATE todo_item SET finihed = $state WHERE id = $id")
      ->getResult();
  }
}