<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //•	Enregistrement des informations clients (nom, prénom, adresse, numéro de téléphone, adresse e-mail).
    //Ajout, modification et suppression des informations liées aux véhicules.
    protected $fillable = [
        'Nom',
        'Prenom',
        'username',
        'email',
        'NumeroTelephone',
        'password',
        'role',
        'adresse',
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
        'password' => 'hashed',
    ];
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
/*
    public function mechanic()
    {
        return $this->hasOne(Mechanic::class);
    }*/

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }

    public function isMechanic()
    {
        return $this->role === 'mecanicien';
    }
}
    //	Consultation facile des vehicules
   /* public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    //	Consultation facile de l'historique des services effectuées
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
*/

