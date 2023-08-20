<?php

namespace App\Enums;

enum TransactionStatusEnum:int
{
    case SUCCEEDED = 0;
    case REVERSED = 1;
}
