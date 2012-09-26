<?php

namespace Isics\FlatPageBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Isics\FlatPageBundle\Entity\FlatPage;

class FlatPageRepository extends EntityRepository
{
    /**
     * Find all pages orderder by url
     *
     * @return array
     */
    public function findAllOrderByUrl()
    {
        return $this->createQueryBuilder('fp')
            ->orderBy('fp.url')
            ->getQuery()
            ->getResult();
    }

    /**
     * Get a published page by its url
     *
     * @param string $url Url
     *
     * @return FlatPage
     */
    public function findOneBuyUrl($url)
    {
        return $this->createQueryBuilder('fp')
            ->where('fp.url = :url')
            ->andWhere('fp.isPublished = 1')
            ->setParameter('url', $url)
            ->getQuery()
            ->getSingleResult();
    }
}
