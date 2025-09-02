<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $major = ["RPL", "GAMDEV", "TKJ", "DKV", "BC", "ANM"];
    protected $gender = ["male", "female"];

    public function definition(): array
    {
        return [
            "nik" => str_pad(fake()->unique()->randomNumber(9), 16, '0', STR_PAD_LEFT),
            "fullname" => fake()->name(),
            "email" => fake()->unique()->email(),
            "no_telp" => fake()->unique()->e164PhoneNumber(),
            "address" => fake()->address(),
            "prev_school" => "SMP INSAN 10",
            "parent_name" => fake()->unique()->name(),
            "parent_telp" => fake()->unique()->e164PhoneNumber(),
            "parent_email" => fake()->unique()->email(),
            "major" => $this->major[random_int(0, count($this->major) - 1)],
            "submit_date" => now(),
            "birth_date" => now(),
            "phase" => 1,
            "gender" => $this->gender[random_int(0, count($this->gender) - 1)],
            "status" => "unverified"
        ];
    }
}
