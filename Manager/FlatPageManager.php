<?php

namespace Isics\FlatPageBundle\Manager;

use Doctrine\ORM\EntityManager;
use Isics\FlatPageBundle\Entity\FlatPage;

class FlatPageManager
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Creates a new page
     *
     * @return FlatPage
     */
    public function create()
    {
        return new FlatPage();
    }

    /**
     * Saves a page
     *
     * @param FlatPage $page Page
     */
    public function save(FlatPage $page)
    {
        $this->entityManager->persist($page);
        $this->entityManager->flush();
    }

    /**
     * Deletes a page
     *
     * @param FlatPage $page Page
     *
     * @return boolean True if page has been deleted
     */
    public function delete(FlatPage $page)
    {
        try {

            $this->entityManager->remove($page);
            $this->entityManager->flush();
        }
        catch (\PDOException $e) {

            return false;
        }

        return true;
    }
}
