<?php

namespace App\Command;

use App\Contracts\DoctrineObjectPersister\ObjectPersisterInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use InvalidArgumentException;
use Exception;
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

    public function handle(int $userId): User|string
    {
        $user = $this->repository->findBy(['id' => $userId]);
        $user = array_shift($user);
        $user->setOneTimePin(random_int(100000, 999999));

        $this->persister->persist($user);
        $this->persister->flush();

        try {
            $toEmail = null;

            if (in_array($_ENV['APP_ENV'],['dev', 'preprod'])) {
                $toEmail = $_ENV['TESTING_EMAIL'];
            } else {
                $toEmail = $user->getEmail();
            }

            if (is_null($toEmail) || empty($toEmail)) {
                throw new InvalidArgumentException(
                    'Technical Error has occurred. Make sure an email is present or one is set'
                );
            }

        } catch (InvalidArgumentException $e) {
            throw new Exception($e->getMessage());
        }

        $email =  (new TemplatedEmail())
            ->from('admin@symfony-learning.co.uk')
            ->to($toEmail)
            ->subject('Password Change Requested')
            ->context([
                'user_id' => $user->getId(),
                'one_time_pin' => $user->getOneTimePin()
            ])
            ->htmlTemplate('email-templates/change-password.html.twig');

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger->error(message: $e->getMessage());
            throw new Exception('We could not reset your password this time, please check in 10 minutes.');
        }

        return $user;
    }
}
