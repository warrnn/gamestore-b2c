<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING_PAYMENT = 'pending_payment';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
    case IN_SUPPORT = 'in_support';

    public function label(): string
    {
        return match ($this) {
            self::PENDING_PAYMENT => 'Waiting for Payment',
            self::COMPLETED => 'Order Completed',
            self::CANCELLED => 'Order Cancelled',
            self::IN_SUPPORT => 'In Support'
        };
    }
}
