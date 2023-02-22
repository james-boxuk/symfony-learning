<?php

namespace App\Services;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;

class ObjectPersisterService implements ObjectPersisterInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function persist($object)
    {
        $this->entityManager->persist($object);
    }

    public function remove($object)
    {
        $this->entityManager->remove($object);
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

    public function detach($object)
    {
        $this->entityManager->detach($object);
    }

    /**
     * @throws ORMException
     */
    public function getReference(string $entityName, $id): ?object
    {
        return $this->entityManager->getReference($entityName, $id);
    }

    public function clear(): void
    {
        $this->entityManager->clear();
    }
}
