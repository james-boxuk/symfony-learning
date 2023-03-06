<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\MessageReplyRuntime;
use DateTimeImmutable;
use DateTimeInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MessageReplyExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [MessageReplyRuntime::class, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('message_reply', [$this, 'messageReply']),
        ];
    }

    public function messageReply(?DateTimeInterface $dateTime): bool|string
    {
        if (is_null($dateTime)) {
           return false;
        }

        $difference = $dateTime->diff(new DateTimeImmutable());

        return $difference->days > 2 ? 'text-danger bold' : '';
    }
}
