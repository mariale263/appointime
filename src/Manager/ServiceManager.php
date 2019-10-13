<?php

namespace App\Manager;

use App\Entity\Service;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Psr\Log\LoggerInterface;

class ServiceManager
{
    private $objectManager;
    private $serviceRepository;
    private $logger;

    /**
     * Constructor de la clase
     *
     * @param ObjectManager $objectManager
     * @param LoggerInterface $logger
     */
    public function __construct(ObjectManager $objectManager, LoggerInterface $logger)
    {
        $this->objectManager = $objectManager;
        $this->serviceRepository = $this->objectManager->getRepository(Service::class);
        $this->logger = $logger;
    }

    /**
     * Función que crea un servicio
     *
     * @param Service $service
     * @return boolean
     */
    public function new(Service $service)
    {
        try {
            $this->objectManager->persist($service);
            $this->objectManager->flush();
        } catch (\Exception $exception) {
            $this->logger->error(sprintf(
                'Error creando el nuevo servicio: "%s"',
                $exception->getMessage()
            ));

            return false;
        }

        return true;
    }

    /**
     * Función que actualiza un servicio
     *
     * @param Service $service
     * @param Request $request
     * @return boolean
     */
    public function update(Service $service)
    {
        try {
            $this->objectManager->persist($service);
            $this->objectManager->flush();
        } catch (\Exception $exception) {
            $this->logger->error(sprintf(
                'Error al actualizar servicio: "%s"',
                $exception->getMessage()
            ));

            return false;
        }
        
        return true;
    }

    /**
     * Función que Eliminar un servicio
     *
     * @param Service $service
     * @param Request $request
     * @return boolean
     */
    public function delete(Service $service)
    {
        try {
            $this->objectManager->remove($service);
            $this->objectManager->flush();
        } catch (\Exception $exception) {
            $this->logger->error(sprintf(
                'Error eliminando servicio: (id: "%s") : "%s"',
                $service->getId(),
                $exception->getMessage()
            ));

            return false;
        }
        
        return true;
    }

}