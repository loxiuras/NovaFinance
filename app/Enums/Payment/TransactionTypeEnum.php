<?php

namespace App\Enums\Payment;

enum TransactionTypeEnum: string {
    case In = 'IN';
    case Out = 'OUT';
}
