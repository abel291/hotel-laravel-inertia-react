<?php

namespace App\Enums;

enum ReservationStatus: string
{
    case CANCELED = 'canceled';
    case REFUNDED = 'refunded';
    case SUCCESSFUL = 'successful';
    // case PENDING = 'pending';

    public function text(): string
    {
        return match ($this) {
            ReservationStatus::CANCELED => 'Cancelado',
            ReservationStatus::REFUNDED => 'Reembolsado',
            ReservationStatus::SUCCESSFUL => 'Aceptado',
            // ReservationStatus::PENDING => 'Pendiente',
        };
    }

    public function color(): string
    {
        return match ($this) {
            ReservationStatus::CANCELED => 'red',
            ReservationStatus::REFUNDED => 'red',
            ReservationStatus::SUCCESSFUL => 'green',
            // ReservationStatus::PENDING => 'gray',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            ReservationStatus::CANCELED => 'heroicon-s-x',
            ReservationStatus::REFUNDED => 'heroicon-o-receipt-refund',
            ReservationStatus::SUCCESSFUL => 'heroicon-s-check',
            // ReservationStatus::PENDING => 'heroicon-s-check',
        };
    }
}
