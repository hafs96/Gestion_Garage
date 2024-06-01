<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class client implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'Nom' => $row['Nom'],
            'Prenom' => $row['Prenom'],
            'username' => $row['UserName'],
            'Adresse' => $row['Adresse'],
            'email' => $row['Email'],
            'NumeroTelephone' => $row['Telephone'],
            'role' => $row['Role'],
        ]);
    }
}
