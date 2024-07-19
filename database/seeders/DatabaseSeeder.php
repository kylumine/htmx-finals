<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Charge;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $student = Student::create([
            'fname' => 'Benjie',
            'lname' => 'Lenterna',
            'birthdate' => '2000-01-01',
            'address' => '123 Main St',
        ]);

        $account = Account::create([
            'student_id' => $student->id,
            'section' => 'XX',
            'remarks' => '',
        ]);

        Charge::create([
            'account_id' => $account->id,
            'title' => 'Tuition',
            'amount' => 5430,
        ]);

        Charge::create([
            'account_id' => $account->id,
            'title' => 'Miscellaneous',
            'amount' => 3690,
        ]);

        Charge::create([
            'account_id' => $account->id,
            'title' => 'ID',
            'amount' => 100,
        ]);

        Charge::create([
            'account_id' => $account->id,
            'title' => 'Books',
            'amount' => 7250,
        ]);

        Payment::create([
            'account_id' => $account->id,
            'datetime' => now(),
            'amount' => 1000,
        ]);
    }
}
