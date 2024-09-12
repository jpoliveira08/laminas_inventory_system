<?php

namespace Album\Model;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

/**
 * The AlbumTableFactory factory uses the ServiceManager to fetch a Laminas\Db\Adapter\AdapterInterface
 * implementation (also from the ServiceManager) and use it to create a TableGateway object
 */
class AlbumTableFactory implements FactoryInterface
{
    /**
     * The TableGateway classes use the prototype pattern for creation of result sets and entities
     * This means that instead of instantiating when required,
     * the system clones a previously instantiated object.
     * Then the factory creates a AlbumTable object passing it the TableGateway object
     *
     * @param ContainerInterface $container
     * @param $requestedName
     * @param array|null $options
     * @return AlbumTable
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): AlbumTable
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Album());
        $tableGateway = new TableGateway('album', $dbAdapter, null, $resultSetPrototype);

        return new AlbumTable($tableGateway);
    }
}
