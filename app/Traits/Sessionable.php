<?php

namespace App\Traits;

trait Sessionable
{
    public function hasSession()
    {
        return !empty($this->session_id);
    }

    public function clearSession()
    {
        $this->session_id = null;
        $this->save();
    }
}