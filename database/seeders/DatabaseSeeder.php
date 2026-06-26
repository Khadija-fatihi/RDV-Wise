<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Database\Seeders\DoctorSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {

        // ── Admin ──────────────────────────────────────────────
        User::create([
            'name'  => 'Admin BERDAI',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role'  => 'admin',
            'email_verified_at' => now()->subDays(rand(1, 45)),
            'created_at' => now()->subDays(rand(1, 90)),
            'updated_at' => now()->subDays(rand(1, 90)),
        ]);

        // ── Médecins ───────────────────────────────────────────
        $medecinData = [
            ['name' => 'Dr. Rachid Alami',    'specialite' => 'Néphrologue',   'cabinet' => 'Salle A'],
            ['name' => 'Dr. Fatima Bennani',  'specialite' => 'Cardiologue',   'cabinet' => 'Salle B'],
            ['name' => 'Dr. Karim Tazi',      'specialite' => 'Endocrinologue','cabinet' => 'Salle C'],
        ];

        foreach ($medecinData as $i => $md) {
            $user = User::create([
                'name'  => $md['name'],
                'email' => 'medecin' . ($i+1) . '@gmail.com',
                'password' => Hash::make('password'),
                'role'  => 'medecin',
                'email_verified_at' => now()->subDays(rand(1, 45)),
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(1, 90)),
            ]);
            Doctor::create([
                'user_id'    => $user->id,
                'specialite' => $md['specialite'],
                'cabinet'    => $md['cabinet'],
                'jours_travail' => ['lundi','mardi','mercredi','jeudi','vendredi'],
                'heure_debut'   => '08:00:00',
                'heure_fin'     => '17:00:00',
                'consultation_duree' => 30,
                'tarif'      => 200.00,
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(1, 90)),
            ]);
        }

        // ── Patients ───────────────────────────────────────────
        $patientsData = [
            ['name' => 'Mohamed Rachidi',  'cin' => 'AB123456', 'sexe' => 'M', 'type_dialyse' => 'hemodialyse'],
            ['name' => 'Aicha Benmoussa',  'cin' => 'CD789012', 'sexe' => 'F',  'type_dialyse' => 'hemodialyse'],
            ['name' => 'Youssef El Idrissi','cin'=> 'EF345678', 'sexe' => 'M', 'type_dialyse' => 'dialyse_peritoneale'],
            ['name' => 'Zineb Chakir',     'cin' => 'GH901234', 'sexe' => 'F',  'type_dialyse' => null],
        ];

        foreach ($patientsData as $i => $pd) {
            $user = User::create([
                'name'  => $pd['name'],
                'email' => 'patient' . ($i+1) . '@gmail.com',
                'password' => Hash::make('password'),
                'role'  => 'patient',
                'email_verified_at' => now()->subDays(rand(1, 45)),
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(1, 90)),
            ]);
            Patient::create([
                'user_id'      => $user->id,
                'cin'          => $pd['cin'],
                'sexe'         => $pd['sexe'],
                'date_naissance' => now()->subYears(rand(35, 70)),
                'type_dialyse' => $pd['type_dialyse'],
                'seances_par_semaine' => 3,
                'groupe_sanguin' => ['A+','B+','O+','AB+'][array_rand(['A+','B+','O+','AB+'])],
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(1, 90)),
            ]);
        }

        // ── Quelques RDV ──────────────────────────────────────
        $patients = Patient::all();
        $medecins = Doctor::all();
        $statuts  = ['pending', 'confirmed', 'completed', 'cancelled'];
        $types    = ['consultation', 'hemodialyse', 'dialyse_peritoneale', 'suivi', 'urgence'];

        for ($i = 0; $i < 20; $i++) {
            Appointment::create([
                'patient_id' => $patients->random()->id,
                'medecin_id' => $medecins->random()->id,
                'date_heure' => now()->subDays(rand(1, 90))->setHour(rand(8,16))->setMinute(0),
                'statut'     => $statuts[array_rand($statuts)],
                'type_seance'=> $types[array_rand($types)],
                'motif'      => 'Séance de contrôle mensuel',
                'duree'      => 30,
                'created_at' => now()->subDays(rand(1, 90)),
                'updated_at' => now()->subDays(rand(1, 90)),
            ]);
        }

        $this->call(DoctorSeeder::class);

        $this->command->info(' Données de démo insérées avec succès!');
        $this->command->info(' Admin:admin@gmail.com / password');
        $this->command->info(' Médecin: medecin1@gmail.com/ password');
        $this->command->info(' Patient: patient1@gmail.com / password');
    }
}   