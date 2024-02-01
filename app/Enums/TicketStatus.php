<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketStatus extends Enum
{
    const Not_Done = 0;
    const Partialy_Done = 1;
    const Done = 2;
    const Closed = 3;
}
