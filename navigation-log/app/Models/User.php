<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Conversation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class, 'user_id', 'id');
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'first_user_id', 'second_user_id');
    }

    public function morefriends(): BelongsToMany{
        return $this->belongsToMany(User::class, 'friends', 'second_user_id', 'first_user_id'); 
    }

    public function friendRequest($id){

        $friends =  $this->morefriends()->where('accepted', false);
        return $friends->where('second_user_id', $id)->distinct();

    }

    public function friendsPending($id){

        $friends =  $this->friends()->where('accepted', false);
        return $friends->where('first_user_id', $id)->distinct();

    }

    public function friendsaccepted()
    {
        $oneway = $this->friends()->where('accepted', true)->get();
        $otherway = $this->morefriends()->where('accepted', true)->get();

        return $oneway->merge($otherway);
    }

    public function isRequested($id){
        $stuff = $this->friends->where('first_user_id', $id);

        if (count($stuff) != 0){
            return "true";
        } 

        return "false";
    }

    public function conversations(): BelongsToMany
    {
        return $this->belongsToMany(Conversation::class, 'user_conversation', 'user_id', 'conversation_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }

    public function notificationfrom(): HasMany
    {
        return $this->hasMany(Notification::class, 'from_user_id', 'id');
    }

}
