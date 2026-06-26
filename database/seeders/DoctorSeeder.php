<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Casablanca', 'Rabat', 'Fès', 'Marrakech', 'Tangier', 'Agadir'];
        $specialties = [
            'Cardiologue',
            'Dermatologue',
            'Neurologue',
            'Pédiatre',
            'Gynécologue',
            'Médecin généraliste',
        ];

        $names = [
            'Amina Boutaleb', 'Youssef El Idrissi', 'Meryem Zahiri', 'Karim Bennis',
            'Nadia Laraichi', 'Mounir Haddad', 'Sara Boujraf', 'Rachid El Amrani',
            'Halima Farah', 'Anas Benali', 'Imane Naji', 'Adel Tazi',
            'Sanaa Khatib', 'Omar El Guerrouj', 'Souad Mrabet', 'Hicham Aziz',
            'Kenza Ouhammou', 'Nabil Kabbaj', 'Laila Khattabi', 'Walid Chraibi',
            'Noura Ziani', 'Yassin El Moussaoui', 'Aicha Bennani', 'Fouad Mansouri',
            'Ines Faouzi', 'Mounaim Ezzahi', 'Salma Hariri', 'Sami Lahrach',
            'Dalal El Azzouzi', 'Anouar El Mouden', 'Mouna Saidi', 'Rida Boulahbal',
            'Najat Lamrani', 'Ismail Abid', 'Hanane Kaddouri', 'Hassan El Youssfi',
        ];

        $index = 0;

        foreach ($cities as $city) {
            foreach ($specialties as $specialty) {
                $name = $names[$index % count($names)];
                $index++;
                $user = User::create([
                    'name' => "Dr. {$name}",
                    'email' => strtolower(str_replace(' ', '.', "doctor{$index}@smartesante.test")),
                    'password' => Hash::make('password'),
                    'role' => 'medecin',
                    'email_verified_at' => now()->subDays(rand(1, 90)),
                ]);

                Doctor::create([
                    'user_id' => $user->id,
                    'name' => "Dr. {$name}",
                    'email' => $user->email,
                    'specialite' => $specialty,
                    'city' => $city,
                    'address' => "123 Avenue de la Santé, {$city}",
                    'cabinet' => "Clinique {$city}",
                    'phone' => '+212 6' . rand(10, 99) . rand(10, 99) . rand(10, 99),
                    'photo' => "https://ui-avatars.com/api/?name=" . urlencode("Dr. {$name}") . "&background=0D8ABC&color=ffffff&rounded=true",
                    'verified' => true,
                    'bio' => "Expert en {$specialty} avec une approche bienveillante et centrée sur le patient.",
                    'jours_travail' => ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'],
                    'heure_debut' => '08:00:00',
                    'heure_fin' => '17:00:00',
                    'consultation_duree' => 30,
                    'tarif' => 350.00,
                    'accepte_nouveaux' => true,
                    'created_at' => now()->subDays(rand(1, 90)),
                    'updated_at' => now()->subDays(rand(1, 90)),
                ]);
            }
        }
    }
}
