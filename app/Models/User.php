<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;

//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table ="usuarios";

    protected $primaryKey = 'id_usuario'; // Clave primaria

    protected $fillable = [
        'usuario',
        'nombre',
        'apellido',
        'correo',
        'clave',
        'telefono',
        'id_rol',
        'id_area',
        'id_ocupacion',
        'habilitado',
        'id_area',
    ];



    // Relación con la tabla `areas`
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

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
    public function role()
    {

        return $this->hasMany('App\Models\Role', 'id_rol','id_rol');
    }
    public function roles_()
    {
        //pertenece a muchas roles - agregamos el id de la tabla asociativa - pivot
        return $this->belongsToMany('Spatie\Permission\Models\Role', 'model_has_roles','model_id')->withPivot('model_id','model_type');
    }
    public function roles_one()
    {
        //pertenece a muchas roles - agregamos el id de la tabla asociativa - pivot
        return $this->belongsTo('Spatie\Permission\Models\Role', 'model_has_roles','model_id');
    }
    public function registry(){
        // return $this->hasMany('App\Models\Teacher', ['teacher_m','teacher_t','teacher_r'],['teacher_m','teacher_t','teacher_r']);
           //pertenece a muchas roles - agregamos el id de la tabla asociativa - pivot
           return $this->belongsToMany('App\Models\User', 'model_has_roles','id','model_id')->withPivot('model_id','teacher_m','teacher_t','teacher_r');

         }
     public function model_has_role()
     {
         return $this->hasMany('App\Models\Role', 'roles','model_id');
     }
     //este metodo es usado para obtener los certificados de los Socio Comercials segun model_has_roles hacia registry detail
     public function model_has_roles()
     {
         return $this->hasMany('App\Models\Model_has_role', 'model_id','id');
     }

   public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function session(){
        return $this->hasOne('App\Models\Session', 'user_id');
    }

}
