<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//agregar hash
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {

            Permission::create(['name' => 'agregar']);
            Permission::create(['name' => 'editar']);
            Permission::create(['name' => 'actualizar']);
            Permission::create(['name' => 'eliminar']);
            Permission::create(['name' => 'usuarios']);
            Permission::create(['name' => 'estado']);
            Permission::create(['name' => 'comision']);
            Permission::create(['name' => 'clientes']);
            Permission::create(['name' => 'socio_comercial']);
            Permission::create(['name' => 'dashboard']);
            $tesoreria=Role::firstOrCreate(['name' => 'Tesoreria-archivo']);
            $tesoreria->syncPermissions('estado');
            $tesoreria->syncPermissions('comision');


                    // Lista de permisos base
                    $permisosEspeciales = [

                        'redaccion', 'comercial', 'fedateador',
                        'desistimiento',  'administrar'
                    ];

                    // Crear permisos y roles en base a esos permisos
                    foreach ($permisosEspeciales as $permiso) {
                        Permission::firstOrCreate(['name' => $permiso, 'guard_name' => 'web']);

                        // Si es "administrar", el rol se llama "Administrador"
                        $rolNombre = $permiso === 'administrar' ? 'Administrador' : ucfirst($permiso);

                        $role = Role::firstOrCreate(['name' => $rolNombre, 'guard_name' => 'web']);
                        $role->syncPermissions([$permiso]);
                    }


                    // Usuarios predefinidos según los datos brindados
                    $usuarios = [
                        ['Gabriela', 'Huachillo', 'gabrielahuachillo@aybarsac.com', 'redaccion'],
                        ['Jang', 'Aguinaga', 'jangaguinaga@aybarsac.com', 'redaccion'],

                        ['Axell', 'Sandoval', 'axellsandoval@aybarsac.com', 'comercial'],
                        ['Jade', 'Ramirez', 'YULIANARAMIREZ@aybarsac.com', 'comercial'],

                        ['Cristina', 'Marroquin', 'cristinamarroquin@credilotesperu.com', 'fedateador'],

                        ['Mayra', 'Hernandez', 'mayrahernandez@credilotesperu.com', 'desistimiento'],

                        ['Dorita', 'Ojaicuro', 'doritaojaicuro@aybarsac.com', 'tesoreria-archivo'],
                        ['Gwendolyne', 'Accostupa', 'Gwendolyneaccostupa@aybarsac.com', 'tesoreria-archivo'],
                        ['Luis', 'Ballena', 'LUISBALLENA@aybarsac.com', 'tesoreria-archivo'],

                        ['Diego', 'Contreras', 'josecontreras@aybarsac.com', 'administrador'],
                        ['Stephany', 'Williamzon', 'auxiliaradministrativo@aybarsac.com', 'administrador'],
                    ];

                    foreach ($usuarios as [$firstname, $lastname, $email, $rolPermiso]) {
                        $user = User::create([
                            'dni' => rand(10000000, 99999999),
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'names' => "$firstname $lastname",
                            'password' => Hash::make('sdc123456'),
                            'datebirth' => '1990-01-01',
                            'cellphone' => '900000000',
                            'sex' => 'M',
                            'email' => strtolower($email),
                        ]);

                        $rolNombre = $rolPermiso === 'administrador' ? 'Administrador' : ucfirst($rolPermiso);
                        $user->assignRole($rolNombre);
                    }

                    // Admin manual
                    $admin = User::create([
                        'dni' => '44444444',
                        'firstname' => 'Cardenas',
                        'lastname' => 'Aquino',
                        'names' => 'Anthony Robert',
                        'password' => Hash::make('sdc123456'),
                        'datebirth' => '2000-10-10',
                        'cellphone' => '999999999',
                        'sex' => 'M',
                        'email' => 'admin@gmail.com',
                    ]);
                    $admin->assignRole('Administrador');

                    $admin2 = User::create([
                        'dni' => '44444445',
                        'firstname' => 'Cardenas1',
                        'lastname' => 'Aquino1',
                        'names' => 'Anthony Robert1',
                        'password' => Hash::make('sdc123456'),
                        'datebirth' => '2000-10-10',
                        'cellphone' => '999999999',
                        'sex' => 'M',
                        'email' => 'admin1@gmail.com',
                    ]);
                    $admin2->assignRole('Administrador');
                }
            }




