<?php

namespace Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

/**
 * Doctrine manager class
 *
 * @author Tanateros
 */
class Manager
{
    protected $em;

    /**
     * @param $connectionParams
     * @throws \Doctrine\ORM\ORMException
     */
    public function __construct($connectionParams)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Entity' . DIRECTORY_SEPARATOR;
        $config = Setup::createAnnotationMetadataConfiguration(array($path), true, null, null, false);
        $this->em = EntityManager::create($connectionParams, $config);
    }

    /**
     * @return EntityManager
     */
    public function getManager()
    {
        return $this->em;
    }
}