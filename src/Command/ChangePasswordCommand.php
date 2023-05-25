<?php

namespace App\Command;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class ChangePasswordCommand
{
    public function __construct(
        private UserRepository $repository,
        private MailerInterface $mailer,
        private LoggerInterface $logger,
        private ObjectPersisterInterface $persister
    ){}

    public function handle(int $userId): User
    {
        $user = $this->repository->findBy(['id' => $userId]);
        $user = array_shift($user);
        $user->setOneTimePin(random_int(100000, 999999));

        $this->persister->persist($user);
        $this->persister->flush();

        $email =  (new TemplatedEmail())
            ->from('admin@symfony-learning.co.uk')
            ->to($_SERVER['TESTING_EMAIL'])
            ->subject('Password Change Requested')
            ->context(['user_id' => $user->getId(), 'one_time_pin' => $user->getOneTimePin()])
            ->htmlTemplate('email-templates/change-password.html.twig');

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger->log(level: 100, message: $e->getMessage());
        }

        return $user;
    }


}
