<?php


namespace AppBundle\Service;


use Psr\Log\LoggerInterface;

class TestService
{
    private $logger;

    private $email;

    public function __construct(LoggerInterface $logger, $adminEmail)
    {
        $this->logger = $logger;
        $this->email = $adminEmail;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}