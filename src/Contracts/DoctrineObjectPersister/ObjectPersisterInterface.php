<?php

namespace App\Contracts\DoctrineObjectPersister;

interface ObjectPersisterInterface
{
    /**
     * Persist an object
     * @param $object
     */
    public function persist($object);

    /**
     * Remove an object
     * @param $object
     */
    public function remove($object);

    /**
     * flushes all changes
     */
    public function flush();

    /*
     * detaches an object
     */
    public function detach($object);

    /**
     * get reference to the entity with the given type and identifier without actually loading it
     * @param string $entityName
     * @param $id
     * @return object|null
     */
    public function getReference(string $entityName, $id): ?object;

    /**
     * Detach all objects that are currently managed by this object.
     * If given, only objects of this type will get detached.
     */
    public function clear(): void;
}
