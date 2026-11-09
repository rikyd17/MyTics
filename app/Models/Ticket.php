<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property string $code
 * @property string $status
 * @property int $quantity
 * @property string $total_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    
    protected $fillable = [
        'event_id',
        'user_id',
        'name',
        'email',
        'phone',
        'quantity',
        'total_price',
        'payment_method',
        'status',
        'code'
    ];


    /**
     * Belongs to a user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Belongs to an event.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        
        return $this->belongsTo(Event::class);
    }

    /**
     * Boot the model.
     *
     * Attach an observer to the model and set the code on creation.
     *
     * @return void
     */
    protected static function boot()
{
    parent::boot();

    static::creating(function ($ticket) {
        $ticket->code = $ticket->code ?? 'TKT-' . uniqid();
    });
}
}
