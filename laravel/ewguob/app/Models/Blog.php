<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;protected $appends = ['image_base64'];

    public function getImageBase64Attribute()
    {
        if ($this->image_data) {
            $imageData = stream_get_contents($this->image_data);
            return 'data:image/jpeg;base64,' . base64_encode($imageData);
        }

        return null;
    }
}
