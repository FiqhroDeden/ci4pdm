<?php

namespace App\Models;

use CodeIgniter\Model;

class cekdataModel extends Model
{
    public function siakad()
    {
        $id = user_id();
        $query = $this->db->table('users')
            ->where('id', $id)
            ->get();
        foreach ($query->getResultArray() as $nim) :
            return $this->db->table('siakad')
                // ->join('siakad', 'siakad.nim = users.username')
                ->where('nim', $nim['nim'])
                ->get()->getResultArray();
        endforeach;
    }
    public function pddikti()
    {


        $id = user_id();
        $query = $this->db->table('users')
            ->where('id', $id)
            ->get();
        foreach ($query->getResultArray() as $nim) :
            return $this->db->table('pddikti')
                // ->join('siakad', 'siakad.nim = users.username')
                ->where('nim', $nim['nim'])
                ->get()->getResultArray();
        endforeach;
    }
}
