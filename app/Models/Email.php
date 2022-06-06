<?php

namespace App\Models;

use Database\Factories\EmailFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Models\Email
 *
 * @property int $id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static EmailFactory factory(...$parameters)
 * @method static Builder|Email newModelQuery()
 * @method static Builder|Email newQuery()
 * @method static Builder|Email query()
 * @method static Builder|Email whereCreatedAt($value)
 * @method static Builder|Email whereEmail($value)
 * @method static Builder|Email whereId($value)
 * @method static Builder|Email whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'avatar'
    ];

    public function getAvatarUrl(string $miniatureType = null)
    {
        if($this->avatar)
        {
            $fileNameWithoutExt = Str::beforeLast($this->avatar, '.');
            $extension = Str::afterLast($this->avatar, '.');

            return asset('storage/images/' . $fileNameWithoutExt . ($miniatureType ? '-' . $miniatureType : '') . '.' . $extension);
        }

        return 'https://via.placeholder.com/512x512';
    }
}
