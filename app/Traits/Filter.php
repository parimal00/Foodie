<?php

namespace App\Traits;

trait Filter
{
    public function scopeFilterStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeFilterEmail($query, $email)
    {
        if ($email) {
            return $query->where('email', $email);
        }
        return $query;
    }
}
