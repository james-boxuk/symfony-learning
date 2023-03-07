<?php

namespace App\Twig\Runtime;

use DateTimeImmutable;
use DateTimeInterface;
use Twig\Extension\RuntimeExtensionInterface;

class DeleteContactMessageRuntime implements RuntimeExtensionInterface
{
    private const TWENTY_EIGHT_DAYS = 28;

    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function deleteMessage(?DateTimeInterface $archivedDate): bool
    {
        if (is_null($archivedDate)) {
            return false;
        }

        $difference = $archivedDate->diff(new DateTimeImmutable());

        return $difference->days >= self::TWENTY_EIGHT_DAYS;
    }
}
