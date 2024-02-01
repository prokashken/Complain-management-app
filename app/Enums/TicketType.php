<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketType extends Enum
{
    const Hardware = 1;
    const Software = 2;
    const Network = 3;
    const Printer = 4;
    const Server = 5;
}
